<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
@include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
   @include('admin.header')
      <!-- partial:partials/_sidebar.html -->

     @include('admin.sidebar')
     
     @include('admin.partials')

   @include('admin.body')
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>