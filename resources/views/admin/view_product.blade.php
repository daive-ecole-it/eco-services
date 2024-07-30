<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">
    .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top:30px
        }
    .table_deg{
            text-align: center;
            margin:auto;
            border:2px solid yellowgreen;
            margin-top: 50px;
            width: 100%;
        }
        th{
            background-color: skyblue;
            color: white;
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid yellowgreen;

        }
        td{
            color:white;
            padding:5px;
            border: 1px solid skyblue
        }
        input[type="search"]
        {
            width: 400px;
            padding: 5px;
            border-radius: 5px;
            margin-right: 10px;
            border: 1px solid gray;
        }
    </style>
   </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            
            <form action="{{ url('search_product') }}" method="get">
                <input type="search" name="search">
                <input type="submit" class="btn btn-secondary" value="Search">
            </form>

            <h1 style="color:white">All Products</h1>
            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($product as $data )
                    <tr>
                        <td>
                            <img src="{{ asset('products/'.$data->image)}}" alt="Product Image" style="width: 80px; height: 80px;">
                        </td>
                        <td>
                            {{ $data->title }}
                        </td>
                        <td>
                            {!!Str::limit($data->description,20) !!}
                        </td>
                        <td>
                            {{ $data->price }}
                        </td>
                        <td>
                            {{ $data->quantity }}
                        </td>
                        <td>
                            {{ $data->category}}
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ url('edit_product',$data->id) }}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product',$data->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
          <div class="div_deg">
            {{ $product->onEachSide(1)->links() }}
          </div>
               
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
        function confirmation(e) {
            e.preventDefault();

            var urlToRedirect = e.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" 
    integrity="sha256-9/aliU8dGd2tb">
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" 
    integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>
  </body>
</html>
