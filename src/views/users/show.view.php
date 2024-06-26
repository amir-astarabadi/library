<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $title ?></title>
</head>

<body class="bg-zinc-400 h-full">

    <div class="h-screen flex flex-col justify-start p-4">
        <h2 class="text-4xl mb-5">Hi <?= $user['name'] ?></h2>
        <div class="bg-gray-200 rounded-lg w-[250px] p-2 text-center justify-center flex-row items-center text-2xl my-3"> <a href="/books"> Book a new Book </a> </div>
        <h2 class="text-4xl mb-5">Your Booked Books: </h2>
        <div class="flex flex-col space-y-5">
            <?php foreach ($bookedBooks as $book) : ?>
                <div class="bg-gray-200 rounded-lg w-[180px] pl-2 flex-row items-center text-start text-2xl"> <a href="/user"> <?= $book['title'] ?> </a> </div>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html>