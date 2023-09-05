<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Spatie\Permission\PermissionRegistrar;

/**
 * Class CreateModelHasPermissionsTable.
 */
final class CreateModelHasPermissionsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /** @var array $tableNames */
        $tableNames = config('permission.table_names');
        /** @var array $columnNames */
        $columnNames = config('permission.column_names');

        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $blueprint) use ($tableNames, $columnNames) : void {
                $blueprint->unsignedBigInteger(PermissionRegistrar::$pivotPermission);
                $blueprint->string('model_type');
                $blueprint->unsignedBigInteger($columnNames['model_morph_key']);
                $blueprint->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');
                $blueprint->foreign(PermissionRegistrar::$pivotPermission)
                    ->references('id') // permission id
                    ->on($tableNames['permissions'])
                    ->onDelete('cascade');
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            static function (Blueprint $blueprint) : void {
            }
        );
    }
}
