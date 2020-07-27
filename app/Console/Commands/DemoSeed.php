<?php

/**
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @copyright Copyright (c) 2020, Nezuko - Content Management System
 */

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use App\Traits\Console\ConsoleTools;
use Illuminate\Console\Command;

class DemoSeed extends Command
{
    use ConsoleTools;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds fake data for demonstration or testing purposes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($migrate = $this->confirm('Do you wish to run database fresh migration?')) {
            $this->callSilent('migrate:fresh');
        }

        $this->alert('Demo seeder v1.0 (Author: PanjiNamjaElf');

        $this->warn('This process could take a few minutes');
        $this->warn('Press CTRL + C to abort');

        sleep(5);

        $this->output->newLine();

        $this->info('Creating user account...');

        $attribute = [
            'password' => bcrypt($password = 'nezuko'),
        ];

        if ($migrate) {
            $attribute = [
                'first_name' => 'Toyama',
                'last_name'  => 'Kasumi',
                'email'      => 'toyama.kasumi@nezuko.me',
                'password'   => bcrypt($password = 'nezuko'),
            ];
        }

        $user = factory(User::class)->create($attribute);

        $this->info('Creating posts for user id #'.$user->id.'...');

        factory(Post::class, 50)->create([
            'user_id' => $user->id,
        ]);

        $this->demoOutput($user->email, $password);
    }
}
