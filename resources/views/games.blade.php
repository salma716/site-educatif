<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux Éducatifs Pikolino</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            min-height: 100vh;
        }
        
        header {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
            padding: 15px 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .logo img {
            height: 60px;
            transition: transform 0.3s;
        }
        
        .logo img:hover {
            transform: scale(1.1);
        }
        
        nav {
            display: flex;
            gap: 20px;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            padding: 8px 15px;
            border-radius: 20px;
            background-color: rgba(255,255,255,0.2);
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }
        
        nav a:hover {
            background-color: rgba(255,255,255,0.4);
            transform: translateY(-3px);
        }
        
        main {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 30px;
            color: #ff6b6b;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .games-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .game-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        
        .game-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .game-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .game-content {
            padding: 20px;
        }
        
        .game-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #6a11cb;
        }
        
        .game-description {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.5;
        }
        
        .play-btn {
            display: inline-block;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .play-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(106, 17, 203, 0.4);
        }
        
        .emoji {
            font-size: 1.5rem;
            margin-right: 8px;
        }
        
        footer {
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
            color: white;
            text-align: center;
            padding: 30px;
            margin-top: 50px;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-emoji {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        
    
        .game-section {
            margin-top: 50px;
            position: relative;
        }
        
        .game-message {
            position: absolute;
            top: -50px;
            left: 0;
            right: 0;
            padding: 15px;
            border-radius: 15px;
            text-align: center;
            font-size: 1.3rem;
            font-weight: bold;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
            z-index: 10;
            max-width: 80%;
            margin: 0 auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .game-message.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        .game-message.success {
            background-color: #81ecec;
            color: #2d3436;
        }
        
        .game-message.error {
            background-color: #ffbaba;
            color: #d63031;
        }
        
        .game-message.warning {
            background-color: #ffeaa7;
            color: #2d3436;
        }
        
        #memory-game {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: 80px;
        }
        
        .memory-board {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .memory-card {
            height: 100px;
            background-color: #6a11cb;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .memory-card.flipped {
            background-color: white;
            color: #333;
            transform: rotateY(180deg);
        }
        
        .memory-card.matched {
            background-color: #81ecec;
            cursor: default;
        }
        
        .game-stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            font-size: 1.2rem;
            color: #6a11cb;
        }
    
        #guessing-game {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: 80px;
            text-align: center;
        }
        
        .animal-image {
            width: 200px;
            height: 200px;
            object-fit: contain;
            border-radius: 15px;
            margin: 20px auto;
            display: block;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            background-color: white;
            padding: 10px;
        }
        
        .options-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }
        
        .option-btn {
            padding: 10px 20px;
            background-color: #a18cd1;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .option-btn:hover {
            background-color: #8c7ae6;
            transform: scale(1.05);
        }
        
        @media (max-width: 768px) {
            .games-container {
                grid-template-columns: 1fr;
            }
            
            .memory-board {
                grid-template-columns: repeat(4, 1fr);
            }
            
            .memory-card {
                height: 80px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .game-message {
                font-size: 1.1rem;
                top: -70px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <a href="/">
                    <img src="assets/images/PIKOLINO.png" alt="Pikolino Jeux Éducatifs">
                </a>
            </div>
            <nav>
                <a href="#"><span class="emoji">🏠</span> Accueil</a>
                <a href="#memory-game"><span class="emoji">🧠</span> Mémoire</a>
                <a href="#guessing-game"><span class="emoji">🐾</span> Animaux</a>
            </nav>
        </div>
    </header>
    
    <main>
        <h1><span class="emoji">🎮</span> Jeux Éducatifs <span class="emoji">🧩</span></h1>
        
        <div class="games-container">
            <div class="game-card">
                <div class="game-image" style="background-color: #a1c4fd; display: flex; justify-content: center; align-items: center; font-size: 4rem;">
                    🧠
                </div>
                <div class="game-content">
                    <h2 class="game-title">Jeu de Mémoire</h2>
                    <p class="game-description">
                        Trouve les paires identiques en retournant les cartes. Un excellent jeu pour exercer ta mémoire visuelle !
                    </p>
                    <a href="#memory-game" class="play-btn">Jouer maintenant</a>
                </div>
            </div>
            
            <div class="game-card">
                <div class="game-image" style="background-color: #ffecd2; display: flex; justify-content: center; align-items: center; font-size: 4rem;">
                    🐾
                </div>
                <div class="game-content">
                    <h2 class="game-title">Devinettes d'Animaux</h2>
                    <p class="game-description">
                        Devine le nom de l'animal qui apparaît. Apprends à reconnaître les animaux tout en t'amusant !
                    </p>
                    <a href="#guessing-game" class="play-btn">Jouer maintenant</a>
                </div>
            </div>
        </div>
        
    
        <div class="game-section">
            <div id="memory-message" class="game-message"></div>
            <section id="memory-game">
                <h2 style="text-align: center; color: #6a11cb; margin-bottom: 20px;"><span class="emoji">🧠</span> Jeu de Mémoire</h2>
                <div class="game-stats">
                    <div>Coups: <span id="moves">0</span></div>
                    <div>Paires trouvées: <span id="pairs">0</span>/8</div>
                </div>
                <div class="memory-board" id="memory-board">
                
                </div>
                <div style="text-align: center; margin-top: 20px;">
                    <button id="reset-memory" class="play-btn">Recommencer</button>
                </div>
            </section>
        </div>
    
        <div class="game-section">
            <div id="guessing-message" class="game-message"></div>
            <section id="guessing-game">
                <h2 style="color: #6a11cb; margin-bottom: 20px;"><span class="emoji">🐾</span> Devinettes d'Animaux</h2>
                <img id="animal-img" class="animal-image" src="" alt="Animal à deviner">
                <div class="options-container" id="options">
                
                </div>
                <div style="text-align: center; margin-top: 20px;">
                    <button id="next-animal" class="play-btn">Animal suivant</button>
                </div>
            </section>
        </div>
    </main>
    
    <footer>
        <div class="footer-content">
            <div class="footer-emoji">
                <span>🌈</span> <span>🎨</span> <span>📚</span> <span>🎲</span>
            </div>
            <p>© 2025 Pikolino - Jeux éducatifs pour enfants</p>
            <p>Apprendre en s'amusant chaque jour !</p>
        </div>
    </footer>
    
    <script>
        
        function showMessage(elementId, message, type) {
            const messageElement = document.getElementById(elementId);
            messageElement.textContent = message;
            messageElement.className = `game-message ${type} show`;
            
            
            setTimeout(() => {
                messageElement.classList.remove('show');
            }, 3000);
        }
        
    
        const memoryCards = ['🐶', '🐱', '🐭', '🐹', '🐰', '🦊', '🐻', '🐼'];
        let cards = [...memoryCards, ...memoryCards];
        let flippedCards = [];
        let matchedPairs = 0;
        let moves = 0;
        
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }
        
        function createMemoryBoard() {
            const board = document.getElementById('memory-board');
            board.innerHTML = '';
            shuffledCards = shuffleArray([...cards]);
            
            shuffledCards.forEach((card, index) => {
                const cardElement = document.createElement('div');
                cardElement.classList.add('memory-card');
                cardElement.dataset.index = index;
                cardElement.dataset.value = card;
                cardElement.textContent = '?';
                cardElement.addEventListener('click', flipCard);
                board.appendChild(cardElement);
            });
            
            moves = 0;
            matchedPairs = 0;
            document.getElementById('moves').textContent = moves;
            document.getElementById('pairs').textContent = matchedPairs;
            flippedCards = [];
        }
        
        function flipCard() {
            
            if (flippedCards.length === 2 || this.classList.contains('flipped') || this.classList.contains('matched')) {
                return;
            }
            
            this.textContent = this.dataset.value;
            this.classList.add('flipped');
            flippedCards.push(this);
            
            if (flippedCards.length === 2) {
                moves++;
                document.getElementById('moves').textContent = moves;
                checkForMatch();
            }
        }
        
        function checkForMatch() {
            const [card1, card2] = flippedCards;
            
            if (card1.dataset.value === card2.dataset.value) {
                card1.classList.add('matched');
                card2.classList.add('matched');
                matchedPairs++;
                document.getElementById('pairs').textContent = matchedPairs;
                flippedCards = [];
                
                
                showMessage('memory-message', `Bravo ! 🎉 Tu as trouvé une paire ${card1.dataset.value}`, 'success');
                
                if (matchedPairs === memoryCards.length) {
                    setTimeout(() => {
                        showMessage('memory-message', `Félicitations ! 🏆 Tu as gagné en ${moves} coups !`, 'success');
                    }, 500);
                }
            } else {
                setTimeout(() => {
                    card1.textContent = '?';
                    card2.textContent = '?';
                    card1.classList.remove('flipped');
                    card2.classList.remove('flipped');
                    flippedCards = [];
                    
                
                    showMessage('memory-message', 'Essaie encore ! 💪 Tu vas y arriver !', 'warning');
                }, 1000);
            }
        }
        
        
        const animals = [
            { name: 'Ours', image: 'assets/images/bear.png' },
            { name: 'Chat', image: 'assets/images/cat.png' },
            { name: 'Chien', image: 'assets/images/dog.png' },
            { name: 'Éléphant', image:'assets/images/elephant.png' },
            { name: 'Girafe', image: 'assets/images/Giraf.png' },
            { name: 'Cheval', image: 'assets/images/horse.png' },
            { name: 'Koala', image: 'assets/images/koala.png' },
            { name: 'Lion', image: 'assets/images/lion.png' },
            { name: 'Ours polaire', image: 'assets/images/polar bear.png' },
            { name: 'Zèbre', image: 'assets/images/zebra.png' }
        ];
        
        let currentAnimal;
        let options = [];
        
        function startGuessingGame() {
            
            const randomIndex = Math.floor(Math.random() * animals.length);
            currentAnimal = animals[randomIndex];
            
    
            document.getElementById('animal-img').src = currentAnimal.image;
            document.getElementById('animal-img').style.display = 'block';
            
            
            options = [currentAnimal.name];
            while (options.length < 4) {
                const randomAnimal = animals[Math.floor(Math.random() * animals.length)].name;
                if (!options.includes(randomAnimal)) {
                    options.push(randomAnimal);
                }
            }
            
        
            options = shuffleArray(options);
            

            const optionsContainer = document.getElementById('options');
            optionsContainer.innerHTML = '';
            
            options.forEach(option => {
                const button = document.createElement('button');
                button.classList.add('option-btn');
                button.textContent = option;
                button.addEventListener('click', () => checkAnswer(option));
                optionsContainer.appendChild(button);
            });
        }
        
        function checkAnswer(selectedOption) {
            if (selectedOption === currentAnimal.name) {
                showMessage('guessing-message', `Correct ! 🎉 C'est bien un ${currentAnimal.name}`, 'success');
            } else {
                showMessage('guessing-message', `Presque ! 😅 C'était un ${currentAnimal.name}`, 'error');
            }
        }
    
        document.addEventListener('DOMContentLoaded', () => {
            createMemoryBoard();
            startGuessingGame();
            
            document.getElementById('reset-memory').addEventListener('click', () => {
                createMemoryBoard();
                showMessage('memory-message', 'Nouvelle partie ! 🎮 Trouve toutes les paires !', 'success');
            });
            
        
            document.getElementById('next-animal').addEventListener('click', () => {
                startGuessingGame();
                showMessage('guessing-message', 'Nouvel animal à deviner ! 🐾', 'success');
            });
        });
    </script>
</body>
</html>