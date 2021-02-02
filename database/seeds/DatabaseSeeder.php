<?php

use Illuminate\Database\Seeder;
use App\Book;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'name' => 'Buku Test 1',
            'desc' => 'Deskripsi Buku Test 1',
            'writer' => 'Penulis buku',
            'price' => '10000',
        ]);
    }
}
