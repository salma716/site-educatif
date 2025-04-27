<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category</title>
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
        }

        form {
            margin-top: 30px;
            margin-bottom: 50px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ff6f91;
            border-radius: 10px;
            font-size: 16px;
        }

        button {
            background: #845ec2;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background: #a178df;
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
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Category</h1>

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $category->name }}" required>

        <textarea name="description" rows="4">{{ $category->description }}</textarea>

        <button type="submit">Update Category</button>
    </form>

    <h1>Add New Object</h1>

    <form method="POST" action="{{ route('categories.objects.store', ['category' => $category->id]) }}" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" placeholder="Object Name" required>

        <input type="file" name="image" accept="image/*" required>

        <input type="file" name="sound" accept="audio/*">

        <button type="submit">Add Object</button>
    </form>

   
    <h1>Objects in this Category</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
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
