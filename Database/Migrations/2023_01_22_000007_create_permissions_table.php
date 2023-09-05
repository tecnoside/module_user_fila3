<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePermissionsTable.
 */
final class CreatePermissionsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $blueprint) : void {
                $blueprint->bigIncrements('id');
                // permission id
                $blueprint->string('name');
                // For MySQL 8.0 use string('name', 125);
                $blueprint->string('guard_name');
                // For MySQL 8.0 use string('guard_name', 125);
                $blueprint->timestamps();
                $blueprint->unique(['name', 'guard_name']);
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            static function (Blueprint $blueprint) : void {
            }
        );
    }
}
