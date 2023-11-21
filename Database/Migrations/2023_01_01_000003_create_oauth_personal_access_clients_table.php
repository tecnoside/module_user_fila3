<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthClient;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateOauthPersonalAccessClientsTable extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableCreate(
            static function (Blueprint $table) : void {
                $table->uuid('id')->primary();
                // $table->unsignedBigInteger('client_id');
                // $table->uuid('client_id');
                $table->foreignIdFor(OauthClient::class, 'client_id');
                $table->timestamps();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $this->updateUser($table);
            }
        );
    }
}
