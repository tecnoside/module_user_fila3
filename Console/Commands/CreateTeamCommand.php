<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Modules\Xot\Datas\XotData;

<<<<<<< HEAD
=======
use function count;
>>>>>>> origin/master
use function Laravel\Prompts\text;

class CreateTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:team-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a team';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $modelClass = XotData::make()->getTeamClass();

        $name = text(
            label: 'What is name of team?',
            placeholder: 'E.g. Moderator, ',
            // default: $user?->name,
            // hint: 'This will be displayed on your profile.'
        );

        $modelClass::create([
            'name' => $name,
        ]);

        $map = static function ($row) {
            return $row->toArray();
        };

        $rows = $modelClass::get()->map($map);

        if (count($rows) > 0) {
            $headers = array_keys($rows[0]);

            $this->newLine();
            $this->table($headers, $rows);
            $this->newLine();
        } else {
            $this->newLine();
            $this->warn('⚡ No Teams ['.$modelClass.']');
            $this->newLine();
        }
    }
}
