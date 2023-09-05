<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

final class CreateOauthPersonalAccessClientsTable extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableCreate(
            static function (Blueprint $blueprint) : void {
                $blueprint->bigIncrements('id');
                $blueprint->unsignedBigInteger('client_id');
                $blueprint->timestamps();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            static function (Blueprint $blueprint) : void {
            }
        );
    }
}
