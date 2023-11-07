<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateDevicesTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->id();
                // $table->foreignId('user_id')->nullable()->index();
                $table->string('mobile_id')->nullable();
                $table->string('device')->nullable();
                $table->string('platform')->nullable();
                $table->string('browser')->nullable();
                $table->string('version')->nullable();
                $table->boolean('is_desktop')->nullable();
                $table->boolean('is_mobile')->nullable();
                $table->boolean('is_tablet')->nullable();
                $table->boolean('is_phone')->nullable();
                $table->boolean('is_robot')->nullable();
                $table->string('robot')->nullable();
            });

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
