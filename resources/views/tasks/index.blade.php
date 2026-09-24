<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>
</head>
<body>
    <h1>Personal Task Manager</h1>

    <a href="{{ route('tasks.create') }}">Add New Task</a>

    <br><br>

    @if ($tasks->count())
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->due_date }}</td>

                        <td>
                            <a href="{{ route('tasks.edit', $task) }}">
                                Edit
                            </a>

                            <form action="{{ route('tasks.status', $task) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('PATCH')

                                <button type="submit">
                                    Change Status
                                </button>
                            </form>

                            <form action="{{ route('tasks.destroy', $task) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tasks yet.</p>
    @endif

</body>
</html>