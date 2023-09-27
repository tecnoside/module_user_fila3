<?php

declare(strict_types=1);

use Modules\User\Models\User;
use Modules\User\Models\OauthClient;
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

class CreateOauthAccessTokensTable extends XotBaseMigration
{
    public function up(): void
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();
        $this->tableCreate(
<<<<<<< HEAD:Database/Migrations/2023_01_01_000000_create_oauth_access_tokens_table.php
            function (Blueprint $table) use ($userClass) {
                $table->string('id', 100)->primary();
                // $table->unsignedBigInteger('user_id')->nullable()->index();
                $table->foreignIdFor($userClass, 'user_id')->nullable()->index();
                $table->unsignedBigInteger('client_id');
=======
            function (Blueprint $table): void {
                $table->string('id', 100)->primary();
                //$table->unsignedBigInteger('user_id')->nullable()->index();
                // $table->foreignIdFor(User::class);
                //$table->unsignedBigInteger('client_id');
                //$table->uuid('client_id');
                $table->foreignIdFor(User::class, 'user_id')->nullable()->index();
                $table->foreignIdFor(OauthClient::class, 'client_id');
>>>>>>> 010b661c570d5d6244a5bdbf1e60619c65665565:Database/Migrations/2023_01_01_000002_create_oauth_access_tokens_table.php
                $table->string('name')->nullable();
                $table->text('scopes')->nullable();
                $table->boolean('revoked');
                $table->timestamps();
                $table->dateTime('expires_at')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
<<<<<<< HEAD:Database/Migrations/2023_01_01_000000_create_oauth_access_tokens_table.php
            function (Blueprint $table): void {
            }
=======
            function (Blueprint $table): void {}
>>>>>>> 010b661c570d5d6244a5bdbf1e60619c65665565:Database/Migrations/2023_01_01_000002_create_oauth_access_tokens_table.php
        );
    }
}
