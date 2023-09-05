<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLiveuserUsersTable.
 */
final class CreateUsersTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $blueprint) : void {
                $blueprint->id();
                $blueprint->string('name');
                $blueprint->string('email')->unique();
                $blueprint->timestamp('email_verified_at')->nullable();
                $blueprint->string('password');
                $blueprint->rememberToken();
                $blueprint->foreignId('current_team_id')->nullable();
                $blueprint->string('profile_photo_path', 2048)->nullable();
                $blueprint->timestamps();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $blueprint): void {
                if (! $this->hasColumn('current_team_id')) {
                    $blueprint->foreignId('current_team_id')->nullable();
                }
                
                if (! $this->hasColumn('profile_photo_path')) {
                    $blueprint->string('profile_photo_path', 2048)->nullable();
                }
                
                if (! $this->hasColumn('lang')) {
                    $blueprint->string('lang', 3)->nullable();
                }
            }
        );
    }
}
