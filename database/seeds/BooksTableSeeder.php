<?php

use App\Book;
use Illuminate\Database\Seeder;



class BooksTableSeeder extends Seeder{
      public function run() {
        factory(Book::class, 50)->create();
    }

}
