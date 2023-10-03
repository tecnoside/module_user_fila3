<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Spatie\Permission\PermissionRegistrar;

/**
 * Class CreateModelHasRolesTable.
 */
class CreateModelHasRolesTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /** @var array $columnNames */
        $columnNames = config('permission.column_names');

        // $teams = true; // config('permission.teams');

        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) use ($columnNames): void {
                $table->id();
                $table->unsignedBigInteger(PermissionRegistrar::$pivotRole);
                $table->string('model_type');
                $table->unsignedBigInteger($columnNames['model_morph_key']);
                // $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');
                /*
                $table->foreign(PermissionRegistrar::$pivotRole)
                        ->references('id') // role id
                        ->on($tableNames['roles'])
                        ->onDelete('cascade');
                */
                /*
                if ($teams) {
                    $table->unsignedBigInteger($columnNames['team_foreign_key']);
                    $table->index($columnNames['team_foreign_key'], 'model_has_roles_team_foreign_key_index');

                    $table->primary(
                        [$columnNames['team_foreign_key'], PermissionRegistrar::$pivotRole, $columnNames['model_morph_key'], 'model_type'],
                        'model_has_roles_role_model_type_primary'
                    );
                } else {
                    $table->primary(
                        [PermissionRegistrar::$pivotRole, $columnNames['model_morph_key'], 'model_type'],
                        'model_has_roles_role_model_type_primary'
                    );
                }
                */
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('id')) {
                    $table->dropIndex('PRIMARY');
                    $table->uuid('id');
                }
                if (! $this->hasColumn('team_id')) {
                    $table->foreignId('team_id')->nullable();
                } else {
                    $table->string('team_id')->nullable()->change();
                }
                if ($this->hasIndexName('model_has_roles_team_foreign_key_index')) {
                    $table->dropIndex('model_has_roles_team_foreign_key_index');
                }

                if ($this->hasIndexName('model_has_roles_model_id_model_type_index')) {
                    $table->dropIndex('model_has_roles_model_id_model_type_index');
                }
            }
        );
    }
}
