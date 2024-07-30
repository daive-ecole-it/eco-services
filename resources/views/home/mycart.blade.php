<!DOCTYPE html>
<html>

<head>
 @include('home.css');
 <style>
    .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
 .cart_value {
    text-align: center;
    margin-bottom: 70px;
    padding: 18px;
 }
 .order_deg{
    padding-right: 150px;
    margin-top:-30px
 }
 label{
    display: inline-block;
    width: 100px;
 }
 .div_gap{
    padding: 15px;
 }

</style>
</head>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

  </div>
  <!-- end hero area -->

<div class="div_deg">
    <div class="order_deg">
        <form action="{{ url('confirm_order') }}" method="Post">
            @csrf
            <H1>Infos sur le receptionneur</H1>
            <div class="div_gap">
                <label>Noms</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="div_gap">
                <label>Adresse</label>
                <textarea name="address">{{ Auth::user()->address }}</textarea>
            </div>
            <div class="div_gap">
                <label>Telephone</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>
            <div class="div_gap">
                <input class="btn btn-primary" type="submit" value="Commander!">
            </div>
    </form>
</div>
    <table class="styled-table">
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Remove</th>
        </tr>

        <?php
            $value = 0;
        ?>

        @foreach ($cart as $cart )
         <tr>
            <td>{{ $cart->product->title }}</td>
            <td>{{ $cart->product->price }}€</td>
            <td>
                <img width="150px" src="/products/{{ $cart->product->image }}">
            </td>
            <td>
                <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('remove_from_cart',$cart->id) }}">Remove</a>
            </td>
            <?php
                $value = $value + $cart->product->price;
          ?>
          </tr>
        @endforeach
    </table>
</div>
<div class="cart_value">
        <h3>Total Price: {{ $value }}€</h3>

</div>

  <!-- info section -->

  @include('home.footer')
  <!-- end info section -->


  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
