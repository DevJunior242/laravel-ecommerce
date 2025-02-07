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
              <h2>cinetPay </h2>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6">
                        <form action="{{ url('pay/success') }}" method="POST">
                            @csrf
                           @method('post')
                         
                            <div class="form-group">
                                <label for="site_id">site_id</label><br>
                                <input type="text" name="site_id" value="{{ $pay ? $pay->site_id :''  }}" class="form-control" placeholder="site_id" required>
                                @error('site_id')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                          
                            <div class="form-group">
                                <label for="api_key">api_key</label><br>
                                <input type="text" name="api_key" value="{{ $pay ? $pay->api_key :''  }}" class="form-control" placeholder="api_key" required>
                                @error('api_key')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="secret_key">secret_key</label><br>
                                <input type="text" name="secret_key" value="{{ $pay ? $pay->secret_key :''  }}" class="form-control" placeholder="secret_key" required>
                                @error('secret_key')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            
                          
                            <div class="form-group">
                              <button class="btn btn-primary form-control">
                                {{ $pay ? 'upadate' : 'enrengitrer' }}
                              </button>
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