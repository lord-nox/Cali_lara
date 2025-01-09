<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Ultimate Calisthenics</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background: linear-gradient(to bottom, #ff5f6d, #ffc371); color: white;">
    <!-- Hero Section -->
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh; text-align: center; background: url('/images/bg.webp') no-repeat center center/cover;">
        <!-- Navbar -->
        @if (Route::has('login'))
        <div style="position: absolute; top: 20px; right: 20px; display: flex; gap: 15px;">
            @auth
                <a href="{{ url('/dashboard') }}" style="color: white; text-decoration: none; font-weight: bold; padding: 10px 20px; border: 2px solid white; border-radius: 5px; background-color: rgba(255, 255, 255, 0.1);">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" style="color: white; text-decoration: none; font-weight: bold; padding: 10px 20px; border: 2px solid white; border-radius: 5px; background-color: rgba(255, 255, 255, 0.1);">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="color: white; text-decoration: none; font-weight: bold; padding: 10px 20px; border: 2px solid white; border-radius: 5px; background-color: rgba(255, 255, 255, 0.1);">
                        Register
                    </a>
                @endif
            @endauth
        </div>
        @endif

        <!-- Welcome Text -->
        <h1 style="font-size: 4rem; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);">The Ultimate Calisthenics Platform</h1>
        <p style="font-size: 1.5rem; margin-bottom: 30px; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">Search for users below:</p>

        <!-- Search Bar -->
        <form action="{{ route('users.search') }}" method="GET" style="display: flex; justify-content: center;">
            <input 
                type="text" 
                name="query" 
                placeholder="Search users by name or email..." 
                style="padding: 15px; width: 300px; border: none; border-radius: 5px 0 0 5px; outline: none; font-size: 1rem; color: black;"
            >
            <button 
                type="submit" 
                style="padding: 15px; border: none; background: #ff2d20; color: white; font-size: 1rem; border-radius: 0 5px 5px 0; cursor: pointer;">
                Search
            </button>
        </form>
    </div>

    <!-- Footer -->
    <footer style="text-align: center; padding: 20px; background: rgba(0, 0, 0, 0.7); color: white; position: absolute; bottom: 0; width: 100%; font-size: 0.9rem;">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>
</body>
</html>
