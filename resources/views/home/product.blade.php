<section class="product_section layout_padding">
  <div class="container">



    <div class="heading_container heading_center">
      <h2>
        Our <span>products</span>
      </h2>

      <form class="form-inline">
        <div style="position: relative; width:1000px; margin:auto; ">
          <input type="text" name="query" placeholder="search your product"
            style="width: 100%; padding-right:50px; padding-left:20px; border-radius:50px; border:1px solid #ccc; height:40px;">
          <button class="btn btn_search-btn" type="submit"
            style="font-size: 20px; border:none; transform:translateY(-70%); cursor:pointer; background:none; right:10px; top:50%; position:absolute">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>

        </div>
      </form>
    </div>
  </div>

  <div class="row">
    @foreach ($products as $product)

    <div class="col-sm-6 col-md-4 col-lg-4">
      <div class="box">
        <div class="option_container">

          <div class="options">
            <a href="{{ url('details/'.$product->id) }}" class="option1">
              details
            </a>

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
        <div class="img-box">
          <a href="#">
            <img src="{{ asset('storage/'.$product->image_path) }}" alt="">
          </a>

        </div>
        <div class="detail-box">


          @if ($product->discount_price != null)
          <h6 class="text-primary">
            ${{ number_format($product->discount_price,2)}}


          </h6>
          <span class="badge bg-success">Promo</span>
          <h6 class="text-decoration-line-through text-danger" style="text-decoration: line-through">
            ${{$product->price}}
          </h6>
          @else
          <h6>
            ${{$product->price}}
          </h6>
          @endif
        </div>
      </div>
    </div>
    @endforeach


  </div>
  <div class="d-flex justify-content-center align-items-center p-2">
    {{ $products->links() }}</div>
  </div>
</section>