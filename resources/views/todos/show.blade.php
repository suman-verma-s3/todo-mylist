<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Todo Details | Todo-MyList</title>
</head>
<body>

    <h1>Todo-MyList</h1>

    <h2>{{ $todo->title }}</h2>

    <p>
        {{ $todo->description ?? 'No description available.' }}
    </p>

    <p>
        Status:
        <strong>{{ ucfirst($todo->status) }}</strong>
    </p>

    <a href="{{ route('todos.edit', $todo) }}">
        Edit
    </a>

    |

    <a href="{{ route('todos.index') }}">
        Back to My Todos
    </a>

</body>
</html>