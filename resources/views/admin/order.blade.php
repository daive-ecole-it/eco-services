<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        table{
            border: 2px solid skyblue;
            text-align: center;
        }

        th
        {
            background-color: skyblue;
            color: white;
            border: 2px solid yellowgreen;
            padding: 10px;
            font-weight: bold;
            text-align: center;
            font-size: 18px;
        }
        .table_center{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        td{
            border: 2px solid yellowgreen;
            padding: 10px;
            color: white
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

            <h1>All Orders</h1>
            <br>
            <br>
            <div class="table_center">
                <table>
                    <tr>
                        <th>Custum name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>payement status</th>
                        <th>Status</th>
                        <th>Change Status </th>
                        <th>Print PDF </th>
                    </tr>
                    @foreach ($data as $data )
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->rec_address }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->product->title }}</td>
                        <td>{{ $data->product->price }} €</td>
                        <td>
                            <img width="150px" src="/products/{{ $data->product->image }}">
                        </td>
                        <td>{{ $data->payment_status }}</td>
                        <td>
                            @if($data->status == 'in progress')

                            <span style="color:red" >{{ $data->status }}</span>
                            @elseif ($data->status == 'On the way')
                            <span style="color:skyblue" >{{ $data->status }}</span>
                            @else
                            <span style="color:yellow" >{{ $data->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('on_the_way',$data->id) }}">On the way</a>

                            <a class="btn btn-success" href="{{ url('delivered',$data->id) }}">delivered</a>
                        </td>
                        <td>
                            <a  class="btn btn-secondary" href="{{ url('print_pdf',$data->id) }}"> Print PDF</a></td>
                    </tr>
                    @endforeach

                </table>
        </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
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
