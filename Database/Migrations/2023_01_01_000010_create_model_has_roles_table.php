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
            static function (Blueprint $blueprint) use ($columnNames): void {
                $blueprint->unsignedBigInteger(PermissionRegistrar::$pivotRole);
                $blueprint->string('model_type');
                $blueprint->unsignedBigInteger($columnNames['model_morph_key']);
                $blueprint->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');
                /*
                $table->foreign(PermissionRegistrar::$pivotRole)
                        ->references('id') // role id
                        ->on($tableNames['roles'])
                        ->onDelete('cascade');
                */
                /*
                if ($teams) {
                    $blueprint->unsignedBigInteger($columnNames['team_foreign_key']);
                    $blueprint->index($columnNames['team_foreign_key'], 'model_has_roles_team_foreign_key_index');

                    $blueprint->primary(
                        [$columnNames['team_foreign_key'], PermissionRegistrar::$pivotRole, $columnNames['model_morph_key'], 'model_type'],
                        'model_has_roles_role_model_type_primary'
                    );
                } else {
                    $blueprint->primary(
                        [PermissionRegistrar::$pivotRole, $columnNames['model_morph_key'], 'model_type'],
                        'model_has_roles_role_model_type_primary'
                    );
                }
                */
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $blueprint): void {
                if (! $this->hasColumn('team_id')) {
                    $blueprint->foreignId('team_id')->nullable();
                } else {
                    $blueprint->string('team_id')->nullable()->change();
                }
                if ($this->hasIndexName('model_has_roles_team_foreign_key_index')) {
                    $blueprint->dropIndex('model_has_roles_team_foreign_key_index');
                }

                if ($this->hasIndexName('model_has_roles_model_id_model_type_index')) {
                    $blueprint->dropIndex('model_has_roles_model_id_model_type_index');
                }
            }
        );
    }
}
