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
    <title>dev-ecommerce</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    @include('home.header')

    <div class="container p-4 mt-10 h-100">
        <div class="row justify-content-center">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"> </button>
            </div>
            @endif


            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"> </button>
            </div>
            @endif
            <div class="col-md-12">
                <div class="card">

                    <table class="p-2 border-4 ">
                        <tr>
                            <th class="uppercase bg-primary fw-bold">ProductTitle</th>
                            <th class="p-1 uppercase bg-primary fw-bold">Quantity</th>
                            <th class="p-1 uppercase bg-primary fw-bold">Price</th>
                            <th class="p-1 uppercase bg-primary fw-bold">image</th>
                            <th class="p-1 uppercase bg-primary fw-bold">Action</th>
                        </tr>
                        @php
                        $totalprice = 0;
                        @endphp
                        @foreach ( $carts as $cart)
                        <tr>
                            <td class="border-2 bg-danger">{{ $cart->product_title }}</td>
                            <td class="border-2 bg-success">{{ $cart->quantity }}</td>
                            <td class="border-2 bg-secondary">{{ $cart->price }}€</td>
                            <td class="border-2 bg-secondary">
                                <img class="w-20 h-20" src="{{ asset('storage/'.$cart->image) }}" alt="">
                            </td>
                            <td class="border-2 bg-success">
                                <a class="btn btn-danger" href="{{ url('delete_cart/'. Hashids::connection('main')->encode($cart->id) . '/main') }}">supprimer</a>
                                  
                            </td>
                        </tr>
                        @php
                        $totalprice = $totalprice + $cart->price;
                        @endphp
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="card-header bg-primary">
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" type="button">
                    <h4 class="p-2 text-center fs-2 text-capitalize">le prix total de votre commande :{{ $totalprice }}€
                    </h4>
                </button>

            </div>
        </div>
        <div class="mt-4 d-flex">
            <h1 class="p-2">process to order</h1>
            <a href="{{ url('cash_order') }}" class="btn btn-danger me-2">cash on delivery</a>
            <a href="{{ URL('stripe/'.$totalprice) }}" class="btn btn-success me-2">pay using card</a>
        </div>
    </div>
    @include('home.footer')


    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2024 All Rights Reserved By dev-ecommerce<br>



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