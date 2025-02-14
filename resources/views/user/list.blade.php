<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dependent Dropdwon Ajax Crud </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="bg p-3  shadow-lg text-center" >
        <h3 class="text-center">Dependent Dropdwon Ajax Crud</h3>
    </div>
    <div class="container mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <a href="{{ route('create') }}" class="btn btn-primary mb-3">Create</a>
                <div class="card card-primary p-4 border-0 shadow-lg">
                    {{-- @if (session::has('success'))
                        <div class="alert alert-success">
                            {{ session::get('success') }}
                        </div>                        
                    @endif
                    @if (session::has('danger'))
                        <div class="alert alert-danger">
                            {{ session::get('danger') }}
                        </div>                        
                    @endif --}}

                    <div class="card-body">
                        <h2>Users</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if (!empty('$users'))
                                  @foreach ($users as $user)
                                  <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('edit.user', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                  </tr>
                                  @endforeach
                              @endif
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>