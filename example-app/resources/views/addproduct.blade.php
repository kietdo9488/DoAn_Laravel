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
                        <h3 class="card-header text-center">Add product</h3>
                        <div class="card-body">
                            <form action="{{route('product-add')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="product_name" class="form-control" name="product_name"
                                           required autofocus>
                                    @if ($errors->has('product_name'))
                                        <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Description" id="product_description" class="form-control"
                                           name="product_description" required autofocus>
                                    @if ($errors->has('product_description'))
                                        <span class="text-danger">{{ $errors->first('product_description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Price" id="product_price" class="form-control"
                                           name="product_price" required>
                                    @if ($errors->has('product_price'))
                                        <span class="text-danger">{{ $errors->first('product_price') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Category" id="idcategory" class="form-control"
                                           name="idcategory" required>
                                    @if ($errors->has('idcategory'))
                                        <span class="text-danger">{{ $errors->first('idcategory') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="file" placeholder="image" id="product_photo" class="form-control"
                                           name="product_photo" required>
                                    @if ($errors->has('product_photo'))
                                        <span class="text-danger">{{ $errors->first('product_photo') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Add product</button>
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

