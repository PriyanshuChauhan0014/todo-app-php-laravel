<!DOCTYPE html>
<html>
<head> <style>
body {
    background-color: #f0f2f5;
}
.card {
    border-radius: 15px;
}
.card-header {
    font-weight: bold;
    font-size: 1.5rem;
}
.list-group-item {
    font-size: 1.1rem;
}
.btn {
    font-weight: bold;
}

.list-group-item:hover {
    background-color: #d1f7ff; 
    transform: scale(1.02);    
    cursor: pointer;       
}
</style>

    <title>To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h2>My To-Do List</h2>
                </div>
                <div class="card-body">
                    <!-- Add Task Form -->
                    <form action="/todos" method="POST" class="mb-4 d-flex">
                        @csrf
                        <input type="text" name="title" class="form-control me-2" placeholder="Add a new task" required>
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>

                    <!-- Task List -->
                    <ul class="list-group">
                        @foreach($todos as $todo)
                            <li class="list-group-item d-flex justify-content-between align-items-center 
                                {{ $todo->completed ? 'list-group-item-success' : '' }}">
                                <span style="text-decoration: {{ $todo->completed ? 'line-through' : 'none' }}">
                                    {{ $todo->title }}
                                </span>
                                <div>
                                    <a href="/todos/{{ $todo->id }}/toggle" class="btn btn-sm btn-warning me-1">Toggle</a>
                                    <form action="/todos/{{ $todo->id }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer text-center text-muted">
                    Total Tasks: {{ count($todos) }}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
