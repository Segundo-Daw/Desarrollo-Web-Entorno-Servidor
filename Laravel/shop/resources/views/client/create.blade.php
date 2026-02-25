<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop | Create client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body{
            background: #124142;
        }
    </style>
</head>

<body>
    @include('components.header')

    <h2>Formulario de creación de cliente</h2>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('client.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input name="name" type="text" id="name" placeholder="Enter name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name') <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname *</label>
                        <input name="surname" type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" placeholder="Enter surname"
                            value="{{ old('surname') }}">
                            @error('surname') <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input name="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            id="address" placeholder="Enter address" value="{{ old('address') }}">
                        @error('address') <small class="text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>


</body>

</html>