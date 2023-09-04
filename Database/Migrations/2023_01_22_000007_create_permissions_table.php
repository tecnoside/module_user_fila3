<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePermissionsTable.
 */
class CreatePermissionsTable extends XotBaseMigration
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
                $table->bigIncrements('id'); // permission id
                $table->string('name');       // For MySQL 8.0 use string('name', 125);
                $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
                $table->timestamps();

                $table->unique(['name', 'guard_name']);
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
            }
        );
    }
}
