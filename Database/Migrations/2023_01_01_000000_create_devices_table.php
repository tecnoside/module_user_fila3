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
                $table->boolean('is_desktop')->nullable();
                $table->boolean('is_mobile')->nullable();
                $table->boolean('is_tablet')->nullable();
                $table->boolean('is_phone')->nullable();
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
