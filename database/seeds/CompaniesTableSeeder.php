<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		DB::table('companies')->truncate();
        $companies = factory(App\Models\Company::class, 15)->create();
    }
}