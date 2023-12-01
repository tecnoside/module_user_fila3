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
     */
    public function up(): void
    {


        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) : void {

                $table->id();
                $table->unsignedBigInteger('permission_id');
                $table->uuidMorphs('model');

            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $this->updateTimestamps($table);
                $this->updateUser($table);
            }
        );
    }
}
