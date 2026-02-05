<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {email} {password} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create or update an admin user';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $email = mb_strtolower(trim((string) $this->argument('email')));
        $password = (string) $this->argument('password');
        $name = $this->argument('name');

        $user = User::firstOrNew(['email' => $email]);
        $wasExisting = $user->exists;

        if (! $wasExisting) {
            $user->name = $name ?: 'Admin';
        } elseif ($name) {
            $user->name = $name;
        }

        $user->password = Hash::make($password);
        $user->is_admin = true;
        $user->save();

        if ($wasExisting) {
            $this->info("Пользователь {$email} обновлен и получил права администратора.");
        } else {
            $this->info("Администратор {$email} успешно создан.");
        }

        return self::SUCCESS;
    }
}
