<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
         <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="images/logo.png" alt="#" /></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                     aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><a href="about.html">About</a></li>
                     <li><a href="testimonial.html">Testimonial</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="">Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="blog_list.html">Blog</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
               </li>@auth

               @isset($carts)
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('show_cart') }}">
                     Cart

                     [ <span class="badge rounded-pill {{ $carts->count()  > 0 ? 'bg-success' : 'bg-danger'}}">
                        {{ $carts->count() }}
                     </span>]


                  </a>
               </li>
               @endisset
               @endauth


               @if(Route::has('login'))
               @auth

               <x-app-layout></x-app-layout>
               @else
               <li class="nav-item">
                  <a class="btn btn-primary me-1" href="{{ route('login') }}" id="logincss">Login</a>
               </li>

               <li class="nav-item" style="margin-left: 10px;">
                  <a class="btn btn-success me-1" href="{{ route('register') }}">Register</a>
               </li>

               @endauth

               @endif




            </ul>
         </div>
      </nav>
   </div>
</header>