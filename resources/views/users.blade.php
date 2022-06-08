<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
                <h1 class="text-center">Tampil Data User</h1>
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addUser">Add Data</button>
                        <table class="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Created</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $value)

                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $value->username }}</td>
                                    <td>{{ $value->password }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td> <div class="row">
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#modifyusers-{{ $value->id }}">Edit</button>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="{{ route('users.destroy',$value->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div></td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>

            </div>
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user" class="col-form-label">Username </label>
                            <input type="text" class="form-control" placeholder="Masukan Username" name="username"
                                id="username">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Password </label>
                            <input type="text" class="form-control" placeholder="Masukan Username" name="password"
                                id="password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    @foreach ($users as $key => $value)
    <div class="modal fade" id="modifyusers-{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.update',$value->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="userame" class="col-form-label">Username </label>
                            <input type="text" class="form-control" placeholder="Masukan Username" name="username"
                                id="username" value="{{ $value->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Password </label>
                            <textarea class="form-control" id="message-text" placeholder="Masukan Password"
                                name="password">{{ $value->password }}</textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
    </div>
    @endforeach

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
