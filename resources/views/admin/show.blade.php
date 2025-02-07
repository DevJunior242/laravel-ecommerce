<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
@include('admin.css')
  </head>
  <body>
   @include('admin.header')
      <!-- partial:partials/_sidebar.html -->

     @include('admin.sidebar')
     <div class="main-panel">
        <div class="content-wrapper">

            <div style="text-align: center; padding-top:40px">
           <h2>products lists </h2>
            
         <table>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Descrription</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Image</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity}}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount_price }}</td>
                    <td>
                        <a href="#">
                          <img src="{{ asset('storage/'.$product->image_path) }}" alt="" class="w-50 h-50 img-fluid p-1">
                        </a>
                    </td>
                    <td>
                      <a class="btn btn-success me-2" onclick="return confirm('are you sure to update?')" href="{{ url('edit_view/'.$product->id) }}">edit</a>
                    </td>
                    <td>
                      <a class="btn btn-danger me-2 " onclick="return confirm('are you sure to delete?')" href="{{ url('delete_product/'.$product->id) }}">delete</a>
                    </td>

                </tr>
            @endforeach
         </table>
 
        </div>
     </div>

  
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>