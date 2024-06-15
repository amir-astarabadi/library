<?php


class BookedBook
{
    private $sourceFile = __DIR__ . '/booked_books.csv';
    
    private $connection;

    private array $userBooks = [];

    public function __construct()
    {
        $this->connection = fopen($this->sourceFile, 'r');    
    }

    public function bookedByUser(int $user_id): self
    {
        while(!feof($this->connection)){
            $line = fgetcsv($this->connection);
            if($line && $line[0] == $user_id){
                $this->userBooks[] = ['title' => $line['2']];
            }
        }
        return $this;
    }

    public function all(): array
    {
        return $this->userBooks;
    }
}
