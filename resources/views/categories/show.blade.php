<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Pikolino</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Comic Sans MS', cursive; }
        body { background: linear-gradient(135deg, #f6d365, #fda085); min-height: 100vh; padding: 30px 15px; overflow-x: hidden; }

        h1 {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 50px;
            color: #6c5ce7;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.2);
        }

        .objects {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
        }

        .object-card {
            background: white;
            border-radius: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            width: 280px;
            padding: 25px 20px;
            text-align: center;
            transition: 0.4s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .object-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .object-name {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ff6b6b;
            margin-bottom: 20px;
        }

        .object-image {
            width: 100%;
            height: 200px;
            object-fit: contain;
            margin-bottom: 20px;
            border-radius: 15px;
            background: #f7f7f7;
            padding: 10px;
        }

        .object-sound {
                margin-top: 20px;
                width: 100%;
                display: flex;
                justify-content: center;
        }

        audio {
                width: 80%;
                min-width: 180px;
                max-width: 250px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 50px;
            background: #6c5ce7;
            color: white;
            padding: 14px 28px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            transition: all 0.3s;
        }

        .back-btn:hover {
            background: #845ec2;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>

    <h1>{{ $category->name }}</h1>

    <div class="objects">
        @foreach($category->objects as $object)
            <div class="object-card">
                <div class="object-name">{{ $object->name }}</div>

                <img src="{{ asset($object->image_path) }}" alt="{{ $object->name }}" class="object-image">

                @if($object->sound_path)
                    <div class="object-sound">
                        <audio controls>
                            <source src="{{ asset($object->sound_path) }}" type="audio/mpeg">
                            Votre navigateur ne supporte pas l'audio.
                        </audio>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div style="text-align:center;">
        <a href="{{ route('home') }}" class="back-btn">← Retour à l'accueil</a>
    </div>

</body>
</html>
