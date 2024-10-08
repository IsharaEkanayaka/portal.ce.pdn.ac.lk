<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();
        User::find(1)->assignRole(config('boilerplate.access.role.admin'), 'Editor');

        // Only for the local testings
        if (app()->environment(['local', 'testing'])) {
            User::find(2)->assignRole('Editor');
        }

        $this->enableForeignKeys();
    }
}