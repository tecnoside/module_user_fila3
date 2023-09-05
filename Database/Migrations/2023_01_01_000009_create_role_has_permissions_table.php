<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Spatie\Permission\PermissionRegistrar;

/**
 * Class CreateModelHasRolesTable.
 */
final class CreateRoleHasPermissionsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $blueprint) : void {
                $blueprint->unsignedBigInteger(PermissionRegistrar::$pivotPermission);
                $blueprint->unsignedBigInteger(PermissionRegistrar::$pivotRole);
                // *
                $blueprint->foreign(PermissionRegistrar::$pivotPermission)
                    ->references('id') // permission id
                    ->on('permissions')
                    ->onDelete('cascade');
                $blueprint->foreign(PermissionRegistrar::$pivotRole)
                    ->references('id') // role id
                    ->on('roles')
                    ->onDelete('cascade');
                $blueprint->primary(
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
            static function (Blueprint $blueprint) : void {
            }
        );
    }
}
