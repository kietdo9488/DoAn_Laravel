<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Edit product</h3>
                        <div class="card-body">
                            <form action="{{route('update-category')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="id" value="{{$category->id}}">
                                <div class="form-group mb-3">
                                    <label class="m-2">Name</label>
                                    <input type="text" placeholder="Name" id="category_name" class="form-control" name="category_name" value="{{$category->category_name}}"
                                           required autofocus>
                                    @if ($errors->has('category_name'))
                                        <span class="text-danger">{{ $errors->first('category_name') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group mb-3">
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Update category</button>
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

