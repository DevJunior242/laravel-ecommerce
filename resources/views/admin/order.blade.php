<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        @include('admin.header')
        <!-- partial:partials/_sidebar.html -->

        @include('admin.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">

                                <table class="border-4 p-2 ">
                                    <tr>
                                        <th class=" bg-primary uppercase fw-bold">Name</th>
                                        <th class="p-1 bg-primary uppercase fw-bold">Email</th>
                                        <th class="p-1 bg-primary uppercase fw-bold">Phone</th>
                                        <th class="p-1 bg-primary uppercase fw-bold">Address</th>
                                        <th class="p-1 bg-primary uppercase fw-bold">ProductTitle</th>
                                        <th class="bg-primary uppercase fw-bold">Quantity</th>
                                        <th class="p-1 bg-primary uppercase fw-bold">Price</th>
                                        <th class="p-1 bg-primary uppercase fw-bold">Payment status</th>
                                        <th class="p-1 bg-primary uppercase fw-bold">Delivery</th>
                                        <th class="p-1 bg-primary uppercase fw-bold">Status image</th>
                                        <th class="p-1 bg-primary uppercase fw-bold">Delivered</th>
                                        <th class="p-1 bg-primary uppercase fw-bold">PDF</th>
                                    </tr>

                                    {{-- @foreach ( $orders as $order)
                                    @php
                                    dd(public_path('storage/'.$order->image));

                                    @endphp --}}
                                    @foreach ($orders as $order)


                                    <tr>
                                        <td class="border-2 bg-danger">{{ $order->name }}</td>
                                        <td class="border-2 bg-success">{{ $order->email }}</td>
                                        <td class="border-2 bg-secondary">{{ $order->phone }}</td>
                                        <td class="border-2 ">{{ $order->address }}</td>

                                        <td class="border-2 ">{{ $order->product_title }}</td>
                                        <td class=" ">{{ $order->quantity }}</td>

                                        <td class="border-2">{{ $order->price}}€</td>

                                        <td class="border-2 ">{{ $order->payment_status }}</td>
                                        <td class="border-2 ">{{ $order->delivery_status }}</td>

                                        <td class="border-2 bg-secondary">
                                            <img class="h-20 w-20 " src="{{ asset('storage/'.$order->image) }}" alt=""
                                                style="height: 100px; width:100px">

                                        </td>

                                        <td class="border-2 ">
                                            @if ($order->delivery_status == 'processing')
                                            <a href="{{ url('delivered/'.$order->id) }}"
                                                class="btn btn-primary text-danger">not delivered</a>
                                            @else
                                            <p class="text-success">delivered</p>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ url('pdf/'.$order->id) }}" class="btn btn-success">download</a>
                                        </td>



                                    </tr>

                                    @endforeach
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>