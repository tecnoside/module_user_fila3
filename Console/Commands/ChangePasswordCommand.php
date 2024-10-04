<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Modules\Xot\Datas\XotData;

class ChangePasswordCommand extends Command
{
    protected $signature = 'user:change-password';

    protected $description = 'Change user password';

    public function handle()
    {
        $email = $this->ask('Enter the user email:');
        $user_class = XotData::make()->getUserClass();
        /** @var \Modules\Xot\Contracts\UserContract */
        $user = $user_class::firstWhere(['email' => $email]);

        if (! $user) {
            $this->error('User not found!');

            return;
        }

        $password = $this->secret('Enter the new password:');
        $confirmPassword = $this->secret('Confirm the new password:');

        if ($password !== $confirmPassword) {
            $this->error('Passwords do not match!');

            return;
        }

        $user->password = Hash::make($password);
        $user->save();

        $this->info('Password changed successfully!');
    }
}
