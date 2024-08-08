<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Device;
use Modules\User\Models\User;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateDeviceUserTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->id('id');
                $table->foreignIdFor(Device::class, 'device_id')->index();
                $table->foreignIdFor(User::class, 'user_id')->index();
                $table->dateTime('login_at')->nullable();
                $table->dateTime('logout_at')->nullable();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('push_notifications_token')) {
                    $table->string('push_notifications_token')->nullable();
                }

                if (! $this->hasColumn('push_notifications_enabled')) {
                    $table->boolean('push_notifications_enabled')->nullable();
                }

                $this->updateTimestamps($table);
            }
        );
    }
}
