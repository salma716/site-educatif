<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pikolino - Site éducatif pour enfants</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Arial', sans-serif; }
        body { overflow-x: hidden; position: relative; }

        .video-background {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; overflow: hidden;
        }
        .video-background video {
            min-width: 100%; min-height: 100%; object-fit: cover; opacity: 0.5;
        }
        .content-overlay { position: relative; background: rgba(255,255,255,0.2); min-height: 100vh; }

        header {
            background: linear-gradient(135deg, #a388ee, #c8b6e2);
            padding: 20px;
            color: white;
            text-align: center;
        }
        .header-top { display: flex; justify-content: space-between; align-items: center; }
        .header-categories { display: flex; flex-wrap: wrap; justify-content: center; margin-top: 20px; gap: 10px; }
        .header-category {
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 12px;
            border-radius: 15px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .header-category:hover { background: rgba(255, 255, 255, 0.4); transform: translateY(-3px); }

        .logo img { height: 50px; width: auto; }

        main {
            padding: 40px 20px;
            max-width: 1200px;
            margin: auto;
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            background: linear-gradient(to right, #fd79a8, #6c5ce7);
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }
        .description {
            margin: 0 auto 40px;
            background: rgba(255,255,255,0.6);
            padding: 20px;
            border-radius: 15px;
            max-width: 700px;
            color: #6c5ce7;
            font-size: 1.2rem;
            line-height: 1.6;
        }
        .categories {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .category-item {
            width: 160px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: #333;
            transition: 0.3s;
            position: relative;
        }
        .category-item:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }
        .category-image {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }
        .category-name {
            font-weight: bold;
            padding: 10px 0;
            background: linear-gradient(to right, #6c5ce7, #a388ee);
            color: white;
            font-size: 1.1rem;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #a388ee, #c8b6e2);
            color: white;
            margin-top: 50px;
        }

        .video-controls {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 5;
            background-color: rgba(106, 17, 203, 0.7);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }
        .video-controls:hover {
            background-color: rgba(106, 17, 203, 0.9);
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .categories { gap: 10px; }
            .category-item { width: 120px; }
            .category-image { height: 90px; }
            .category-name { font-size: 0.9rem; }
            .header-top { flex-direction: column; gap: 10px; }
        }
        .video-background {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                z-index: -1;
            }

            #background-video {
                width: 100%;
                height: 100%;
                object-fit: cover; 
            }

    </style>
</head>

<body>
<div class="video-background">
    <video autoplay muted loop playsinline id="background-video">
        <source src="{{ asset('assets/images/php.mp4') }}" type="video/mp4">
        Votre navigateur ne prend pas en charge la lecture de vidéos.
    </video>
</div>


    <div class="video-controls" onclick="toggleVideo()" title="Pause/Play vidéo">
        <i id="video-icon">⏸</i>
    </div>

    <div class="content-overlay">
        <header>
            <div class="header-top">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/pikolino.png') }}" alt="Pikolino"></a>
                </div>
            </div>

            <div class="header-categories">
                @foreach($categories as $category)
                    <a href="{{ route('categories.user.show', $category->id) }}" class="header-category">
                        {{ $category->emoji ?? '🎲' }} {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </header>

        <main>
            <h1>Bienvenue sur Pikolino !</h1>

            <div class="description">
                🌈 Dans le monde de Pikolino 🎨✨<br>
                💤 Les rêves riment avec apprentissage 📚💡<br>
                🚀 Chaque jeu devient un voyage 🌍🎲
            </div>

            <div class="categories" id="categories-container">

                <a href="{{ url('/quiz') }}" class="category-item">
                    <img src="{{ asset('assets/images/quiz.png') }}" 
                         alt="Quiz" 
                         class="category-image">
                    <div class="category-name">
                        📝 Quiz
                    </div>
                </a>

                <a href="{{ url('/games') }}" class="category-item">
                    <img src="{{ asset('assets/images/game.png') }}" 
                         alt="Games" 
                         class="category-image">
                    <div class="category-name">
                        🎮 Games
                    </div>
                </a>

                @foreach($categories as $category)
                    <a href="{{ route('categories.user.show', $category->id) }}" class="category-item">
                        <img src="{{ $category->image_path ? asset($category->image_path) : asset('assets/images/default.png') }}" 
                             alt="{{ $category->name }}" 
                             class="category-image">
                        <div class="category-name">
                            {{ $category->emoji ?? '🎲' }} {{ $category->name }}
                        </div>
                    </a>
                @endforeach

            </div>
        </main>

        <footer>
            Site éducatif pour enfants © {{ date('Y') }}
        </footer>
    </div>

    <script>
        function toggleVideo() {
            var video = document.getElementById("background-video");
            var icon = document.getElementById("video-icon");
            if (video.paused) {
                video.play();
                icon.textContent = "⏸";
            } else {
                video.pause();
                icon.textContent = "▶";
            }
        }
    </script>

</body>
</html>