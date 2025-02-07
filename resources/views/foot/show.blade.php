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
   <style>
    .hidden {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .visible {
        opacity: 1;
    }
</style>
   <body>

<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-md-6">
            <div class="card">
                
                <div class="card-body">
                   
                    <div class="form-group">
                        <h2 class="text-success" ></h2>  
                         <div class="d-flex justify-content-between" >
                            <img style="height: 80px; width:150px" src="images/cla.png" alt="">
                            <img style="height: 80px; width:150px" src="images/c2.png" alt="">
                         </div>
                        @foreach ($scores as $score)
                        <div class="team mb-3 ">
                           
                            <strong >{{ $score['home'] }}</strong>  
                            <span><img style="width: 50px" height="50px" src="{{ asset('storage/'.$score->image_path) }}">  </span >  

                                <span class="teams hidden text-success p-1"  style="font-size: 30px">{{ $score['scorex'] }} </span> 
                                <span style="font-size: 20px">:</span><span class="teams p-1 hidden" style="font-size: 30px">{{ $score['score'] }}</span> 
                             <span>  <img style="width: 50px" height="50px" src="{{ asset('storage/'.$score->image_pathx) }}"  ></span>
                          
                            <strong>{{ $score['away'] }}</strong>
                            <hr>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer toutes les équipes
            const teams = document.querySelectorAll('.teams');
            // Afficher les scores après 2 secondes
            setTimeout(() => {
                teams.forEach((team, index) => {
                    setTimeout(() => {
                        team.classList.remove('hidden');
                        team.classList.add('visible');
                    }, index * 1000); // Affiche chaque score toutes les secondes
                });
            }, 4000); // Délai de 2 secondes avant de commencer l'affichage
        });
    </script>
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