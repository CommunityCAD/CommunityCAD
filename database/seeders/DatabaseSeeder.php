<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $sql_defaults = [
            'database/db_defaults/cad_settings.sql',
            'database/db_defaults/civilian_levels.sql',
            'database/db_defaults/departments.sql',
            'database/db_defaults/licenses_defaults.sql',
            'database/db_defaults/permissions.sql',
            'database/db_defaults/statuses.sql',
            'database/db_defaults/users.sql',
        ];

        foreach ($sql_defaults as $query) {
            DB::unprepared(file_get_contents($query));
        }
        $this->command->info('Default Values Seeded');
    }
}
