<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Add image index</title>
</head>
<body>
    <div class="p-5">
    <a class="btn btn-success my-1" href="{{ url('/employee/create') }}">Add new employee</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Mobile</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->address }}</td>
                <td>{{ $task->mobile }}</td>
                <td class="d-flex mx-1">
                    <img src="{{ asset($task->photo) }}" class="img img-responsive" style="width:30px; height:30px; border-redius:50%;"/>
                    <a target="blank" href="{{ $task->photo }}"><div class="mx-1 text-primary">See Image</div></a>
                </td>
                <td class="">
                <a href="{{ route('employee.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('employee.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>

        @if($employees->isNotEmpty())
        @php
            $lastEmployee = $employees->last();
        @endphp
        <div>
            <img src="{{ asset($lastEmployee->photo) }}" alt="Last Employee Image" style="widht:300px; height:300px;">
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $lastEmployee->id }}</td>
                    <td>{{ $lastEmployee->name }}</td>
                    <td>{{ $lastEmployee->address }}</td>
                    <td>{{ $lastEmployee->mobile }}</td>
                </tr>
            </tbody>
        </table>
        @else
            <p>No employees found.</p>
        @endif
    </div>

    <div>
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->mobile }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>
                        @if($employee->status == 'unpublished')
                            <form method="POST" action="{{ route('employee.publish', $employee->id) }}">
                                @csrf
                                <button type="submit">Publish</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('employee.unpublish', $employee->id) }}">
                                @csrf
                                <button type="submit">Unpublish</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
     </table>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>