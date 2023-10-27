<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ config("app.name", "Laravel") }}</title>
        <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet"
        />
        {{-- @vite("resources/css/app.scss") --}}
        @vite(["resources/css/app.scss", "resources/js/app.js"])
        <title>{{ $title ?? "Page Title" }}</title>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen w-full bg-gray-100">
            {{-- @include("layouts.navigation") --}}
            <!-- Page Heading -->
            @include("components.layouts.header")
            <!-- Page Content -->
            <main
                id="content"
                class="visible mx-auto max-w-7xl px-4 transition-all duration-300 ease-linear"
            >
                {{ $slot }}
            </main>
            <footer class="absolute bottom-0 w-full">
                <div class="mx-2 flex flex-row justify-between px-2 py-1">
                    <div>footer</div>
                    <div>Copyright © 2023</div>
                    <div>
                        Laravel
                        v{{ Illuminate\Foundation\Application::VERSION }} (PHP
                        v{{ PHP_VERSION }})
                    </div>
                </div>
            </footer>
        </div>
    <!--optional polyfill for promise-->
{{--<script src="https://unpkg.com/promise-polyfill/dist/polyfill.min.js"></script>--}}
<!--lib uses jszip-->
{{--<script src="https://unpkg.com/jszip/dist/jszip.min.js"></script>--}}
{{--<script src="https://volodymyrbaydalka.github.io/docxjs/dist/docx-preview.js"></script>--}}
    </body>
</html>
