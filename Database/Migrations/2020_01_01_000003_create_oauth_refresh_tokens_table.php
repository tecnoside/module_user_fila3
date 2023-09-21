<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthAccessToken;
use Illuminate\Database\Migrations\Migration;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateOauthRefreshTokensTable extends XotBaseMigration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->string('id', 100)->primary();
                //$table->string('access_token_id', 100)->index();
                $table->foreignIdFor(OauthAccessToken::class, 'access_token_id')->index();
                $table->boolean('revoked');
                $table->dateTime('expires_at')->nullable();
            }
        );
    }


};
