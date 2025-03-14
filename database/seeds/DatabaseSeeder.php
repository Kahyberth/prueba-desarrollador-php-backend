<?php


use Illuminate\Database\Seeder;
use PHPUnit\Framework\Constraint\Count;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $this->call([
        CurrencyTableSeeder::class,
        CountryTableSeeder::class,
        CityTableSeeder::class,
        SearchTableSeeder::class,
    ]);
}

}
