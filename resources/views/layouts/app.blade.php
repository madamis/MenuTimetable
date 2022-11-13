<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    {{-- alpine --}}
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="h-full">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-100">
    <body class="h-full">
    ```
    -->
    <div class="min-h-full">
        @include('layouts.includes.nav')

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            </div>
        </header>

        <main>
            <div class="flex flex-row flex-wrap h-screen">
                <div class="w-full sm:w-1/3 md:w-1/4 bg-white min-h-full" aria-label="Sidebar">
                    <div class="py-4 px-3 dark:bg-gray-800">
                        <ul class="space-y-2">
                            <li>
                                <a href="/dashboard"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <span class="ml-3">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="/days"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <span class="ml-3">Days</span>
                                </a>
                            </li>
                            <li>
                                <a href="/slots"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <span class="ml-3">Slots</span>
                                </a>
                            </li>
                            <li>
                                <a href="/fooditems"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <span class="ml-3">Food items</span>
                                </a>
                            </li>
                            <li>
                                <a href="/foodcategories"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <span class="ml-3">Food categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="/combinations"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <span class="ml-3">Food combinations</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <span class="ml-3">Generate menu</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="w-full sm:w-2/3 md:w-3/4 py-6 sm:px-6 lg:px-8 h-full">
                    <!-- Replace with your content -->
                    <div>
                        @yield('content')
                    </div>
                    <!-- /End replace -->
                </div>
            </div>
        </main>
    </div>



    @vite('resources/js/app.js')


</body>

</html>
