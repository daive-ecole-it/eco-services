<!DOCTYPE html>
<html>

<head>
 @include('home.css');
 <style>
    .div_center{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
        margin-top: 50px;
        margin-bottom: 50px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    tr:hover {background-color: #f5f5f5;}
    h1{
        color: white;
    }
    img{
        width: 100px;
        height: 100px;
    }
    .owl-carousel{
        margin-top: 50px;
    }
    .owl-dots{
        display: none;
    }
    .owl-nav{
        display: none;
    }
 </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
      </div>

      <div>
        <table class="div_center">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Delivery status</th>
                <th>Image</th>
            </tr>
            @foreach ($order as $order )
            
            @endforeach
            <tr>

            </tr>
        </table>
      </div>

  @include('home.footer')
  <!-- end info section -->


  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
