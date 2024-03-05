<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create and Retrieve Data</title>
</head>
<body>
    <h1>Create and Retrieve Data DB</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($d as $returnData)
            <tr>
                <td>{{ $returnData->student_id }}</td>
                <td>{{ $returnData->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @else
    <div>{{ session('error') }}</div>
    @endif
    <h2>Add New Student</h2>
    <form method="POST" action="/createStudent">
        @csrf
        <label for="personID">ID:</label><br>
        <input type="number" id="personID" name="personID"><br>
        <label for="personName">Name:</label><br>
        <input type="text" id="personName" name="personName"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
