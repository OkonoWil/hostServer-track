<!DOCTYPE html>
<html lang="en" class=" min-h-[100%]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body
    class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% w-full  h-screen flex flex-col justify-center items-center">
    <div class=" text-6xl font-bold text-white">@yield('title-center')</div>
    <div class="border-4 rounded-lg border-white mx-10 my-32 p-4 bg-white">
        @yield('content')
    </div>
</body>

</html>