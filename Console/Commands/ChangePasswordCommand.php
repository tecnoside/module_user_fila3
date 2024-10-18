<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

class ChangePasswordCommand extends Command
{
    protected $signature = 'user:change-password';

    protected $description = 'Change user password';

    public function handle(): void
    {
        Assert::string($email = $this->ask('Enter the user email:'));
        try {
            $user = XotData::make()->getUserByEmail($email);
        } catch (Exception $e) {
            $this->error($e->getMessage());

            return;
        }

        Assert::string($password = $this->secret('Enter the new password:'));
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
