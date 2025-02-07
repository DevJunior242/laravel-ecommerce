<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
     
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Dev E-Commerce</title>
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



    <div class="container">    
    <div class="row justify-content-center align-items-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h1 class="card-header bg-primary text-white">welcome to Prediction score website</h1>
    <form action="" enctype="multipart/form-data" method="POST">
        @csrf
          <div class="form-group">
              <label for="home">Équipe Domicile</label>
              <input type="text" name="home" class="form-control" required>
               <div>
                @error('home')
                <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
              <label for="away">Équipe Extérieure</label>
              <input type="text" name="away" class="form-control" required>
               <div>
                @error('away')
                <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
              <label for="score">Score</label>
              <input type="number" name="scorex" class="form-control" required>
  <div>
                @error('score')
                <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>

              <label for="score">Scorex</label>
              <input type="number" name="score" class="form-control" required>
              <div>
                @error('scorex')
                <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>

              <label for="image">Logo Équipe Domicile</label>
              <input type="file" name="image" class="form-control" required>
              <div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>

              <label for="imagex">Logo Équipe Extérieure</label>
              <input type="file" name="imagex" class="form-control" required>
              <div>
                @error('imagex')
                <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>

              <button class="btn btn-success mt-3">Valider</button>
          </div>
      </form>
      <div class="d-flex">
        <a href="{{ url('footShow') }}" class="btn btn-primary">show</a>
      </div>
            </div>
        </div>
    </div>
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