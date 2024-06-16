<?php


class Book
{
    private $sourceFile = __DIR__ . '/books.csv';

    private $connection;

    private array $books = [];

    public function __construct()
    {
        $this->connection = fopen($this->sourceFile, 'w+');
    }

    public function all(): array
    {
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

    public function find(int $id)
    {
        $lineNumber = 0;
        while (!feof($this->connection)) {
            $line = fgetcsv($this->connection);
            if ($lineNumber === 0) {
                $lineNumber += 1;
                continue;
            }

            if ($line && $line['0'] == $id) {
                return ['id' => $line['0'], 'title' => $line['1'], 'author' => $line['2'], 'vendor' => $line['3']];
            }
        }

        throw new Exception("Book $id Not Found.");
    }

    public function decreaseQuantity(int $id){
        $lineNumber = 0;
        while (!feof($this->connection)) {
            $line = fgetcsv($this->connection);
            if ($lineNumber === 0) {
                $lineNumber += 1;
                continue;
            }

            if ($line && $line['0'] == $id && $line['3'] > 0) {
                $line['3'] = $line['3'] - 1;
                var_dump($line);
                // fputcsv($this->connection, $line);
            }
        }
    }
}
