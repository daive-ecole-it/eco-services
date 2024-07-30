<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type=''>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;

        }
        h1{
            color:white;
        }
        label{
            display: inline-block;
            width: 250px;
            font-size: 20px!important;
            color: white!important;
        }
        input[type='text']{
            width:300px;
            height:50px;
        }
        textarea[type='text']{
            width:500px;
            height:80px;
        }
        .input_deg{
            padding:15px;
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
           <h1>Edit : {{ $data->title }}</h1>
           @if ($data->image)
               <img src="{{ asset('products/'.$data->image)}}" alt="Product Image" style="width: 200px; height: 200px;display: flex;
            justify-content: center!important;">
           @else
                <h4>not Image</h4>
           @endif
            <div class="div_deg">
                <form action="{{url('update_product',$data->id)}}" method="Post" enctype="multipart/form-data">

                    @csrf

                    <div class="input_deg">
                        <label for="name">title</label>
                        <input type="text" name="title" value="{{ $data->title }}">
                    </div>
                    <div class="input_deg">
                        <label for="name">Description</label>
                        <textarea type="text" name="description">{{ $data->description }}</textarea>
                    </div>
                    <div class="input_deg">
                        <label for="name">Price</label>
                        <input type="text" name="price" value="{{ $data->price }}">
                    </div>
                    <div class="input_deg">
                        <label for="name">Quantity</label>
                        <input type="number" name="qty" value="{{ $data->quantity }}">
                    </div>
                    <div class="input_deg">
                        <label for="name">Product Category</label>
                        <select name="category" required>
                            <option value="{{ $data->category }}">{{ $data->category }}</option>
                            @foreach ($category as $category)
                            <option value="{{ $category->category_name}}">{{ $category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input_deg">
                        <label for="name">Product Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="input_deg">

                        <input class="btn btn-success" type="submit" value="Eddit Product">
                    </div>
                </form>
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
