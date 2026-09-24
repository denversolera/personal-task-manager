<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>

    <h1>Edit Task</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="task_name">Task Name:</label><br>
        <input type="text"
               id="task_name"
               name="task_name"
               value="{{ $task->task_name }}"
               required>
        <br><br>

        <label for="description">Description:</label><br>
        <textarea id="description"
                  name="description">{{ $task->description }}</textarea>
        <br><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="Pending"
                {{ $task->status === 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ $task->status === 'Completed' ? 'selected' : '' }}>
                Completed
            </option>
        </select>
        <br><br>

        <label for="due_date">Due Date:</label><br>
        <input type="date"
               id="due_date"
               name="due_date"
               value="{{ $task->due_date }}">
        <br><br>

        <button type="submit">Update Task</button>
    </form>

    <br>

    <a href="{{ route('tasks.index') }}">Back to Tasks</a>

</body>
</html>