<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
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
            max-width: 600px;
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
    </style>
</head>
<body>

<div class="container">
    <h1>Add New Category</h1>

    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Category Name" required>
    <textarea name="description" placeholder="Description"></textarea>

   
    <input type="file" name="image" accept="image/*">

    <button type="submit">Create Category</button>
</form>

    <a href="{{ route('categories.index') }}" class="back-link">← Back to Categories</a>
</div>

</body>
</html>
