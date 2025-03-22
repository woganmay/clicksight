<?php

namespace App\Console\Commands\Support;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ResetPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'support:reset {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset a user\'s password by email address';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $email = $this->argument('email');
        $user = User::getByEmail($email);

        if (!$user) {
            $this->error("No user found with email: {$email}");
            return 1;
        }

        // Generate a random password
        $newPassword = Str::random(12);
        
        // Update the user's password
        $user->password = $newPassword;
        $user->save();

        $this->info("Password for {$email} has been reset.");
        $this->info("New password: {$newPassword}");

        return 0;
    }
}
