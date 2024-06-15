<?php

// load main page with user or admin selection
// admin:
    // load admin options : user managment, book managment, approve rent
        // user managment :
            // get first_name, last_name, nationl_code, set_id, sotre in file
            // show users:
            // update users:
            // delete users:
// user:
    // see books list
    // request to book a book
    // see his booked books


$title = "Library";

require_once __DIR__ . "/../core/Router.php";
require_once __DIR__ . "/../core/helpers.php";

Router::route();
