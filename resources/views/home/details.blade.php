<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <base href="/public">
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="images/favicon.png" type="">
   <title>Famms - Fashion HTML Template</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="home/css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="home/css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body class="bg-primary">
   @include('home.header')


   <div class="container">
      <div class="row justify-content-center ">
         <div class="col-md-6">
            <div class="card">
               <div class="card-header">{{ $product->category->name }}</div>
               <div class="card-body">
                  <span>
                     <a href="#"><img src="{{ asset('storage/'.$product->image_path) }}" alt="" class="w-80 h-80 "></a>
                  </span>

                  <h2>{{ $product->description }}</h2>
                  <p>Availability:{{ $product->quantity }}</p>
                  <p>price:{{ $product->price }}</p>

                  <form action="{{ url('add_cart/'.$product->id) }}" method="POST">
                     @csrf
                     <div class="row">

                        <div class="col-md-4">
                           <input type="number" name="quantity" value="1" min="1" class="w-100 h-50  ml-10">
                        </div>
                        <div class="col-md-4">
                           <button class="btn btn-primary btn-sm ">add_cart</button>
                        </div>
                     </div>
                  </form>

               </div>
            </div>
         </div>
      </div>
   </div>



   @include('home.footer')

   </footer>
   <!-- footer end -->
   <div class="cpy_">
      <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

         Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

      </p>
   </div>
   <!-- jQery -->
   <script src="home/js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="home/js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="home/js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="home/js/custom.js"></script>
</body>

</html>