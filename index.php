<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- CSS Sendiri -->
    <link rel="stylesheet" href="css/styleIndex.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="fontawesome/fontawesome-free/css/all.min.css">
     
    <!-- JQuery -->
    <script src="jquery/jquery-3.5.1.js"></script>
        <script>
            $(document).ready(function() {

                $(".kotak1").mouseout(function() {
                    $(".kotak1").css("z-index", -999);
                    $(".kotak1").css("background-color", "black");
                });
                $(".kotak1 h1").mouseout(function() {
                    $(".kotak1 h1").css("color", "white");
                });
                
            });
        </script>

    <title>Hazlan Cake and Dessert</title>
  </head>

  <body>

    <!-- Navbar -->
     
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top" id="mainNav">
        <div class="container text">
            <a class="navbar-brand font-weight-bold text-white" href="index.php" id="Logo">RARA BAKERY</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- NAVIGASI HOME -->
                    <li class="nav-item active">
                        <a class="nav-link js-scroll-trigger text-white" href="index.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                                <!-- spasi margin navigasinya atau list kosong-->
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                
                    <!-- NAVIGASI WHAT WE MAKE  -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="#what_we_make">WHAT WE MAKE</a>
                    </li>
                                <!-- spasi margin navigasinya atau list kosong-->
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                
                    <!-- NAVIGASI ABOUT  -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="#about">ABOUT</a>
                    </li>
                                <!-- spasi margin navigasinya atau list kosong-->
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"></a></li>  
                                
                    <!-- NAVIGASI CONTACT US  -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger text-white" href="#lambang">CONTACT US</a>
                    </li>
                </ul>
            </div>    
        </div>
    </nav>


    <!-- video -->
    <div class="full-screen">
        <video src="video/video.MP4" autoplay muted loop></video>
            <div class="modifikasi">
                <div class="modifikasi_content1">
                    <h4 class="display-4"> EST. 2021  |   PRAMBANAN, KLATEN<br></h4>
                </div>
                <div class="modifikasi_content2">
                    <h1 class="display-4">Little Meal Bento <br> RARA BAKERY</h1>
                </div>
                <br>
                <div class="tengah2">
                        <!-- text -->
                        <hr class="my-4">
                        <p>
                            SERVING YOU FRESH GOODIES WITH LOVE
                        </p>
                </div>
            </div>
                <!-- button kunjungi toko -->
            <div class="tengah">
                    <a href="loginPage.php"><button class="tombol tombol1">Kunjungi Toko</button></a>
            </div>
                <!-- falling arrow button -->
            <div class="tengah3">
                    <a href="#what_we_make">
                        <div class="scroll-down"></div>
                    </a>
            </div>             
    </div>

    <!--  WHAT WE MAKE - judul banner section 2  -->
    <div class="kotak1">
        <div id="what_we_make"></div>
        <br>
        <h1 class="display-4">WHAT WE MAKE</h1>
    </div>
    
    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/slider/item1.png" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                        <!-- text here | Roti Sisir Milkbread -->
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="display-4">Roti Sisir Milkbread</h2>
                            
                        </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/item2.png" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                        <!-- text here | Triple Chocolate Bread  -->
                        <h2 class="display-4">Triple Chocolate Bread</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/item3.png" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                        <!-- text here | Pisang Coklat -->
                        <h2 class="display-4">Pisang Coklat</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/item4.png" alt="Fourth slide">
                <div class="carousel-caption d-none d-md-block">
                        <!-- text here | 	Edam Parmesan Kaastengel -->
                        <h2 class="display-4">	Edam Parmesan Kaastengel</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/item5.png" alt="Fifth slide">
                <div class="carousel-caption d-none d-md-block">
                        <!-- text here | Nastar Premium -->
                        <h2 class="display-4">Nastar Premium</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/item6.png" alt="Sixth slide">
                <div class="carousel-caption d-none d-md-block">
                        <!-- text here | Konde Pandan -->
                        <h2 class="display-4">Konde Pandan</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/item7.png" alt="Seventh slide">
                <div class="carousel-caption d-none d-md-block">
                        <!-- text here | Cinnamon Roll -->
                        <h2 class="display-4">Cinnamon Roll</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/item8.png" alt="Eighth slide">
                <div class="carousel-caption d-none d-md-block">
                        <!-- text here | Selai nanas -->
                        <h2 class="display-4">Selai nanas</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/item9.png" alt="Ninth slide">
                <div class="carousel-caption d-none d-md-block">
                        <!-- text here | Chicken Bun -->
                        <h2 class="display-4">Chicken Bun</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/item10.png" alt="Tenth slide">
                <div class="carousel-caption d-none d-md-block">
                        <!-- text here | Chicken Mayo -->
                        <h2 class="display-4">Chicken Mayo</h2>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- footer bagian about, contact us, copyright dll -->
    <div class="kaki1" >
        <div class="lambang" id="lambang">
          <h4>Rara Bakery at Little Meal Bento</h4>
          <p>Beji, Taji, Prambanan, Klaten <br> Telp/WA : 0852-9219-7466 <br> Katalog: https://wa.me/c/6285292197466</p>
        </div>
        

        <div class="media-sosial">

            <a href="https://www.instagram.com/littlemealbento/"><span><i class="fa-4x fab fa-instagram"></i></span></a>
            <p>CONTACT US NOW | IG : @littlemealbento</p>
            
        </div>

        <div class="about" id="about">
            <h3>ABOUT US</h3>
            <hr>
            <p>Since we opened our doors in 2021, we've been dedicated to the princpile of a small top quality neighborhood cake and dessert. You'll see it in our handcrafted bakery and jajanan tradisional.</p>
        </div>

        
    </div>

    <div class="kaki2">
        <p>Copyright© Rara Bakery 2021</p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>