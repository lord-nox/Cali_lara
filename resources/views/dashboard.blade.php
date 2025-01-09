<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('/images/dashboard-bg.jpg') no-repeat center center/cover;
            color: white;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            font-size: 0.9rem;
            z-index: 10;
        }

        .content {
            padding-bottom: 100px; /* Prevent content from overlapping with the footer */
        }

        a {
            text-decoration: none;
            color: white;
        }

        /* Button styles */
        a.button {
            display: inline-block;
            padding: 10px 20px;
            font-weight: bold;
            border: 2px solid white;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        a.button:hover {
            background-color: rgba(255, 255, 255, 0.3);
            color: black;
        }

        .feature {
            text-align: center;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            padding: 20px;
            border-radius: 10px;
            width: 200px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .feature img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
            filter: invert(80%) sepia(30%) saturate(500%) hue-rotate(200deg) brightness(90%) contrast(85%);
        }

        .feature h3 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .feature p {
            margin: 10px 0;
        }

        .features-section {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 50px;
        }

        .features-section .feature:hover img {
            filter: invert(60%) sepia(90%) saturate(700%) hue-rotate(180deg) brightness(90%) contrast(100%);
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px;">
        <!--<h1 style="font-size: 2.5rem; font-weight: bold;">Welcome to Calisthenics</h1> -->
        <nav style="display: flex; gap: 20px;">
            <a href="{{ route('home') }}" class="button">Home</a>
            <a href="{{ route('news.index') }}" class="button">News</a>
            <a href="{{ route('faq.index') }}" class="button">FAQ</a>
            <a href="{{ route('profile.edit') }}" class="button">Profile</a>
        </nav>
    </div>

    <!-- Hero Section -->
    <div class="content">
        <div style="text-align: center; padding: 50px;">
            <h1 style="font-size: 4rem; font-weight: bold; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);">Welcome to Calisthenics</h1>
            <p style="font-size: 1.5rem; margin-top: 20px; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">Dynamic Community Platform</p>
        </div>

        <!-- Features Section -->
        <div class="features-section">
            <div class="feature">
                <img src="/images/home-icon.png" alt="Home">
                <h3>Home</h3>
                <p>Find everything about calisthenics and more.</p>
                <a href="{{ route('home') }}" class="button">Go to Home</a>
            </div>
            <div class="feature">
                <img src="/images/news-icon.png" alt="News">
                <h3>News</h3>
                <p>Stay updated with the latest calisthenics news.</p>
                <a href="{{ route('news.index') }}" class="button">Read News</a>
            </div>
            <div class="feature">
                <img src="/images/faq-icon.png" alt="FAQ">
                <h3>FAQ</h3>
                <p>Find answers to frequently asked questions.</p>
                <a href="{{ route('faq.index') }}" class="button">Visit FAQ</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </footer>
</body>
</html>
