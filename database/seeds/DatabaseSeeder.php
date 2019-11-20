<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(PromotionsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
    }
}
