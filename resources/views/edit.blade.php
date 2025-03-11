<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Product </h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('product.update',['product'=>$product])}}">
    @csrf
    @method('put')
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" required value="{{$product->name}}">
    </div>
    <div>
        <label for="qty">Quantity</label>
        <input type="number" id="qty" name="qty" placeholder="Quantity" required value="{{$product->qty}}">
    </div>
    <div>
        <label for="price">Price</label>
        <input type="text" id="price" name="price" placeholder="Price" required value="{{$product->price}}">
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Description"></textarea value="{{$product->description}}">
    </div>
    <div>
        <button type="submit">Update</button>
    </div>
</form>

</body>
</html>

