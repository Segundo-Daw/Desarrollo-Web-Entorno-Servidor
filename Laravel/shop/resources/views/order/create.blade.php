<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop | Create client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
    body{
            background: #124142;
        }
</style>

<body>
    @include('components.header')

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="product_id">
                            <option selected>Product</option>
                            @foreach ($products as $p)
                                <option value="{{ $p->id }}">{{ $p->name }} - Precio: {{ $p->price }}</option>
                            @endforeach

                        </select>
                        @error('product_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="client_id">
                            <option selected>Client</option>
                            @foreach ($clients as $c)
                                <option value="{{ $c->id }}">{{ $c->name }} {{ $c->surname }}</option>
                            @endforeach

                        </select>
                        @error('client_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create order</button>
                </form>
            </div>

        </div>
    </div>


</body>

</html>