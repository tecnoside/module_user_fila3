<?php

/**
 * ---.
 */

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                // $table->drop('team_invitations');
                $table->uuid('id')->primary();
                $table->foreignId('user_id')->index();
                // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
                $table->string('name');
                $table->boolean('personal_team');
                // $table->timestamps();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // MySqlConnection::getDoctrineSchemaManager does not exist.
                // MySqlConnection::getSchemaGrammar() ?
                // if ($this->hasIndexName('team_invitations_team_id_foreign')) {
                //    $table->dropForeign('team_invitations_team_id_foreign');
                // }
                $this->updateTimestamps($table, true);
                // $this->updateUser($table);

                if ($this->hasColumn('id')) {
                    $table->increments('id')->change();
                }
            }
        );
    }
};
