<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category Details</title>
    <style>
        body {
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            font-family: 'Comic Sans MS', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 50px auto;
            width: 90%;
            max-width: 800px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            text-align: center;
        }

        h1 {
            color: #ff6f91;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 16px;
        }

        table {
            width: 100%;
            margin-top: 40px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 2px solid #ff6f91;
        }

        th, td {
            padding: 10px;
            font-size: 14px;
        }

        th {
            background-color: #ff6f91;
            color: white;
        }

        tr:nth-child(even) {
            background: #ffe0e9;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Category: {{ $category->name }}</h1>
    <p>{{ $category->description }}</p>

    <h1>Objects in this Category</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Object Name</th>
                <th>Image</th>
                <th>Sound</th>
            </tr>
        </thead>
        <tbody>
            @forelse($category->objects as $object)
                <tr>
                    <td>{{ $object->id }}</td>
                    <td>{{ $object->name }}</td>
                    <td>
                        @if($object->image_path)
                            <img src="{{ asset($object->image_path) }}" width="80">
                        @endif
                    </td>
                    <td>
                        @if($object->sound_path)
                            <audio controls>
                                <source src="{{ asset($object->sound_path) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        @else
                            No sound
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No objects yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('categories.index') }}" class="back-link">← Back to Categories</a>
</div>

</body>
</html>
