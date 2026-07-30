<?php

namespace Database\Seeders;

use App\Models\Product;
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

        Product::create([
            'nama' => 'Apel',
            'harga' => '7600',
            'stok' => '921',
            'deskripsi' => 'Apel ijo Banyumas'
        ]);

        Product::create([
            'nama' => 'Melon',
            'harga' => '9900',
            'stok' => '344',
            'deskripsi' => 'Melon enak'
        ]);
    }
}
