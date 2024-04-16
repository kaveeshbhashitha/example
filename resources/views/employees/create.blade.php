<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Create new employee</title>
</head>
<body>
    <div class="row p-3 justify-content-center d-flex my-2">
        <form method="post" class="col-4" action="{{ url('employee') }}" enctype="multipart/form-data">
            <div class="">
                <a class="btn btn-primary text-white">Go back</a>
            </div>
            <h2>Add new employee</h2>
            <div>
                @if(session()->has('flash_message'))
                    <div class="alert alert-success">
                        {{ session()->get('flash_message') }}
                    </div>
                @endif

                @if(session()->has('error_message'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_message') }}
                    </div>
                @endif
            </div>
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" class="form-control" placeholder="Address" name="address">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mobile</label>
                <input type="text" class="form-control" placeholder="Mobile" name="mobile">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" class="form-control" placeholder="Image" name="photo" id="photo">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</body>
</html>