<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                // $table->uuid('id')->primary();
                $table->id();
                $table->foreignId('team_id');
                $table->uuid('user_id')->nullable()->index();
                // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
                $table->string('role')->nullable();
                $table->timestamps();
                $table->unique(['team_id', 'user_id']);
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('created_by')) {
                //    $table->string('created_by')->nullable();
                // }

                // if (! $this->hasColumn('updated_by')) {
                //    $table->string('updated_by')->nullable();
                // }
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
                $this->updateUser($table);
            }
        );
    }
};
