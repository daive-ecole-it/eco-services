<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>
        <center>
            <h3> Custumer name: {{ $data->name }}</h3>
            <h3> Custumer address: {{ $data->rec_address }}</h3>
            <h3> Custumer phone: {{ $data->phone }}</h3>
            <h2> Product title: {{ $data->product->title }}</h2>
            <h2> Product price: {{ $data->product->price }}</h2>
            <img height="250 px" width="200 px" src="products/{{ $data->product->image }}" alt="" />
        </center>
</html>
