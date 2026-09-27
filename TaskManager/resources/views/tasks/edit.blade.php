<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
</head>
<body style="font-family:sans-serif; max-width:600px; margin:2rem auto; padding:0 1rem;">
    <h1>✏️ Edit Task</h1>
    <form method="post" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')
        <p>Title:<br>
            <input type="text" name="title" value="{{ $task->title }}" required style="width:100%; padding:0.5rem;">
        </p>
        <p>Description:<br>
            <textarea name="description" rows="4" style="width:100%; padding:0.5rem;">{{ $task->description }}</textarea>
        </p>
        <p>Status:
            <select name="status">
                <option value="pending" {{ $task->status==='pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $task->status==='completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </p>
        <button type="submit" style="padding:0.5rem 1.5rem; background:orange; color:white; border:none; border-radius:5px;">Update Task</button>
        <a href="/tasks" style="margin-left:1rem;">← Back</a>
    </form>
</body>
</html>