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
            'database/db_defaults/v1.0.2.0-sql.sql',
        ];

        foreach ($sql_defaults as $query) {
            DB::unprepared(file_get_contents($query));
        }
        $this->command->info('Default Values Seeded');
    }
}
