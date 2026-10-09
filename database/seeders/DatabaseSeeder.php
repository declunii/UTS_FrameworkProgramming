<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $it = Category::create(['name' => 'Teknologi Informasi', 'description' => 'Buku seputar pemrograman dan komputer.']);
        $mat = Category::create(['name' => 'Matematika', 'description' => 'Buku matematika dan statistika.']);
        Category::create(['name' => 'Fiksi', 'description' => null]);

        Book::create(['category_id' => $it->id, 'title' => 'Belajar Laravel untuk Pemula', 'author' => 'Budi Santoso', 'published_year' => 2023, 'stock' => 5]);
        Book::create(['category_id' => $it->id, 'title' => 'Dasar-Dasar Basis Data', 'author' => 'Siti Aminah', 'published_year' => 2021, 'stock' => 3]);
        Book::create(['category_id' => $mat->id, 'title' => 'Kalkulus Dasar', 'author' => 'Andi Wijaya', 'published_year' => 2019, 'stock' => 2]);
    }
}
