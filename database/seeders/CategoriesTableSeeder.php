<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'General Information',
            'Account and Membership',
            'Products and Services',
            'Pricing and Billing',
            'Shipping and Delivery',
            'Returns and Exchanges',
            'Technical Support',
            'Policies and Terms',
            'Guides and Tutorials',
            'Feedback and Contact',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
