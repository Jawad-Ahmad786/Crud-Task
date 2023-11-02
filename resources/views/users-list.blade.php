<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Users List</title>
   <style>
    td{

      vertical-align: middle;
    }
   </style>
  </head>
<body>
  <div class="container mt-5">
    @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="row d-flex">
      <div class="col-md-6">
          <h3>Users List</h3>
      </div>
      <div class="col-md-6"> <!-- Use "text-md-right" class -->
          <a href="{{url('add-user')}}" class="btn btn-primary" style="margin-left:150px">Add User</a>
      </div>
  </div>
  

    <table id="users-table" class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td >{{ $user->email }}</td>
                <td>
                  <img src="{{asset('uploads/' .$user->image)}}" height="70px" width="70px">
                </td>
                <td>
                    <a class="btn btn-warning btn-sm" href="{{ url('edit-user/'. $user->id) }}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="{{ url('delete-user/'. $user->id) }}" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  </body>
  </html>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable();
            // Add DataTable links
        });
    </script>
