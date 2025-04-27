<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
            font-family: 'Comic Sans MS', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 50px auto;
            width: 90%;
            max-width: 700px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            text-align: center;
        }

        h1 {
            color: #4d6fa7;
        }

        .link {
            display: inline-block;
            margin-top: 30px;
            padding: 15px 25px;
            background: #845ec2;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 10px;
        }

        .link:hover {
            background: #a178df;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome Admin!</h1>

    <a href="{{ route('categories.index') }}" class="link">Manage Categories</a>
</div>

</body>
</html>
