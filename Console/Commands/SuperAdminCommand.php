<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

use function Laravel\Prompts\text;

use Modules\User\Models\Role;
use Modules\User\Models\User;
use Nwidart\Modules\Facades\Module;
use Symfony\Component\Console\Input\InputOption;
use Webmozart\Assert\Assert;

class SuperAdminCommand extends Command
{
    /**
     * <<<<<<< HEAD
     * The console command name.
     * =======
     * The name and signature of the console command.
     * >>>>>>> 9265a1b6892b4aca6d1b66e51335bf40ddf5f6fb.
     *
     * @var string
     */
    protected $name = 'user:super-admin';

    /**
     * The console command description.
     *
     * <<<<<<< HEAD
     *
     * @var string|null
     *                  =======
     * @var string
     *                  >>>>>>> 9265a1b6892b4aca6d1b66e51335bf40ddf5f6fb
     */
    protected $description = 'Assign super-admin to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = text('email ?');
        Assert::notNull($user = User::firstWhere(['email' => $email]));

        $role = Role::firstOrCreate(['name' => 'super-admin']);
        $user->assignRole($role);
        $modules_opts = array_keys(Module::all());
        foreach ($modules_opts as $module) {
            $role_name = Str::lower($module).'::admin';
            $role = Role::firstOrCreate(['name' => $role_name]);
            $user->assignRole($role);
        }

        $this->info('super-admin assigned to '.$email);
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
