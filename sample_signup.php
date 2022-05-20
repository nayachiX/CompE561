<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="sample.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign Up</title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <section id="header" style="height: 10vh;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="images/image_icon_WP.PNG" href="index.html" style="cursor: pointer; width: 2.3em;">
            <a class="navbar-brand" href="#">Picture Perfect</a>
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
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sample.php">SignIn/SignUp</a>
                </li>
            </ul>
            </div>
        </nav>
    </section>
    <div id="logreg-forms">
        <form action="sample_signup.php" method="POST" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign Up</h1>
            <input type="text" id="user-name" name="inputfullname" class="form-control" placeholder="Full name" required="" autofocus="">
            <input type="email" id="user-email" name="inputemail" class="form-control" placeholder="Email address" required autofocus="">
            <input type="password" id="user-pass" name="inputpassword" class="form-control" placeholder="Password" required autofocus="">
            <input type="password" id="user-repeatpass" name="password" class="form-control" placeholder="Repeat Password" required autofocus="">
        
            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
            <a href="sample.php" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
        </form>
    </div>
    <br>
    <?php
// define variables and set to empty values
$email = '';
$password='';
$fullname = '';
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "web_project";   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = ($_POST["inputemail"]);
  $password = ($_POST["inputpassword"]);
  $fullname = ($_POST["inputfullname"]);
  if(($_POST["inputpassword"]) == ($_POST["password"])) {

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
  
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " 
            . $conn->connect_error);
    }
      
    $sql = "INSERT INTO web_project.Sign_up(email, passcode, fullname) VALUES ('$email', '$password', '$fullname')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: http://localhost:3000/My_web_project/sample.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
      } else {
          echo "Both are not same";
      }

};

?>
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
