<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Pikolino</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Comic Sans MS', cursive; }
        body { background: linear-gradient(135deg, #f6d365, #fda085); min-height: 100vh; padding: 20px; overflow-x: hidden; }

        h1 {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 40px;
            color: #6c5ce7;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .objects {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
        }

        .object-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 220px;
            padding: 20px;
            text-align: center;
            transition: 0.3s;
        }

        .object-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.2);
        }

        .object-name {
            font-size: 1.3rem;
            font-weight: bold;
            color: #ff6b6b;
            margin-bottom: 15px;
        }

        .object-image {
            width: 100%;
            height: 140px;
            object-fit: contain;
            margin-bottom: 15px;
            border-radius: 12px;
        }

        .object-sound {
            margin-top: 10px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 40px;
            background: #6c5ce7;
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 1rem;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #845ec2;
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
                            Votre navigateur ne prend pas en charge l'audio.
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
