<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">
    .table_deg{
            text-align: center;
            margin:auto;
            border:2px solid yellowgreen;
            margin-top: 50px;
            width: 600px;
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
            padding:10px;
            border: 1px solid skyblue
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

            <h1 style="white">All Products</h1>
            <div>
                <table class="table_deg">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($data as $data )
                    <tr>
                        <td>
                            {{ $data->title }}
                        </td>
                        <td>
                            {{ $data->description }}
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
