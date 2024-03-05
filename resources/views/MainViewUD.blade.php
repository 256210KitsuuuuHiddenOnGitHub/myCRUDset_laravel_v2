<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit or Delete Data</title>
</head>
<body>
    <h1>Select Data to Delete or Edit</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @else
    <div>{{ session('error') }}</div>
    @endif
    <form method="POST" action="/deleteStudent">
        @csrf
        <select name="student_id">
            @foreach ($returnData as $student)
                <option value="{{ $student->student_id }}"> {{ $student->student_id }} - {{ $student->name }}</option>
            @endforeach
        </select>
        <button type="submit">Delete</button>
    </form>

    <form method="POST" action="/editStudent">
        @csrf
        <select name="student_id">
            @foreach ($returnData as $student)
                <option value="{{ $student->student_id }}">{{ $student->student_id }} - {{ $student->name }}</option>
            @endforeach
        </select>
        <!-- Textbox for editing -->
        <input type="text" name="new_name" placeholder="Enter New Name">
        <button type="submit">Edit</button>
    </form>
    
</body>
</html>
