<?php

/**
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @copyright Copyright (c) 2020, Nezuko - Content Management System
 */

namespace App\Traits\Console;

trait ConsoleTools
{
    /**
     * Output demo seed.
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    private function demoOutput(string $email, string $password)
    {
        $length = 46;

        $this->output->newLine();

        $this->comment(str_repeat('*', $length));
        $this->comment('*  <fg=green>Demo data has been successfully seeded!</>   *');
        $this->comment(str_repeat('*', $length));

        $this->output->newLine();

        $this->info('You can now login with this credentials:');
        $this->comment('Email: '.sprintf('<fg=cyan>%s</>', $email));
        $this->comment('Password: '.sprintf('<fg=cyan>%s</>', $password));
    }
}
