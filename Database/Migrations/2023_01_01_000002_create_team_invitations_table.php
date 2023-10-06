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
            function (Blueprint $table): void {
                $table->uuid('id')->primary();
                $table->uuid('team_id')->nullable()->index();
                $table->string('email');
                $table->string('role')->nullable();
                $table->timestamps();
                // $table->unique(['team_id', 'email']);
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('email')) {
                //    $table->string('email')->nullable();
                // }
                if ($this->hasIndexName('team_invitations_team_id_foreign')) {
                    $table->dropForeign('team_invitations_team_id_foreign');
                }
                // $this->updateUser($table);
            }
        );
    }
}
