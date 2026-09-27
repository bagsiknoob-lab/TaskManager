<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Tasks</title>
</head>
<body style="font-family:sans-serif; max-width:700px; margin:2rem auto; padding:0 1rem;">
    <h1>📋 My Tasks</h1>
    <a href="/tasks/create" style="background:blue; color:white; padding:0.5rem 1rem; border-radius:5px; text-decoration:none;">+ Add Task</a>
    <hr>

    @foreach($tasks as $task)
    <div style="border:1px solid #ddd; padding:1rem; margin:0.5rem 0; border-radius:5px;">
        <strong>{{ $task->title }}</strong> — {{ $task->status }}
        <p>{{ $task->description }}</p>

        <form method="post" action="{{ route('tasks.toggle', $task) }}" style="display:inline;">
            @csrf
            @method('PATCH')
            <button>✅ Toggle Status</button>
        </form>

        <a href="{{ route('tasks.edit', $task) }}" style="margin:0 0.5rem;">Edit</a>

        <form method="post" action="{{ route('tasks.destroy', $task) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Delete this task?')">Delete</button>
        </form>
    </div>
    @endforeach
</body>
</html>