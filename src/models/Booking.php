<?php

require_once __DIR__ . "/Book.php";
require_once __DIR__ . "/BookedBook.php";

class Booking
{
    private const LIMIT = 2;
    private $sourceFile = __DIR__ . '/booked_books.csv';

    private $connection;

    private array $books = [];

    public function __construct()
    {
        $this->connection = fopen($this->sourceFile, 'a');
    }

    public function book(int $userId, int $bookId): array
    {
        $bookService = new Book; 
        $book = $bookService->find($bookId);
        $bookedBooks = (new BookedBook)->bookedByUser($userId)->all();
        if(count($bookedBooks) >= self::LIMIT){
            throw new Exception("You Reached limit.");
        }
        if($book['vendor'] < 1){
            throw new Exception("Book not available now.");
        }
        fwrite($this->connection, implode(',', [$userId, $bookId, $book['title']]) . PHP_EOL);
        $bookService->decreaseQuantity($book['id']);
        // book
        // decrese vendor
        var_dump($book);
        die;
        $lineNumber = 0;
        while (!feof($this->connection)) {
            $line = fgetcsv($this->connection);
            if ($lineNumber === 0) {
                $lineNumber += 1;
                continue;
            }

            if ($line && $line['3'] > 0) {
                $this->books[] = ['id' => $line['0'], 'title' => $line['1'], 'author' => $line['2']];
            }
        }

        return $this->books;
    }
}
