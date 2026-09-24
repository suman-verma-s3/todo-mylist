<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Todo | Todo-MyList</title>
</head>
<body>

    <h1>Todo-MyList</h1>

    <h2>Create New Todo</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf

        <div>
            <label>Title</label>
            <br>
            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                placeholder="Enter todo title"
            >
        </div>

        <br>

        <div>
            <label>Description</label>
            <br>
            <textarea
                name="description"
                rows="5"
                placeholder="Enter description"
            >{{ old('description') }}</textarea>
        </div>

        <br>

        <button type="submit">Create Todo</button>

        <a href="{{ route('todos.index') }}">Back</a>
    </form>

</body>
</html>