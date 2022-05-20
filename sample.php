<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/sample.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign In / Sign Up</title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function navigate() {
            window.location.href = 'sample_signup.php'
        }
    </script>
</head>
<body>
<section id="header" style="height: 50vh;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <img src="images/image_icon_WP.PNG" href="index.html" style="cursor: pointer; width: 2.3em;">
                <a class="navbar-brand" href="#">Picture Perfect</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                </div>
            </nav>
        </section>
    <div id="logreg-forms">
        <form class="form-signin" action="sample.php" method="POST">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="">
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <a href="" id="forgot_pswd">Forgot password?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn btn-primary btn-block" type="button" id="btn-signup" onclick="navigate()"><i class="fas fa-user-plus"></i> Sign up New Account</button>
            </form>
            <br>
    </div>

    <?php
// define variables and set to empty values
$email = '';
$password='';
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "web_project";   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = ($_POST["inputEmail"]);
  $password = ($_POST["inputPassword"]);
  $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " 
        . $conn->connect_error);
}
$ret_sql = "SELECT * FROM Sign_up";
$result = $conn->query($ret_sql);

if ($result->num_rows > 0) {
    $delete_rows = "DELETE from web_project.Sign";
    if ($conn->query($delete_rows) === TRUE) {
        $insert_row = "INSERT INTO web_project.sign (email, passcode) VALUES ('$email', '$password')";
        $conn->query($insert_row);
    } 
    while($row = $result->fetch_assoc()) {
    if($email == $row["email"] && $password == $row["passcode"] ) {
    header("Location: http://localhost:3000/My_web_project/master.php");
    exit;    
    }
    else {
        // echo "The user is not registerd into the website. Please signup.";
    }  
  }
} else {
    echo "Error: " . $ret_sql . "<br>" . $conn->error;
}

$conn->close();
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