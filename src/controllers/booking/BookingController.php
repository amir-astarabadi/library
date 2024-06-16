<?php

require_once __DIR__ . "/../../models/Booking.php";

class BookingController
{
    public function __invoke(int $userId, int $bookId)
    {
        $title = "Books";
        $message = (new Booking)->book($userId, $bookId);
        return header("Location", 'user');
    }
}
