<?php

declare(strict_types=1);

use Modules\User\Models\User;
use Modules\User\Models\OauthClient;
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateOauthAuthCodesTable extends XotBaseMigration
{
    public function up(): void
    {

        $this->tableCreate(
            function (Blueprint $table): void {
                $table->string('id', 100)->primary();
                //$table->unsignedBigInteger('user_id')->index();
                //$table->unsignedBigInteger('client_id');
                //$table->uuid('client_id');
                $table->foreignIdFor(User::class, 'user_id')->index();
                $table->foreignIdFor(OauthClient::class, 'client_id');
                $table->text('scopes')->nullable();
                $table->boolean('revoked');
                $table->dateTime('expires_at')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {}
        );
    }
}
