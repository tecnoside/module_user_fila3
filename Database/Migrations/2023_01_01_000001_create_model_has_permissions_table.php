<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Spatie\Permission\PermissionRegistrar;

/**
 * Class CreateModelHasPermissionsTable.
 */
class CreateModelHasPermissionsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var array $tableNames */
        $tableNames = config('permission.table_names');
        /** @var array $columnNames */
        $columnNames = config('permission.column_names');

        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) use ($tableNames, $columnNames) {
                $table->unsignedBigInteger(PermissionRegistrar::$pivotPermission);

                $table->string('model_type');
                $table->unsignedBigInteger($columnNames['model_morph_key']);
                $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');

                $table->foreign(PermissionRegistrar::$pivotPermission)
                    ->references('id') // permission id
                    ->on($tableNames['permissions'])
                    ->onDelete('cascade');
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
            }
        );
    }
}
