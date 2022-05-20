<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel ="icon" href="images/image_icon_WP.PNG">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Cedarville Cursive' rel='stylesheet'>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="jquery-3.6.0.min.js"></script>
</head>
<body>
<section id="header" style="">
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
                        <a class="nav-link" href="#">Prints</a>
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
<?php 
// Include the database configuration file  
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "web_project";   

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 
$re_sql = "SELECT * FROM images";
$result = $conn->query($re_sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    $image = $row['image'];
    $images_names = $row['image_name'];
    $images_des = $row['image_desc'];
    $images[] = $image;
    $names[] = $images_names;
    $description[] = $images_des;
  }
} else {
   echo "Error: " . $ret_sql . "<br>" . $conn->error;
}
?>

<?php if($result->num_rows > 0){?> 
    <div class="container">
 <div class="row">
   <div class="col-sm-4 col-md-4 col-lg-4 ls-images ls-images:hover">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[0]); ?>" /> 
      <div class="">
         <p id="name"><?php echo ($names[0]); ?>"</p>
         <p id="description"><?php echo ($description[0]); ?>"</p>
      </div>
   </div>
   <div class="col-sm-4 col-md-4 col-lg-4 ls-images ls-images:hover">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[1]); ?>" /> 
      <div class="">
         <p id="name"><?php echo ($names[1]); ?>"</p>
         <p id="description"><?php echo ($description[1]); ?>"</p>
      </div>
   </div>
   <div class="col-sm-4 col-md-4 col-lg-4 ls-images ls-images:hover">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[2]); ?>" /> 
      <div class="">
         <p id="name"><?php echo ($names[2]); ?>"</p>
         <p id="description"><?php echo ($description[2]); ?>"</p>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-sm-4 col-md-4 col-lg-4 ls-images ls-images:hover">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[0]); ?>" /> 
      <div class="">
         <p id="name"><?php echo ($names[0]); ?>"</p>
         <p id="description"><?php echo ($description[0]); ?>"</p>
      </div>
   </div>
   <div class="col-sm-4 col-md-4 col-lg-4 ls-images ls-images:hover">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[1]); ?>" /> 
      <div class="">
         <p id="name"><?php echo ($names[1]); ?>"</p>
         <p id="description"><?php echo ($description[1]); ?>"</p>
      </div>
   </div>
   <div class="col-sm-4 col-md-4 col-lg-4 ls-images ls-images:hover">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[2]); ?>" /> 
      <div class="">
         <p id="name"><?php echo ($names[2]); ?>"</p>
         <p id="description"><?php echo ($description[2]); ?>"</p>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-sm-4 col-md-4 col-lg-4 ls-images ls-images:hover">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[0]); ?>" /> 
      <div class="">
         <p id="name"><?php echo ($names[0]); ?>"</p>
         <p id="description"><?php echo ($description[0]); ?>"</p>
      </div>
   </div>
   <div class="col-sm-4 col-md-4 col-lg-4 ls-images ls-images:hover">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[1]); ?>" /> 
      <div class="">
         <p id="name"><?php echo ($names[1]); ?>"</p>
         <p id="description"><?php echo ($description[1]); ?>"</p>
      </div>
   </div>
   <div class="col-sm-4 col-md-4 col-lg-4 ls-images ls-images:hover">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images[2]); ?>" /> 
      <div class="">
         <p id="name"><?php echo ($names[2]); ?>"</p>
         <p id="description"><?php echo ($description[2]); ?>"</p>
      </div>
   </div>
</div>
 </div>
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
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