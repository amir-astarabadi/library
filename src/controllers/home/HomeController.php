<?php


class HomeController
{
    public function __invoke()
    {
        $title = "Home";
        return view('main', compact('title'));
    }
}
