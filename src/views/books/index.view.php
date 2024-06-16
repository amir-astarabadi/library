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
        <h2 class="text-4xl mb-5">Books: </h2>
        <div class="flex flex-col space-y-5">
            <?php foreach ($books as $book) : ?>
                <div class="flex space-x-3 items-center">
                    <div class="bg-gray-200 rounded-lg w-1/4 pl-2 flex-row items-center text-start text-2xl"><?= $book['title'] ?>  </div>
                    <div class="bg-green-200 rounded-lg w-[180px] pl-2 flex-row items-center text-start text-2xl"><a href=<?= "/user/{$user['id']}/book/{$book['id']}" ?>> Reserve </a></div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html>