<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Actions\Socialite\Utils\EmailDomainAnalyzer;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\Permission\Guard;
use Spatie\QueueableAction\QueueableAction;

class SetDefaultRolesBySocialiteUserAction
{
    use QueueableAction;

    private EmailDomainAnalyzer $domainAnalyzer;

    private string $defaultUserGuard;

    public function __construct(
        private readonly string $provider,
    ) {
        $this->domainAnalyzer = app(
            EmailDomainAnalyzer::class,
            [
                'ssoProvider' => $this->provider,
            ]
        );

        $this->defaultUserGuard = Guard::getDefaultName(
            XotData::resolveUserClass()
        );
    }

    public function execute(UserContract $userModel, SocialiteUserContract $oauthUser): void
    {
        $this->domainAnalyzer->setUser($oauthUser);

        // Do nothing if users already have some roles
        // bound to them: in this way we can update all
        // entities and expect a stable behaviour of the
        // platform
        if ($userModel->roles()->count() > 0) {
            return;
        }

        // Unrecognized domain: someone will have to set a role
        // to the user as a specific set of permissions cannot
        // be automatically inferred
        if ($this->domainAnalyzer->hasUnrecognizedDomain()) {
            return;
        }

        $defaultRoleNames = $this->domainAnalyzer->hasFirstPartyDomain()
            ? (array) config("services.{$this->provider}.email_domains.first_party.role_names_search")
            : (array) config("services.{$this->provider}.email_domains.client.role_names_search");

        $rolesToSet = Role::query()
            ->where(
                function (Builder $query) use ($defaultRoleNames) {
                    foreach ($defaultRoleNames as $roleName) {
                        $query->orWhere('name', 'LIKE', $roleName);
                    }
                }
            )
            ->where('guard_name', '=', $this->defaultUserGuard)
            ->get();

        $userModel->assignRole($rolesToSet);
    }
}
