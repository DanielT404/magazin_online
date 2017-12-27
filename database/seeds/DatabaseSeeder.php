<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['red', 'green', 'blue', 'sky blue', 'cyan', 'purple', 'yellow', 'orange', 'indigo'];
        $lengths = ['S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'Custom'];
        $currencies = ['lei', '€', '$'];
        $options = ['Yes', 'No'];
        $bool = [true, false];

        DB::table('users')->insert([
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => str_random(5),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('subcategories')->insert([
            'name' => str_random(6),
            'category_id' => rand(1, 5),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('colors')->insert([
            'color' => array_random($colors),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('lengths')->insert([
            'length' => array_random($lengths),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('clients')->insert([
            'first_name' => str_random(2),
            'last_name' => str_random(2),
            'email' => str_random('5').'@gmail.com',
            'password' => bcrypt('secret'),
            'home_address' => str_random(20),
            'delivery_address' => str_random(10),
            'telephone_number' => '0736628004',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => str_random(10),
            'description' => str_random(30),
            'image' => 'https://placehold.it/350x150',
            'currency' => array_random($currencies),
            'price' => rand(1, 5000),
            'color_option' => array_random($options),
            'length_option' => array_random($options),
            'featured' => array_random($bool),
            'color_id' => rand(1, 5),
            'length_id' => rand(1, 5),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('orders')->insert([
            'client_id' => rand(1, 15),
            'product_id' => rand(1, 10),
            'quantity' => rand(1, 5),
            'total_price' => rand(1, 6000),
            'approved' => array_random($bool),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()

        ]);

        DB::table('promotions')->insert([
            'product_id' => rand(1, 20),
            'percentage' => rand(20.00, 50.00),
            'active' => array_random($bool),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('admins')->insert([
            'name' => 'dunno',
            'email' => str_random(5).'@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
