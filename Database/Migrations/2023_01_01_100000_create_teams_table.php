<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

final class CreateTeamsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $blueprint) : void {
                $blueprint->id();
                $blueprint->foreignId('user_id')->index();
                // $table->foreignIdFor(User::class);
                $blueprint->string('name');
                $blueprint->boolean('personal_team');
                $blueprint->timestamps();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            static function (Blueprint $blueprint) : void {
                // if (! $this->hasColumn('email')) {
                //    $table->string('email')->nullable();
                // }
            }
        );
    }
}
