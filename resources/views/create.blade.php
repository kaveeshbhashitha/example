<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>
    <div class="row p-3">
        <form method="post" action="{{route('student.save')}}" class="col-4" >
            <div class="">
                <a href="{{route('index')}}" class="btn btn-primary">Go back</a>
            </div>
            <h2>Add new student</h2>
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
            <div class="form-group">
                <label for="exampleInputEmail1">sname</label>
                <input type="text" class="form-control" placeholder="Enter name" name="studentname">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">semail</label>
                <input type="text" class="form-control" placeholder="email" name="studentemail">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">dob</label>
                <input type="date" class="form-control" placeholder="dob" name="studentdob">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>