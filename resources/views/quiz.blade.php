<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Pikolino - Apprendre en s'amusant</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        .quiz-result {
    margin-top: 20px;
    padding: 15px;
    border-radius: 10px;
    text-align: center;
    font-size: 1.1rem;
    font-weight: bold;
    display: none;
    animation: fadeIn 0.5s ease;
}

.quiz-result.success {
    background-color: #81ecec;
    color: #2d3436;
}

.quiz-result.partial {
    background-color: #ffeaa7;
    color: #2d3436;
}

.quiz-result.fail {
    background-color: #ffbaba;
    color: #d63031;
}

.score {
    font-size: 1.5rem;
    margin-top: 10px;
    padding: 5px 15px;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    display: inline-block;
}

        body {
            color: #333;
            position: relative;
            overflow-x: hidden;
            background: linear-gradient(135deg, rgba(255,215,215,0.3) 0%, rgba(215,255,255,0.3) 100%);
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

        .header-categories {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            padding: 10px 0;
        }
        
        .header-category {
            padding: 5px 12px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .header-category:hover {
            background-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-3px);
        }
        
        .logo img {
            height: 50px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .logo img:hover {
            transform: scale(1.05);
        }
        
        main {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-align: center;
            background: linear-gradient(to right, #fd79a8, #6c5ce7);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }
        
        .quiz-intro {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px;
            background: linear-gradient(135deg, rgba(255,215,215,0.7) 0%, rgba(215,255,255,0.7) 100%);
            border-radius: 10px;
        }
        
        .quiz-intro p {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: #6c5ce7;
        }
        
        .quiz-nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
        }
        
        .quiz-nav-item {
            padding: 12px 20px;
            background-color: #a388ee;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .quiz-nav-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
            background-color: #8c7ae6;
        }
        
        .quiz-section {
            margin-bottom: 50px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .quiz-section h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
            color: #6c5ce7;
        }
        
        .quiz-question {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }
        
        .quiz-question h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #2d3436;
        }
        
        .options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .option {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
        }
        
        .option:hover {
            background-color: #e9ecef;
            transform: translateX(5px);
        }
        
        .option input {
            margin-right: 10px;
        }
        
        .submit-quiz {
            display: block;
            margin: 30px auto 0;
            padding: 12px 25px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .submit-quiz:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(106, 17, 203, 0.3);
        }
        
        .quiz-result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            font-size: 1.1rem;
            font-weight: bold;
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        .quiz-result.success {
            background-color: #81ecec;
            color: #2d3436;
        }
        
        .quiz-result.partial {
            background-color: #ffeaa7;
            color: #2d3436;
        }
        
        .quiz-result.fail {
            background-color: #ffbaba;
            color: #d63031;
        }
        
        .score {
            font-size: 1.5rem;
            margin-top: 10px;
            padding: 5px 15px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            display: inline-block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #6c5ce7;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 1.5rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            opacity: 0.8;
            transition: all 0.3s ease;
        }
        
        .back-to-top:hover {
            opacity: 1;
            transform: translateY(-5px);
        }
        
        footer {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #8c7ae6 0%, #a388ee 100%);
            color: white;
            margin-top: 40px;
        }
        
        .category-couleurs { background-color: #ffe0e0; }
        .category-animaux { background-color: #e0f0ff; }
        .category-fruits { background-color: #ffebd9; }
        .category-vehicules { background-color: #e5e0ff; }
        
        @media (max-width: 768px) {
            .quiz-nav {
                flex-direction: column;
                align-items: center;
            }
            
            .quiz-nav-item {
                width: 80%;
                text-align: center;
            }
            
            .quiz-section {
                padding: 15px;
            }
            
            .option {
                padding: 10px;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-top">
            <div class="logo">
                <a href="/" title="Retour à l'accueil">
                <img src="assets/images/PIKOLINO.png" alt="Pikolino Jeux Éducatifs">
                </a>
            </div>
        </div>
        <div class="header-categories">
            <a href="#" class="header-category">Couleurs 🌈</a>
            <a href="#" class="header-category">Animaux 🐾</a>
            <a href="#" class="header-category">Drapeaux 🏳️</a>
            <a href="#" class="header-category">Légumes 🥕</a>
            <a href="#" class="header-category">Fruits 🍓</a>
            <a href="#" class="header-category">Saisons 🍂</a>
            <a href="#" class="header-category">Véhicules 🚌</a>
            <a href="#" class="header-category">Lettres 🔤</a>
            <a href="#" class="header-category">Nombres 🔢</a>
            <a href="quiz.html" class="header-category">Quiz 📝</a>
            <a href="jeux.html" class="header-category">Jeux 🎮</a>
        </div>
    </header>
    
    <main>
        <h1>Quiz Pikolino 🧩</h1>
        
        <div class="quiz-intro">
            <p>Bienvenue dans l'univers des quiz de Pikolino ! 🎮 🎯 🎪</p>
            <p>Choisis une catégorie et teste tes connaissances avec nos questions amusantes. 🤔 💭 🧠</p>
            <p>Tu peux gagner des étoiles ⭐ pour chaque bonne réponse et obtenir une note sur 10 ! 🎉 🏆 🥇</p>
        </div>
        
       
        <div class="quiz-nav" id="quiz-nav">
            <a href="#quiz-couleurs" class="quiz-nav-item">Quiz Couleurs 🌈 🎨</a>
            <a href="#quiz-animaux" class="quiz-nav-item">Quiz Animaux 🐘 🦁</a>
            <a href="#quiz-fruits" class="quiz-nav-item">Quiz Fruits 🍎 🍌</a>
            <a href="#quiz-vehicules" class="quiz-nav-item">Quiz Véhicules 🚗 🚲</a>
        </div>
        
        
        <section class="quiz-section category-couleurs" id="quiz-couleurs">
            <h2>Quiz Couleurs 🌈 🎨 🖌️</h2>
            
            <div class="quiz-question">
                <h3>Question 1: Quelle est la couleur du ciel par une belle journée ? ☀️</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="couleurs-q1" value="rouge"> Rouge 🔴
                    </label>
                    <label class="option">
                        <input type="radio" name="couleurs-q1" value="bleu" data-correct="true"> Bleu 🔵
                    </label>
                    <label class="option">
                        <input type="radio" name="couleurs-q1" value="vert"> Vert 🟢
                    </label>
                </div>
            </div>
            
            <div class="quiz-question">
                <h3>Question 2: Quelle couleur obtient-on en mélangeant du bleu et du jaune ? 🧪</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="couleurs-q2" value="orange"> Orange 🟠
                    </label>
                    <label class="option">
                        <input type="radio" name="couleurs-q2" value="vert" data-correct="true"> Vert 🟢
                    </label>
                    <label class="option">
                        <input type="radio" name="couleurs-q2" value="violet"> Violet 🟣
                    </label>
                </div>
            </div>
            
            <div class="quiz-question">
                <h3>Question 3: De quelle couleur est une banane mûre ? 🍌</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="couleurs-q3" value="jaune" data-correct="true"> Jaune 🟡
                    </label>
                    <label class="option">
                        <input type="radio" name="couleurs-q3" value="marron"> Marron 🟤
                    </label>
                    <label class="option">
                        <input type="radio" name="couleurs-q3" value="vert"> Vert 🟢
                    </label>
                </div>
            </div>
            
            <button class="submit-quiz" data-quiz="couleurs">Valider mes réponses ✅</button>
            <div class="quiz-result" id="result-couleurs"></div>
        </section>
        
        
        <section class="quiz-section category-animaux" id="quiz-animaux">
            <h2>Quiz Animaux 🐘 🦁 🐯</h2>
            
            <div class="quiz-question">
                <h3>Question 1: Quel animal est le plus grand du monde ? 🌍</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="animaux-q1" value="girafe"> La girafe 🦒
                    </label>
                    <label class="option">
                        <input type="radio" name="animaux-q1" value="elephant"> L'éléphant 🐘
                    </label>
                    <label class="option">
                        <input type="radio" name="animaux-q1" value="baleine" data-correct="true"> La baleine bleue 🐋
                    </label>
                </div>
            </div>
            
            <div class="quiz-question">
                <h3>Question 2: Quel animal dort la tête en bas ? 💤</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="animaux-q2" value="singe"> Le singe 🐒
                    </label>
                    <label class="option">
                        <input type="radio" name="animaux-q2" value="chauve-souris" data-correct="true"> La chauve-souris 🦇
                    </label>
                    <label class="option">
                        <input type="radio" name="animaux-q2" value="paresseux"> Le paresseux 🦥
                    </label>
                </div>
            </div>
            
            <div class="quiz-question">
                <h3>Question 3: Combien de pattes a une araignée ? 🕸️</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="animaux-q3" value="6"> 6 pattes 🔢
                    </label>
                    <label class="option">
                        <input type="radio" name="animaux-q3" value="8" data-correct="true"> 8 pattes 🕷️
                    </label>
                    <label class="option">
                        <input type="radio" name="animaux-q3" value="10"> 10 pattes 🔟
                    </label>
                </div>
            </div>
            
            <button class="submit-quiz" data-quiz="animaux">Valider mes réponses ✅</button>
            <div class="quiz-result" id="result-animaux"></div>
        </section>
        
        
        <section class="quiz-section category-fruits" id="quiz-fruits">
            <h2>Quiz Fruits 🍎 🍌 🍇</h2>
            
            <div class="quiz-question">
                <h3>Question 1: Quel fruit pousse sur un palmier ? 🌴</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="fruits-q1" value="banane"> La banane 🍌
                    </label>
                    <label class="option">
                        <input type="radio" name="fruits-q1" value="noix-de-coco" data-correct="true"> La noix de coco 🥥
                    </label>
                    <label class="option">
                        <input type="radio" name="fruits-q1" value="pomme"> La pomme 🍎
                    </label>
                </div>
            </div>
            
            <div class="quiz-question">
                <h3>Question 2: De quelle couleur est l'intérieur d'un kiwi ? 🥝</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="fruits-q2" value="vert" data-correct="true"> Vert 🟢
                    </label>
                    <label class="option">
                        <input type="radio" name="fruits-q2" value="rouge"> Rouge 🔴
                    </label>
                    <label class="option">
                        <input type="radio" name="fruits-q2" value="jaune"> Jaune 🟡
                    </label>
                </div>
            </div>
            
            <div class="quiz-question">
                <h3>Question 3: Quel est le fruit préféré des singes ? 🐒</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="fruits-q3" value="pomme"> La pomme 🍎
                    </label>
                    <label class="option">
                        <input type="radio" name="fruits-q3" value="banane" data-correct="true"> La banane 🍌
                    </label>
                    <label class="option">
                        <input type="radio" name="fruits-q3" value="fraise"> La fraise 🍓
                    </label>
                </div>
            </div>
            
            <button class="submit-quiz" data-quiz="fruits">Valider mes réponses ✅</button>
            <div class="quiz-result" id="result-fruits"></div>
        </section>
        

        <section class="quiz-section category-vehicules" id="quiz-vehicules">
            <h2>Quiz Véhicules 🚗 🚲 🚂</h2>
            
            <div class="quiz-question">
                <h3>Question 1: Quel véhicule vole dans le ciel ? ☁️</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="vehicules-q1" value="voiture"> La voiture 🚗
                    </label>
                    <label class="option">
                        <input type="radio" name="vehicules-q1" value="avion" data-correct="true"> L'avion ✈️
                    </label>
                    <label class="option">
                        <input type="radio" name="vehicules-q1" value="bateau"> Le bateau 🚢
                    </label>
                </div>
            </div>
            
            <div class="quiz-question">
                <h3>Question 2: Combien de roues a un tricycle ? 🚴</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="vehicules-q2" value="2"> 2 roues 🛵
                    </label>
                    <label class="option">
                        <input type="radio" name="vehicules-q2" value="3" data-correct="true"> 3 roues 🛴
                    </label>
                    <label class="option">
                        <input type="radio" name="vehicules-q2" value="4"> 4 roues 🚙
                    </label>
                </div>
            </div>
            
            <div class="quiz-question">
                <h3>Question 3: Qui conduit un camion de pompiers ? 🚒</h3>
                <div class="options">
                    <label class="option">
                        <input type="radio" name="vehicules-q3" value="facteur"> Le facteur 📮
                    </label>
                    <label class="option">
                        <input type="radio" name="vehicules-q3" value="policier"> Le policier 👮
                    </label>
                    <label class="option">
                        <input type="radio" name="vehicules-q3" value="pompier" data-correct="true"> Le pompier 🧑‍🚒
                    </label>
                </div>
            </div>
            
            <button class="submit-quiz" data-quiz="vehicules">Valider mes réponses ✅</button>
            <div class="quiz-result" id="result-vehicules"></div>
        </section>
    </main>
    
    <a href="#" class="back-to-top" title="Retour en haut">↑</a>
    
    <footer>
        <div style="font-size: 2rem; text-align: center; margin-bottom: 25px; opacity: 0.8;">
            <span style="margin: 0 15px; display: inline-block; transform: rotate(-5deg)">🌈</span>
            <span style="margin: 0 15px; display: inline-block; transform: rotate(3deg)">🎨</span>
            <span style="margin: 0 15px; display: inline-block; transform: rotate(-2deg)">📚</span>
            <span style="margin: 0 15px; display: inline-block; transform: rotate(5deg)">🎲</span>
            <span style="margin: 0 15px; display: inline-block; transform: rotate(-4deg)">🎯</span>
            <span style="margin: 0 15px; display: inline-block; transform: rotate(2deg)">🧩</span>
            <span style="margin: 0 15px; display: inline-block; transform: rotate(-3deg)">🎪</span>
        </div>
        <p>© 2025 Pikolino - Tous droits réservés</p>
        <p>Conçu avec ❤️ pour les enfants curieux et créatifs 🧠 ✨</p>
    </footer>
    
    <script>
        
        document.querySelectorAll('.quiz-nav-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            });
        });
        
        document.querySelectorAll('.submit-quiz').forEach(button => {
            button.addEventListener('click', function() {
                
                const quizType = this.getAttribute('data-quiz');
                const resultDiv = document.getElementById('result-' + quizType);
                
                
                let correctCount = 0;
                let totalQuestions = 0;
                
        
                const quizSection = this.closest('.quiz-section');
                const questions = quizSection.querySelectorAll('.quiz-question');
                
                questions.forEach(question => {
                    totalQuestions++;
                    const options = question.querySelectorAll('input[type="radio"]');
                    let answered = false;
                    let correct = false;
                    
                    options.forEach(option => {
                        if (option.checked) {
                            answered = true;
                            if (option.hasAttribute('data-correct')) {
                                correct = true;
                            }
                        }
                    });
                    
                    if (answered && correct) {
                        correctCount++;
                    }
                });
                
            
                const score = Math.round((correctCount / totalQuestions) * 10);
                
                let message = '';
                
                if (score === 10) {
                    resultDiv.style.backgroundColor = '#81ecec'; 
                    switch(quizType) {
                        case 'couleurs':
                            message = 'Bravo ! 🎉 Tu as tout bon ! Tu connais vraiment bien tes couleurs ! 🌈 🎨';
                            break;
                        case 'animaux':
                            message = 'Incroyable ! 🏆 Tu as tout bon ! Tu es un vrai expert des animaux ! 🦁 🐯 🐘';
                            break;
                        case 'fruits':
                            message = 'Parfait ! 🥇 Tu as tout bon ! Tu connais très bien les fruits ! 🍎 🍌 🍓';
                            break;
                        case 'vehicules':
                            message = 'Excellent ! 🚀 Tu as tout bon ! Tu es un champion des véhicules ! 🚗 ✈️ 🚂';
                            break;
                    }
                } else if (score >= 5) {
                    resultDiv.style.backgroundColor = '#ffeaa7';
                    switch(quizType) {
                        case 'couleurs':
                            message = 'Pas mal ! 😊 Tu as obtenu quelques bonnes réponses sur les couleurs. Continue de t\'entraîner ! 🌈';
                            break;
                        case 'animaux':
                            message = 'Bien essayé ! 🦊 Tu connais déjà plusieurs animaux. Continue d\'apprendre ! 🐾';
                            break;
                        case 'fruits':
                            message = 'Bien joué ! 🍓 Tu connais plusieurs fruits. Encore un peu de pratique et tu seras expert ! 🥝';
                            break;
                        case 'vehicules':
                            message = 'Bon travail ! 🚲 Tu connais déjà plusieurs véhicules. Continue d\'explorer ! 🚌';
                            break;
                    }
                } else {
                    resultDiv.style.backgroundColor = '#ffbaba'; 
                    switch(quizType) {
                        case 'couleurs':
                            message = 'Continue d\'apprendre ! 🌟 Les couleurs peuvent être difficiles, mais tu vas progresser ! 🎨';
                            break;
                        case 'animaux':
                            message = 'Continue de découvrir le monde animal ! 🦓 Tu vas apprendre plein de choses intéressantes ! 🦔';
                            break;
                        case 'fruits':
                            message = 'Continue d\'explorer les fruits ! 🍊 Bientôt tu seras un expert en fruits ! 🍈';
                            break;
                        case 'vehicules':
                            message = 'Continue de découvrir les véhicules ! 🚜 Tu vas devenir un champion ! 🚁';
                            break;
                    }
                }
                
                resultDiv.innerHTML = message + '<div class="score">Note : ' + score + '/10</div>';
                resultDiv.style.display = 'block';
            
                resultDiv.style.animation = 'none';
                setTimeout(() => {
                    resultDiv.style.animation = 'fadeIn 0.5s ease';
                }, 10);
                
                setTimeout(() => {
                    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 100);
            });
        });
        
        window.addEventListener('scroll', function() {
            const backToTop = document.querySelector('.back-to-top');
            
            if (window.pageYOffset > 300) {
                backToTop.style.display = 'flex';
            } else {
                backToTop.style.display = 'none';
            }
        });
        document.querySelector('.back-to-top').style.display = 'none';
    </script>
</body>
</html>