<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
<<<<<<< HEAD
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;
=======
use Modules\User\Models\Device;
use Modules\User\Models\User;
use Modules\Xot\Database\Migrations\XotBaseMigration;
>>>>>>> 818057d (up)

class CreateDeviceUserTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        $xot = XotData::make();
        $userClass = $xot->getUserClass();
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->id();
                $table->string('device_id', 36)->nullable()->index();
                $table->string('user_id', 36)->nullable()->index();
=======
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->id('id');
                $table->foreignIdFor(Device::class, 'device_id')->index();
                $table->foreignIdFor(User::class, 'user_id')->index();
>>>>>>> 818057d (up)
                $table->dateTime('login_at')->nullable();
                $table->dateTime('logout_at')->nullable();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                // if (! $this->hasColumn('email')) {
                //    $table->string('email')->nullable();
                // }
                $this->updateTimestamps($table);
            }
        );
    }
}
