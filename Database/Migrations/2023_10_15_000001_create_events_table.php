<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateEventsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --

        $this->tableCreate(
            function (Blueprint $table): void {
                $table->uuid('id')->primary();
                $table->uuid('treatment_id')->nullable();
                $table->uuid('consent_id')->nullable();
                $table->string('subject_id');
                $table->string('ip');
                $table->string('action');
                $table->text('payload');
                $table->timestamps();

                $table
                    ->foreign('treatment_id')
                    ->references('id')
                    ->on('gdpr_treatment');

                $table
                    ->foreign('consent_id')
                    ->references('id')
                    ->on('gdpr_consent')
                    ->onDelete('set null');
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('email')) {
                //    $table->string('email')->nullable();
                // }
            }
        );
    }
}
