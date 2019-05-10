<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * The tables that should be seeded.
     *
     * @var array
     */
    protected $tables = [
        'categories',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();

        // $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }

    /**
     * Truncate the tables.
     *
     * @return void
     */
    protected function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
