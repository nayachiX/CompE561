<html>
    <head>
        <title>Picture Perfect</title>
        
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/contact.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Cedarville Cursive' rel='stylesheet'>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
        <script src="jquery-3.6.0.min.js"></script>
        

    </head>
    <body>
        <!--------------------HEADER-------------------->
        <section id="contactheader" style="background-image: url('images/7.jpg');height:65vh;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="images/image_icon_WP.PNG" href="index.html" style="cursor: pointer; width: 2.3em;">
                <a class="navbar-brand" href="index.html">Picture Perfect</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="landscape.html">Landscape</a>
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
                            <a class="nav-link bold-font" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <h2 class="about">Contact</h2>
        </section>

        <section id="main-body" style="height: 600px">
            <div class="row-contact">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="contact.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                </div>
                            </div><div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="boxed-btn">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span><b>Address</b></span>
                        <div class="media-body">
                            <h3>Buttonwood, California.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span><b>Phone</b></i></span>
                        <div class="media-body">
                            <h3>+1 253 565 2365</h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span><b>Email</b></i></span>
                        <div class="media-body">
                            <h3>support@colorlib.com</h3>
                            <p>Send us your query anytime!</p>
                        </div>
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
        <?php
        $email = '';
        $name='';
        $subject='';
        $message = '';
        $dbHost     = "localhost";  
        $dbUsername = "root";  
        $dbPassword = "";  
        $dbName     = "web_project";   
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = ($_POST["name"]);
          $message = ($_POST["message"]);
          $subject = ($_POST["subject"]);
          $email = ($_POST["email"]);
          $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
          
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " 
                . $conn->connect_error);
        }
        // $sql = "INSERT INTO web_project.contact (name, email, subject, message) VALUES ('$name',$email', '$subject', '$message')";
        $sql = "INSERT INTO web_project.contact (name, email, subject, message) VALUES ('$name', '$email', '$subject','$message')";
        if ($conn->query($sql) === TRUE && $email != null) {
            //  echo "records entered succesfully";
            echo '<div class="alert alert-success" role="alert">';
            echo 'Thank you for contacting us!!!';
            echo '</div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
          }
        ?>
    </body>
</html>