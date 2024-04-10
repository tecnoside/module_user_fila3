<?php

declare(strict_types=1);

/**
 * @see DutchCodingCompany\FilamentSocialite
 */

namespace Modules\User\Http\Controllers\Socialite;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Modules\User\Actions\Socialite\IsProviderConfiguredAction;
use Modules\User\Actions\Socialite\IsRegistrationEnabledAction;
use Modules\User\Actions\Socialite\IsUserAllowedAction;
use Modules\User\Actions\Socialite\LoginUserAction;
use Modules\User\Actions\Socialite\RedirectToLoginAction;
use Modules\User\Actions\Socialite\RegisterOauthUserAction;
use Modules\User\Actions\Socialite\RegisterSocialiteUserAction;
use Modules\User\Actions\Socialite\RetrieveOauthUserAction;
use Modules\User\Actions\Socialite\RetrieveSocialiteUserAction;
use Modules\User\Actions\Socialite\SetDefaultRolesBySocialiteUserAction;
use Modules\User\Actions\Socialite\CreateSocialiteUserAction;
use Modules\User\Actions\Socialite\GetDomainAllowListAction;
use Modules\User\Actions\Socialite\GetGuardAction;
use Modules\User\Actions\Socialite\GetLoginRedirectRouteAction;
use Modules\User\Actions\Socialite\GetProviderScopesAction;
use Modules\User\Events\RegistrationNotEnabled;
use Modules\User\Events\UserNotAllowed;
use Modules\User\Exceptions\ProviderNotConfigured;
use Modules\User\Models\User;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Facades\Socialite;

class RedirectToProviderController extends Controller
{
    /**
     * Undocumented function.
     */
    public function __invoke(Request $request, string $provider): RedirectResponse
    {
         if (! app(IsProviderConfiguredAction::class)->execute($provider)) {
            throw ProviderNotConfigured::make($provider);
        }

        $scopes = App(GetProviderScopesAction::class)->execute($provider);
        $socialiteProvider = Socialite::with($provider);
        if (! is_object($socialiteProvider)) {
            throw new \Exception('wip');
        }

        if (! method_exists($socialiteProvider, 'scopes')) {
            throw new \Exception('wip');
        }

        return $socialiteProvider
            ->scopes($scopes)
            ->redirect();
    }

}