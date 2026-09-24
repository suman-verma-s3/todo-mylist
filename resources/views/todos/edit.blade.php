<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Todo | Todo-MyList</title>
</head>
<body>

    <h1>Todo-MyList</h1>

    <h2>Edit Todo</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('todos.update', $todo) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Title</label>
            <br>

            <input
                type="text"
                name="title"
                value="{{ old('title', $todo->title) }}"
            >
        </div>

        <br>

        <div>
            <label>Description</label>
            <br>

            <textarea
                name="description"
                rows="5"
            >{{ old('description', $todo->description) }}</textarea>
        </div>

        <br>

        <div>
            <label>Status</label>
            <br>

            <select name="status">
                <option value="pending"
                    {{ $todo->status === 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="completed"
                    {{ $todo->status === 'completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>
        </div>

        <br>

        <button type="submit">Update Todo</button>

        <a href="{{ route('todos.index') }}">Cancel</a>
    </form>

</body>
</html>