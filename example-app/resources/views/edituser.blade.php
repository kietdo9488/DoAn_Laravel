<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Edit user</h3>
                        <div class="card-body">
                            <form action="{{ route('update-user', ['id=' . $users->id]) }}" method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <input type="text" name="id" value="{{ $users->id }}" readonly>
                                <div class="form-group mb-3">
                                    <label class="m-2">Name</label>
                                    <input type="text" placeholder="Name" id="user_name"
                                        value="{{ $users->username }}" class="form-control" name="user_name" required
                                        autofocus>
                                    @if ($errors->has('user_name'))
                                        <span class="text-danger">{{ $errors->first('user_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="m-2">Email</label>
                                    <input type="text" placeholder="Email" id="user_email"
                                        value="{{ $users->email }}" class="form-control" name="user_email" required
                                        autofocus>
                                    @if ($errors->has('user_email'))
                                        <span class="text-danger">{{ $errors->first('user_email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="m-2">Password</label>
                                    <input type="text" placeholder="Password" id="user_password"
                                        value="{{ $users->password }}" class="form-control" name="user_password"
                                        required autofocus>
                                    @if ($errors->has('user_password'))
                                        <span class="text-danger">{{ $errors->first('user_password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="d-grid mx-auto">
                                        <button type="submit" class="btn btn-dark btn-block">Update User</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
