<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Légumes</title>
    <style>
        body {
            background: linear-gradient(to right, #ffecd2,rgb(199, 171, 223));
            font-family: 'Comic Sans MS', cursive, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #6a11cb;
            font-size: 3rem;
            margin-bottom: 40px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        }

        .animal-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .animal-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 250px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .animal-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 12px 25px rgba(0,0,0,0.25);
        }

        .animal-card h3 {
            color:rgb(89, 2, 252);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .animal-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 15px;
        }

        audio {
            width: 100%;
            outline: none;
        }
    </style>
</head>
<body>
    <h1>Les Légumes 🥕🥔</h1>

    <div class="animal-container">
        @foreach ($vegetables as $vegetable)
            <div class="animal-card">
                <h3>{{ $vegetable->name }}</h3>
                <img src="{{ asset($vegetable->image_path) }}" alt="{{ $vegetable->name }}">
                <audio controls>
                    <source src="{{ asset($vegetable->sound_path) }}" type="audio/mpeg">
                    Ton navigateur ne supporte pas l'audio.
                </audio>
            </div>
        @endforeach
    </div>
</body>
</html>
