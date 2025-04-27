<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories Manager</title>
    <style>
        body {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            font-family: 'Comic Sans MS', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #ff6f91;
            padding: 20px;
            color: white;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .container {
            margin: 40px auto;
            width: 90%;
            max-width: 1100px;
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .top-bar h2 {
            margin: 0;
            color: #ff6f91;
        }
        .add-btn {
            background: #845ec2;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 16px;
            transition: background 0.3s;
        }
        .add-btn:hover {
            background: #a178df;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 2px solid #ff6f91;
        }
        th, td {
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }
        th {
            background: #ff6f91;
            color: white;
        }
        tr:nth-child(even) {
            background: #ffe0e9;
        }
        .action-btn {
            background: #ff9671;
            color: white;
            padding: 8px 15px;
            margin: 0 5px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
        }
        .action-btn:hover {
            background: #ffb385;
        }
        .delete-btn {
            background: #ff6b6b;
        }
        .delete-btn:hover {
            background: #ff8787;
        }
    </style>
</head>
<body>

<div class="navbar">
    Admin - Categories Manager
</div>

<div class="container">
    <div class="top-bar">
        <h2>Manage Categories</h2>
        <a href="{{ route('categories.create') }}" class="add-btn">+ Add Category</a>
    </div>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="action-btn">Show</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="action-btn">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
