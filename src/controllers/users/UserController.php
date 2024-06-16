<?php

require_once __DIR__ . "/../../models/BookedBook.php";

class UserController
{
    public function __invoke()
    {
        $title = "User";
        $user = ['name' => 'Amir', 'id' => 1];
        $bookedBooks = (new BookedBook)->bookedByUser(1)->all();
        return view('users/show', compact('title', 'bookedBooks', 'user'));
    }
}
