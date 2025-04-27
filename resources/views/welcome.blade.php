<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Éducatif pour Enfants</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            color: #333;
            position: relative;
            overflow-x: hidden;
        }
        .description {
            font-size: 1.2rem;
            margin: 0 auto 40px;
            padding: 15px;
            background: linear-gradient(135deg, rgba(255,215,215,0.7) 0%, rgba(215,255,255,0.7) 100%);
            border-radius: 15px;
            max-width: 80%;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            color: #6c5ce7;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            border: 2px solid rgba(255,255,255,0.5);
            line-height: 1.6;
            text-align: center;
        }
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        .video-background video {
            position: absolute;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            object-fit: cover;
            opacity: 0.5; 
        }
        .content-overlay {
            position: relative;
            background-color: rgba(O, 0, 0, 0.4);
            min-height: 100vh;
        }
        header {
            display: flex;
            flex-direction: column;
            padding: 15px 30px;
            background: linear-gradient(135deg, #a388ee 0%, #c8b6e2 100%); 
            border-bottom: 1px solid #e9ecef;
            position: relative;
            z-index: 1;
            color: white;
        }
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .login-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .login-btn {
            padding: 8px 15px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            color: white;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .login-btn {
            background-color: #ff7675;
        }
        main {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        .logo img {
            height: 50px; 
            width: auto; 
            transition: transform 0.3s ease;
        }
        .logo img:hover {
            transform: scale(1.05); 
        }
        h1 {
            font-size: 2.8rem;
            margin-bottom: 40px;
            background: linear-gradient(to right, #fd79a8, #6c5ce7);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px;
            display: inline-block;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .close {
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .submit-btn {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .submit-btn:hover {
            background: linear-gradient(to right, #5700c2, #1a68e3);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(106, 17, 203, 0.3);
        }
        footer {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #a388ee 0%, #c8b6e2 100%); 
            color: white;
            margin-top: 40px;
            position: relative;
        }
        .main-content {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .welcome-message {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 30px;
            color: #2d3436;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
        }
        .action-button {
            padding: 12px 25px;
            border-radius: 30px;
            border: none;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            text-decoration: none;
            display: inline-block;
        }
        .start-button {
            background: linear-gradient(to right, #fd79a8, #6c5ce7);
            color: white;
        }
        .register-button {
            background: linear-gradient(to right, #55efc4, #6ab04c);
            color: #2d3436;
        }
        .action-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
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
            cursor: pointer;
            color: white;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        .video-controls:hover {
            background-color: rgba(106, 17, 203, 0.9);
            transform: scale(1.1);
        }
        @media (max-width: 768px) {
            .video-controls {
                bottom: 10px;
                right: 10px;
                width: 30px;
                height: 30px;
                font-size: 14px;
            }
            h1 {
                font-size: 2rem;
            }
            .action-buttons {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
            .welcome-message {
                font-size: 1rem;
            }
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

    </div>
    <div class="video-controls" onclick="toggleVideo()" title="Pause/Play vidéo">
        <i id="video-icon">⏸</i>
    </div>
    <div class="content-overlay">
        <header>
            <div class="header-top">
                <div class="logo">
                    <a href="{{ route('home') }}" title="Retour à l'accueil">
                        <img src="{{ asset('assets/images/pikolino.png') }}" alt="Pikolino - Jeux éducatifs pour enfants" class="logo-image">
                    </a>
                </div>
                <div class="login-area">
                    <a href="login" class="login-btn">Connexion</a>
                </div>
            </div>
        </header>
        <main>
            <h1>Bienvenue sur Pikolino !</h1>
            <div class="description">
                🌈 Dans le monde de Pikolino 🎨✨<br>
                💤 les rêves riment avec apprentissage 📚💡<br>
                🚀 et chaque jeu devient un voyage 🌍🎲
            </div>
            <div class="main-content">
                <div class="welcome-message">
                    <p>Bienvenue dans un monde d'apprentissage ludique et coloré ! Pikolino est un site éducatif conçu spécialement pour les enfants de 3 à 8 ans.</p>
                    <p>Notre mission est de rendre l'apprentissage amusant et interactif, en proposant des jeux et activités qui stimulent la curiosité et développent les compétences essentielles.</p>
                </div>
                <div class="action-buttons">
                    <a href="javascript:void(0)" class="action-button start-button">Commencer l'aventure</a>
                    <a href="custom_register" class="action-button register-button">Créer un compte</a>
                </div>
            </div>
        </main>
        <div id="loginModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeLoginModal()">&times;</span>
                <h2>Connexion</h2>
                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" required>
                    </div>
                    <button type="submit" class="submit-btn">Se connecter</button>
                </form>
                <p style="margin-top: 20px;">
                    <a href="#">Mot de passe oublié ?</a> | 
                    <a href="#">Créer un compte</a>
                </p>
            </div>
        </div>
        <footer style="
            background: linear-gradient(135deg, #8c7ae6 0%, #a388ee 100%);
            color: white;
            padding: 40px 0 20px;
            font-family: 'Arial', sans-serif;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.1);
        ">
            <div style="
                font-size: 2rem;
                text-align: center;
                margin-bottom: 25px;
                opacity: 0.8;
            ">
                <span style="margin: 0 15px; display: inline-block; transform: rotate(-5deg)">🌈</span>
                <span style="margin: 0 15px; display: inline-block; transform: rotate(3deg)">🎨</span>
                <span style="margin: 0 15px; display: inline-block; transform: rotate(-2deg)">📚</span>
                <span style="margin: 0 15px; display: inline-block; transform: rotate(5deg)">🎲</span>
            </div>
            <div style="
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
                gap: 30px;
            ">
                <div style="min-width: 200px; text-align: left;">
                    <h3 style="
                        color: #fff;
                        border-bottom: 2px solid rgba(255,255,255,0.3);
                        padding-bottom: 8px;
                        margin-bottom: 15px;
                        font-size: 1.2em;
                    ">
                        Pikolino
                    </h3>
                    <p style="margin: 10px 0; line-height: 1.5;">
                        Apprendre en s'amusant<br>
                        <span style="font-size: 0.9em; opacity: 0.9;">Pour les 3-8 ans</span>
                    </p>
                    <div style="margin-top: 15px;">
                        <a href="#" style="
                            color: white;
                            text-decoration: none;
                            display: inline-flex;
                            align-items: center;
                            margin-right: 15px;
                        ">
                            <span style="margin-right: 5px;">📧</span> Contact
                        </a>
                    </div>
                </div>
                <div style="min-width: 200px; text-align: left;">
                    <h3 style="
                        color: #fff;
                        border-bottom: 2px solid rgba(255,255,255,0.3);
                        padding-bottom: 8px;
                        margin-bottom: 15px;
                        font-size: 1.2em;
                    ">
                        Explorer
                    </h3>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin: 8px 0;">
                            <a href="/" style="
                                color: white;
                                text-decoration: none;
                                transition: all 0.2s;
                                display: inline-block;
                            " onmouseover="this.style.transform='translateX(5px)'" 
                            onmouseout="this.style.transform='translateX(0)'">
                                🏠 Accueil
                            </a>
                        </li>
                    </ul>
                </div>
                <div style="min-width: 200px; text-align: left;">
                    <h3 style="
                        color: #fff;
                        border-bottom: 2px solid rgba(255,255,255,0.3);
                        padding-bottom: 8px;
                        margin-bottom: 15px;
                        font-size: 1.2em;
                    ">
                        Nous suivre
                    </h3>
                    <div style="display: flex; gap: 15px; margin-top: 20px;">
                        <a href="#" style="
                            color: white;
                            text-decoration: none;
                            font-size: 1.5em;
                            transition: transform 0.3s;
                        " onmouseover="this.style.transform='scale(1.2)'" 
                        onmouseout="this.style.transform='scale(1)'">
                            📱
                        </a>
                        <a href="#" style="
                            color: white;
                            text-decoration: none;
                            font-size: 1.5em;
                            transition: transform 0.3s;
                        " onmouseover="this.style.transform='scale(1.2)'" 
                        onmouseout="this.style.transform='scale(1)'">
                            📹
                        </a>
                        <a href="#" style="
                            color: white;
                            text-decoration: none;
                            font-size: 1.5em;
                            transition: transform 0.3s;
                        " onmouseover="this.style.transform='scale(1.2)'" 
                        onmouseout="this.style.transform='scale(1)'">
                            🎵
                        </a>
                    </div>
                </div>
            </div>
            <div style="
                margin-top: 40px;
                padding-top: 20px;
                text-align: center;
                border-top: 1px solid rgba(255,255,255,0.2);
                font-size: 0.9em;
                opacity: 0.8;
            ">
                <p style="margin: 0;">
                    © 2025 Pikolino - Tous droits réservés<br>
                    <span style="font-size: 0.9em;">Conçu avec ❤️ pour les enfants</span>
                </p>
            </div>
        </footer>
    </div>
    <script>
        function openLoginModal() {
            document.getElementById("loginModal").style.display = "block";
        }
        function closeLoginModal() {
            document.getElementById("loginModal").style.display = "none";
        }
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
        document.getElementById("background-video").addEventListener('error', function() {
            this.src = "https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.0/examples/bubbles.mp4";
        });
        window.addEventListener('resize', function() {
            var video = document.getElementById("background-video");
            if (window.innerWidth / window.innerHeight > 16 / 9) {
                video.style.width = "100%";
                video.style.height = "auto";
            } else {
                video.style.width = "auto";
                video.style.height = "100%";
            }
        });
        window.dispatchEvent(new Event('resize'));
    </script>
</body>
</html>