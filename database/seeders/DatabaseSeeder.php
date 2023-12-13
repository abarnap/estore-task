<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'Admin',
        ]);

        if (env('SEED_FACTORY', false)) {
            \App\Models\User::factory(20 * env('SEED_FACTORY_COUNT', 1))->create();

            $categories = [
                'Electronics' => ['Smartphones', 'Laptops', 'Cameras'],
                'Clothing' => ['Men\'s', 'Women\'s', 'Children\'s'],
                'Books' => ['Fiction', 'Non-Fiction', 'Science Fiction'],
            ];

            foreach ($categories as $categoryName => $subcategories) {
                $category = \App\Models\Category::create([
                    'name' => $categoryName,
                    'slug' => toSlug($categoryName),
                    'status' => true,
                ]);

                foreach ($subcategories as $subcategoryName) {
                    $category->subCategories()->create([
                        'name' => $subcategoryName,
                        'slug' => toSlug($subcategoryName),
                        'status' => true,
                    ]);
                }
            }

            $subCategories = \App\Models\SubCategory::all();
            foreach ($subCategories as $subcategory) {
                \App\Models\Item::factory(5 * env('SEED_FACTORY_COUNT'))->create([
                    'category_id' => $subcategory->category_id,
                    'sub_category_id' => $subcategory->id,
                ]);
            }
        }
    }
}
