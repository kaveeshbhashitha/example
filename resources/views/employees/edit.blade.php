<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit employee</title>
</head>
<body>
    <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        <div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>
        @csrf
        @method('PUT')
        <!-- Input fields for editing employee details -->
        <input type="text" name="name" value="{{ $employee->name }}" required>
        <input type="text" name="address" value="{{ $employee->address }}" required>
        <input type="text" name="mobile" value="{{ $employee->mobile }}" required>
        <input type="file" name="photo" value="{{ $employee->photo }}" required>

        <div>
            <img src="{{ asset($employee->photo) }}" alt="" style="with:200px; height:200px;">
        </div>
        <!-- Add input fields for other attributes as needed -->

        <button type="submit">Update Employee</button>
    </form>
</body>
</html>