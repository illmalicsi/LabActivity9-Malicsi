<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col bg-slate-50 text-slate-900">
    <nav class="border-b border-orange-900/20 bg-orange-900 text-white shadow-sm">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold tracking-tight">
                Bakuna Tracker
            </a>

            <div class="flex items-center gap-4 text-sm">
        @auth
                    <a href="{{ route('dashboard') }}" class="hover:text-orange-200">Dashboard</a>
                    <a href="{{ route('schedule') }}" class="hover:text-orange-200">Schedule</a>
                    <span class="hidden border-l border-orange-700 pl-4 sm:inline">Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                        <button class="rounded bg-white/10 px-3 py-1.5 font-medium hover:bg-white/20">Logout</button>
                    </form>
        @endauth

        @guest
                    <a href="{{ route('login') }}" class="hover:text-orange-200">Sign in</a>
        @endguest
            </div>
        </div>
    </nav>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <footer class="mt-auto border-t border-slate-200 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-6 text-sm text-slate-500 sm:px-6 lg:px-8">
            Barangay Matina Crossing Health Center · Davao City
        </div>
    </footer>
</body>

</html>