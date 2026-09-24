<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
</head>
<body>
    <h1>Add Task</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <label for="task_name">Task Name:</label><br>
        <input type="text" id="task_name" name="task_name" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select><br><br>

        <label for="due_date">Due Date:</label><br>
        <input type="date" id="due_date" name="due_date"><br><br>

        <button type="submit">Add Task</button>
    </form>

    <br>
    <a href="{{ route('tasks.index') }}">Back to Tasks</a>
</body>
</html>