<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landscape</title>
    <link rel ="icon" href="images/image_icon_WP.PNG">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <!-- <script src="jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Cedarville Cursive' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
      <!--------------------HEADER-------------------->
      <section id="header" style="background-image: url('images/2c.jpg');height:60vh; background-position: center;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
            <img src="images/image_icon_WP.PNG" href="index.html" style="cursor: pointer; width: 2.3em;">
            <a id="main-title-font" class="navbar-brand" href="index.html">Picture Perfect</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav mr-auto" >
                    <div style="padding-right: 550px;"></div>
                    <li class="nav-item">
                    <a class="nav-link" href="landscape.html">Landscapes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="portraits.html">Portraits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="films.html">Films</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    
                    <li class="nav-item cart">
                        <a class="nav-link" href="cart.html">
                            <ion-icon name="basket"></ion-icon>Cart<span></span>
                        </a>
                    </li>
                </ul>
            
            </div>
        </nav>
        <h2 class="about">Print your pictures</h2>
    </section>

    <section id="main-body" style="height: 50px"></section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8">
            <img src="value" id='image'/> 
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <p class="font-weight-bold" id="heading">Heading</p>
                <p class="font-weight-bold" id="desc">Description</p>
                 <div id="slider-range-max"></div><br>
                 <select name="print_size" id="print_size">
                    <option selected value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                  </select>
                  <br><br>
                <button type="button" class="add-cart btn btn-success" onclick="addToCart()">Place an Order</button>
            </div>
        </div>
    </div>
</section>
<div style="height: 50px"></div>
    <!--------------------FOOTER-------------------->
    <section id="footer">
        <div class="container text-center">
            <h4>Connect on social media</h4>
            <div class="social-icons">
                <a href="#"><img src="socialimages/facebook-icon.png"></a>
                <a href="#"><img src="socialimages/instagram-icon.png"></a>
                <a href="#"><img src="socialimages/linkedin-icon.png"></a>
                <a href="#"><img src="socialimages/snapchat-icon.png"></a>
                <a href="#"><img src="socialimages/twitter-icon.png"></a>
                <a href="#"><img src="socialimages/whatsapp-icon.png"></a>
            </div>
        </div>
    
    </section>
    <script>
        function addToCart() {
            window.location.href = 'payment.html';
        }
        // onLoadCartNNumbers();
        var imagesource = new URL(localStorage.getItem("Imageurl"))
        console.log(imagesource);
        var value = imagesource.pathname.slice(0,imagesource.pathname.length)
        console.log(value);
        var imgname = localStorage.getItem("Imagename")
        document.getElementById("image").setAttribute("src",value)
        document.getElementById("heading").innerHTML = localStorage.getItem("Imagename") 
        document.getElementById("desc").innerHTML = localStorage.getItem("Imagedescription")

        $( function() {
        $( "#slider-range-max" ).slider({
            range: "max",
            min: 1,
            max: 100,
            value: 1,
            slide: function( event, ui ) {
            $( "#prints" ).val( ui.value );
            }
        });
        $( "#prints" ).val( $( "#slider-range-max" ).slider( "value" ) );
    } );
    </script>
</body>
</html>