<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
         {{-- <link href="css/styles.css" rel="stylesheet" /> --}}
        <link rel="stylesheet" href="{{asset("web/Css/styles.css")}}">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        {{-- <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /> --}}


                        @foreach ($Announcements as  $Announcement)
                             <div class="row bg-white mx-4 ">

                            @if($Announcement->Status == 'veduo')
                            <div class="col-md-12 mt-3">
                                <video  controls>
                                    <source src="{{asset('/Announcement/viduo/'.$Announcement->file_name)}}" width="400px" height="400" >
                                    </video>
                                    </div>
                            @endif
                            @if($Announcement->Status == 'img')

                                    <div class="col-sm-6">
                                        <div class="bg-white" >
                                        <img  src="{{asset('/Announcement/img/'.$Announcement->file_name)}}" width="400px" height="400"  >
                                        </div>
                                    </div>
                                    

                                @endif
                                            @if($Announcement->Status == 'link')

                                            <div class="co;-md-12">>
                                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{$Announcement->file_name}}"  width="400px" height="400"  allowfullscreen></iframe>
                                </div>
                                </div>
                                @endif
                         

                            </div>
                        </div>
                            <div class="col-md-6">
                                @if(isset($Announcement->orderNumber))
                                <div class="small mb-1">Order number : <span>{{$Announcement->orderNumber}}</span>
                                </div>
                                 @endif
                                <h1 class="display-5 fw-bolder">Shop item template</h1>
                                @if(isset($Announcement->orderTotal))
                                <div class="fs-5 mb-5">
                                    
                                    {{-- <span class="text-decoration-line-through">$45.00</span> --}}
                                    Order total : <span> $ {{$Announcement->orderTotal}}</span>
                                    <p class="text-left">Commission fee : <span> {{ $Mony}}</span></p>
                                    <p id="myText12"> Expect return</p>
                                    <input type="text" id="myInput12"  value="{{auth()->user()->scores->score + $Mony}}$" readonly>
                                    
                                </div>
                                @endif
                                <p class="lead">{{$Announcement->description}}</p>
                                <div class="d-flex">
                                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                        <i class="bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        @endforeach
                
            </div>
        </section>
        <!-- Related items section-->
      
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
