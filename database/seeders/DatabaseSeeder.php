<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Categories::create([
            'id' => 1,
            'nama' => 'Buah-buahan'
        ]);

        Categories::create([
            'id' => 2,
            'nama' => 'Sayuran'
        ]);

        Product::create([
            'nama' => 'Apel',
            'harga' => '7600',
            'stok' => '921',
            'deskripsi' => 'Apel ijo Banyumas',
            'category_id' => 1
        ]);

        Product::create([
            'nama' => 'Melon',
            'harga' => '9900',
            'stok' => '344',
            'deskripsi' => 'Melon enak',
            'category_id' => 1
        ]);

        Product::create([
            'nama' => 'Wortel',
            'harga' => '7400',
            'stok' => '969',
            'deskripsi' => 'Sayur anti buta',
            'category_id' => 2
        ]);
    }
}
