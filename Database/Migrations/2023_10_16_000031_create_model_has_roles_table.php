<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $team_class = XotData::make()->getTeamClass();
                $table->id();
                $table->unsignedBigInteger('role_id');
                $table->uuidMorphs('model');
                $table->foreignIdFor($team_class, 'team_id')->nullable();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $team_class = XotData::make()->getTeamClass();
                if (! $this->hasColumn('team_id')) {
                    $table->foreignIdFor($team_class, 'team_id')->nullable();
                }
                if ('uuid' == $this->getColumnType('model_id')) {
                    $table->string('model_id', 36)->index()->change();
                }
                // $this->updateUser($table);
                $this->updateTimestamps($table);
            }
        );
    }
};
