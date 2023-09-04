<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Spatie\Permission\PermissionRegistrar;

/**
 * Class CreateModelHasRolesTable.
 */
class CreateRoleHasPermissionsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->unsignedBigInteger(PermissionRegistrar::$pivotPermission);
                $table->unsignedBigInteger(PermissionRegistrar::$pivotRole);

                // *
                $table->foreign(PermissionRegistrar::$pivotPermission)
                    ->references('id') // permission id
                    ->on('permissions')
                    ->onDelete('cascade');

                $table->foreign(PermissionRegistrar::$pivotRole)
                    ->references('id') // role id
                    ->on('roles')
                    ->onDelete('cascade');

                $table->primary(
                    [
                        PermissionRegistrar::$pivotPermission,
                        PermissionRegistrar::$pivotRole,
                    ],
                    'role_has_permissions_permission_id_role_id_primary'
                );
                // */
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
            }
        );
    }
}
