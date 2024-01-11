<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

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
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->id();
                $table->unsignedBigInteger('role_id');
                $table->uuidMorphs('model');
                $table->foreignId('team_id')->nullable();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $table->foreignId('team_id')->nullable()->change();
                if (! $this->hasColumn('team_id')) {
                    $table->foreignId('team_id')->nullable();
                }
                // $this->updateUser($table);
                $this->updateTimestamps($table);
            }
        );
    }
}
