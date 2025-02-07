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
                <h2>category </h2>
                @if (session('success'))
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="alert alert-success alert-dismissible fade show " role="alert">
                    <span>{{ session('success') }}</span>
                </div>
                @endif
                <form action="{{ url('add_category') }}" method="POST">
                    @csrf
                    @method('post')
                    <label for="name">category_name</label>
                    <input type="text" name="name">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button class="btn btn-primary" type="submit">add category</button>

                </form>
            </div>

            <table>
                <tr>
                    <td>categoryName</td>
                    <td>Action</td>
                </tr>
                @foreach ($categories as $category)

                <tr>
                    <td>{{ $category->name }}</td>
                    <td><a onclick="return comfirm('Are you sure to delete?')" class="btn btn-danger"
                            href="{{ url('delete_category', $category->id) }}">delete</a></td>
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