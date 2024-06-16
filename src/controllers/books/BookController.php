<?php

require_once __DIR__ . "/../../models/Book.php";

class BookController
{
    public function __invoke()
    {
        $title = "Books";
        $user = ['name' => 'Amir', 'id' => 1];  
        $books = (new Book)->all();
        return view('books/index', compact('title', 'books', 'user'));
    }
}
