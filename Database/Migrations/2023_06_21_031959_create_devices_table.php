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
<<<<<<< HEAD
                $table->id();
                // $table->foreignId('user_id')->nullable()->index();
                $table->string('mobile_id')->nullable();
                $table->string('device')->nullable();
                $table->string('platform')->nullable();
                $table->string('browser')->nullable();
                $table->string('version')->nullable();
=======
                $table->id('id');
                $table->string('mobile_id')->nullable()->index();
                // 'id',
                $table->string('languages')->nullable(); // ['en-us', 'en'] ;
                $table->string('device')->nullable(); // "Macintosh"
                $table->string('platform')->nullable(); // "OS X"
                $table->string('browser')->nullable(); // "Safari"
                $table->string('version')->nullable(); // $agent->version($browser)
                $table->boolean('is_robot')->nullable(); // bool
                $table->string('robot')->nullable(); // the robot name
>>>>>>> 818057d (up)
                $table->boolean('is_desktop')->nullable();
                $table->boolean('is_mobile')->nullable();
                $table->boolean('is_tablet')->nullable();
                $table->boolean('is_phone')->nullable();
<<<<<<< HEAD
                $table->boolean('is_robot')->nullable();
                $table->string('robot')->nullable();
=======
>>>>>>> 818057d (up)
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
