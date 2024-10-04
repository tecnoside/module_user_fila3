<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Extra;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreateExtraTable.
 */
return new class extends XotBaseMigration {
    protected ?string $model_class = Extra::class;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->increments('id');
                $table->uuidMorphs('model');
                $table->schemalessAttributes('extra_attributes');
                $table->unique(['model_id', 'model_type'], 'morph_unique');
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('name')) {
                //    $table->string('name')->nullable();
                // }
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
                // if (! $this->hasIndex('morph_unique')) {
                //    $table->unique(['model_id', 'model_type'], 'morph_unique');
                // }

                if ($this->hasColumn('model_id') && 'bigint' === $this->getColumnType('model_id')) {
                    $table->string('model_id', 36)->index()->change();
                }
            }
        );
    }

    // end up

    // end down
};
