<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateOauthClientsTable extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableCreate(
            static function (Blueprint $blueprint): void {
                $blueprint->bigIncrements('id');
                $blueprint->unsignedBigInteger('user_id')->nullable()->index();
                // $table->foreignIdFor(User::class);
                $blueprint->string('name');
                $blueprint->string('secret', 100)->nullable();
                $blueprint->string('provider')->nullable();
                $blueprint->text('redirect');
                $blueprint->boolean('personal_access_client');
                $blueprint->boolean('password_client');
                $blueprint->boolean('revoked');
                $blueprint->timestamps();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            static function (Blueprint $blueprint): void {
            }
        );
    }
}
