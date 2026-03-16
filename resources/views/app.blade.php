<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Peter Cornelis - Full-Stack PHP Developer specializing in modern web development.">
        <meta name="keywords" content="Peter Cornelis, PHP Developer, Full-Stack Developer, Web Development, HTML, CSS, MySQL, Laravel, Tailwind CSS, Vue.js, Livewire, Alpine.js, Bootstrap, SQLite">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="/favicon.svg" sizes="any">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">


        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @inertiaHead

    </head>
    <body class="min-h-screen min-w-95 dark:bg-darkPrimary dark:text-darkText bg-primary text-text print:bg-white print:text-text transition-colors duration-500">
        @inertia
    </body>
</html>
