<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

final class CreateTeamUserTable extends XotBaseMigration
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
                $blueprint->foreignId('team_id');
                $blueprint->foreignId('user_id');
                // $table->foreignIdFor(User::class);
                $blueprint->string('role')->nullable();
                $blueprint->timestamps();
                $blueprint->unique(['team_id', 'user_id']);
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
