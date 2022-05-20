<html>
    <head>
        <title>Picture Perfect</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel ="icon" href="images/image_icon_WP.PNG">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
        <script src="jquery-3.6.0.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!-- Scripting -->
        <!-- <script>
            function landscape() {

            }
        </script> -->
        

    </head>
    <body>
        <?php 
            $dbHost     = "localhost";  
            $dbUsername = "root";  
            $dbPassword = "";  
            $dbName     = "web_project"; 
            $email = '';
            $username = '';

            $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " 
                    . $conn->connect_error);
            }
            $ret_sql = "SELECT * FROM web_project.sign";
            $result = $conn->query($ret_sql);
            while($rows = $result->fetch_assoc()){
                $email = $rows['email'];
            }
            $user_value = "SELECT fullname FROM web_project.sign_up WHERE email = '". $email."'";
            $user = $conn->query($user_value);
            $name = $user->fetch_assoc(); 
            $username = $name['fullname'];

            $conn->close();
        ?>
        <!--------------------HEADER-------------------->
        <section id="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="images/image_icon_WP.PNG" href="index.html" style="cursor: pointer; width: 2.3em;">
                <a id="main-title-font" class="navbar-brand" href="index.html">Picture Perfect</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <div class="col-6"></div>
                    <li class="nav-item">
                    <a class="nav-link" href="Landscape.html">Landscapes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Poitrait.html">Portraits</a>
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
                    <!-- <li class="nav-item cart">
                        <a class="nav-link" href="cart.html">
                            <ion-icon name="basket"></ion-icon>Cart<span>0</span>
                        </a>
                    </li> -->
                    <div class="col-12"></div>
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class='fas fa-user-tie' style='font-size:24px; margin-left:-2em'></i><?php echo $username ?></a>
                    </li>
                </ul>
                </div>
            </nav>
        </section>

        <!------------------Welcome text---------------->
        <section id="welcome">
            <div class="container">
                <div class="welcome text-center">
                     <h1>Welcome to photography website</h1>
                     <p>Landscapes | Portraits | Films</p>
                </div>
            </div>
        </section>

        <!------------------Homepage---------------->
        <section id="landscape">
            <div class="container">
                <div class="row ls-images ls-images:hover" style="padding: 10px;">
                    <div class="column" style="max-width: 50%">
                    <a href="landscape.html"><img src="images/2.jpg" alt="Snow" style="width: 100%"></a>
                    </div>
                    <div class="column" style="max-width: 50%">
                        <h1>Landscapes</h1>
                      <h3>This is a landscape folder</h3>
                      <p>Click on it to see landscape gallery</p>
                    </div>
                  </div>
                  <div class="row ls-images ls-images:hover" style="padding: 50px;">
                    <div class="column" style="max-width: 50%">
                        <h1>Potraits</h1>
                        <h3>This is a portraits folder</h3>
                        <p>Click on it to see portraits gallery</p>
                      </div>
                    <div class="column" style="max-width: 50%">
                     <a href="portraits.html"><img src="images/3.jpg" alt="Snow" style="width: 100%"></a>
                    </div>
                    
                  </div>
                  <div class="row ls-images ls-images:hover" style="padding: 20px;">
                    <div class="column" style="max-width: 50%">
                        <a href="films.html"><img src="images/4.jpg" alt="Snow" style="width: 100%"></a>
                    </div>
                    <div class="column" style="max-width: 50%">
                      <h1>Films</h1>
                      <h3>This is a films folder</h3>
                      <p>Click on it to watch short films</p>
                    </div>
                  </div>
            </div>
        </section>

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
    </body>
</html>