<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $title ?></title>
</head>

<body class="bg-zinc-400 h-full">

    <div class="h-screen flex flex-col items-center justify-center">
        <h2 class="text-4xl mb-5">I am </h2>
        <div class="flex flex-row space-x-5">
            <div class="py-3 px-5 bg-white rounded-lg w-[120px] text-center text-2xl"> <a href="/user"> User </a> </div>
            <div class="py-3 px-5 bg-white rounded-lg w-[120px] text-center text-2xl"> <a href="/admin"> Admin </a> </div>
        </div>
    </div>
</body>

</html>