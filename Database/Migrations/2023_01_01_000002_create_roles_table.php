<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateRolesTable.
 */
class CreateRolesTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $teams = true;
        if (! is_array($tableNames)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        if (! is_array($columnNames)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) use ($columnNames) {
                // $teams = config('permission.teams');

                $table->bigIncrements('id'); // role id
                // if ($teams || config('permission.testing')) { // permission.testing is a fix for sqlite testing
                $table->unsignedBigInteger($columnNames['team_foreign_key'])->nullable();
                $table->index($columnNames['team_foreign_key'], 'roles_team_foreign_key_index');
                // $table
                //    ->foreignIdFor(
                //        model: $xot->getUserClass(),
                //        column: 'user_id',
                //    )
                // }
                $table->string('name');       // For MySQL 8.0 use string('name', 125);
                $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
                $table->timestamps();
                // if ($teams || config('permission.testing')) {
                //    $table->unique([$columnNames['team_foreign_key'], 'name', 'guard_name']);
                // } else {
                //    $table->unique(['name', 'guard_name']);
                // }
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('team_id')) {
                    $table->foreignId('team_id')->nullable()->index();
                    // $table
                    //    ->foreignIdFor(
                    //        model: $xot->getUserClass(),
                    //        column: 'user_id',
                    //    )
                    // }
                }
                // $table->string('team_id')->nullable()->change();
                if ($this->hasIndexName('name_guard_name_unique')) {
                    $table->dropIndex('roles_name_guard_name_unique');
                }
            }
        );
    }
}
