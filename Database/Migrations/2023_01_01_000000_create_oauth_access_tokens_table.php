<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

final class CreateOauthAccessTokensTable extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableCreate(
            static function (Blueprint $blueprint) : void {
                $blueprint->string('id', 100)->primary();
                $blueprint->unsignedBigInteger('user_id')->nullable()->index();
                // $table->foreignIdFor(User::class);
                $blueprint->unsignedBigInteger('client_id');
                $blueprint->string('name')->nullable();
                $blueprint->text('scopes')->nullable();
                $blueprint->boolean('revoked');
                $blueprint->timestamps();
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
