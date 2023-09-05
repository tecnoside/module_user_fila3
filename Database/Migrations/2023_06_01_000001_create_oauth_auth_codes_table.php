<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

final class CreateOauthAuthCodesTable extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableCreate(
            static function (Blueprint $blueprint) : void {
                $blueprint->string('id', 100)->primary();
                $blueprint->unsignedBigInteger('user_id')->index();
                $blueprint->unsignedBigInteger('client_id');
                $blueprint->text('scopes')->nullable();
                $blueprint->boolean('revoked');
                $blueprint->dateTime('expires_at')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            static function (Blueprint $blueprint) : void {
            }
        );
    }
}
