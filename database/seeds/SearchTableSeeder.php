<?php

use App\Search;
use Illuminate\Database\Seeder;

class SearchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Search::class, 4)->create();
    }
}
