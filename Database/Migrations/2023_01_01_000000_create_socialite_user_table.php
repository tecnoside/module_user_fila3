<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

class CreateSocialiteUserTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) use ($userClass) {
                $table->uuid('id')->primary();
                $table->foreignIdFor($userClass, 'user_id');
                $table->string('provider');
                $table->string('provider_id');
                $table->string('token')->nullable();
                $table->string('name')->nullable();
                $table->string('email')->nullable();
                $table->string('avatar')->nullable();

                /*
                $table->unique([
                    'provider',
                    'provider_id',
                ]);
                */

                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                // if (! $this->hasColumn('email')) {
                //    $table->string('email')->nullable();
                // }
                $this->updateUser($table);
            }
        );
    }
}
