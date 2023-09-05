<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateTeamInvitationsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $blueprint): void {
                $blueprint->id();
                $blueprint->foreignId('team_id')->constrained()->cascadeOnDelete();
                $blueprint->string('email');
                $blueprint->string('role')->nullable();
                $blueprint->timestamps();

                $blueprint->unique(['team_id', 'email']);
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $blueprint): void {
                // if (! $this->hasColumn('email')) {
                //    $table->string('email')->nullable();
                // }
            }
        );
    }
}
