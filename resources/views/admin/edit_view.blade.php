<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
                <h2>add product </h2>
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <form action="{{ url('update_product/'.$product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="category_id">category</label><br>
                                    <select name="category_id" id="">
                                        <option value="{{ $product->category_id }}">{{ $product->category->name }}
                                        </option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">title</label><br>
                                    <input type="text" name="title" value="{{ $product->title }}" class="form-control"
                                        placeholder="title" required>
                                    @error('title')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">description</label><br>
                                    <input type="text" name="description" value="{{ $product->description }}"
                                        class="form-control" placeholder="description" required>
                                    @error('description')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="quantity">quantity</label><br>
                                    <input type="number" name="quantity" value="{{ $product->quantity }}"
                                        class="form-control" placeholder="quantity" required>
                                    @error('quantity')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">price</label><br>
                                    <input type="text" name="price" value="{{ $product->price }}" class="form-control"
                                        placeholder="price" required>
                                    @error('price')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">discount_price</label><br>
                                    <input type="text" name="discount_price" value="{{ $product->discount_price }}"
                                        class="form-control" placeholder="discount_price" required>
                                    @error('discount_price')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">changer image:</label><br>
                                    <span href="#">
                                        <img src="{{ asset('storage/'.$product->image_path) }}" alt=""
                                            class="w-50 h-50 img-fluid p-1">
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="file">file</label><br>
                                    <input type="file" name="image">
                                    @error('image')
                                    <span>{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary form-control">update</button>
                                </div>
                            </form>
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