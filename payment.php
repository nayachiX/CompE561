<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2>Checkout </h2>
<div class="row">
  <div class="col-75">
    <div class="container">
    <form id="billing" action="payment.php" method="POST" onsubmit="return validateform()">
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <p id = "validation" style="color: red;" value=""></p>             
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname"  pattern="[A-Za-z]{1,25}$" name="fullname" placeholder="John M. Doe"max="50">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="john@example.com" max="50">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" pattern="^[#.0-9a-zA-Z\s,-]+$" placeholder="542 W. 15th Street" max="100">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" pattern="[A-Za-z]{1,15}$" placeholder="New York" max="20">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" pattern="[A-Za-z]{1,15}$" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" pattern="[1-9]{1,15}$" name="zip" placeholder="10001" min="5"max="5">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" pattern="[A-Za-z]{1,25}$" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" min="12"max="12">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" pattern="(0?[1-9]|1[012])" placeholder="01" min="2"max="2">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" pattern="^(19|20)\d{2}$" placeholder="2018" min="4"max="4">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" regex = "^[0-9]{3, 4}$" name="cvv" placeholder="352" min="3"max="3">
              </div>
            </div>
          </div>
      </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <p>Total prints required are <span id = "value"></span></p>
      <p>Total Print Cost<span class="price" id="price" style="color:black"><b></b></span></p>
    </div>
  </div>
</div>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'web_project';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $address  = $_POST['address'];
    $city     = $_POST['city'];
    $state    = $_POST['state'];
    $zip      = $_POST['zip'];
    $cardname = $_POST['cardname'];
    $cardnum  = $_POST['cardnumber'];
    $month    = $_POST['expmonth'];
    $year     = $_POST['expyear'];
    $cvv      = $_POST['cvv'];
    $conn     = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($conn->connect_errno) {
        printf("Connect failed: %s<br />", $conn->connect_error);
        exit();
    }
    $Insert_address = "INSERT INTO web_project.address(fullname, email, address, city, state, zip ) VALUES ('$fullname', '$email', '$address', '$city', '$state', '$zip')";
    $Insert_payment = "INSERT INTO web_project.payment( fullname, creditcard, year, month, cvv) VALUES ( '$cardname', '$cardnum' ,'$year','$month', '$cvv')";
    if ($conn->query($Insert_address) && $conn->query($Insert_payment)) {
        header("Location: http://localhost:3000/My_web_project/sample.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
<script>
    var value = localStorage.getItem("quantity")
    document.getElementById('value').innerHTML = value
    var totalvalue = localStorage.getItem("quantity") *7.99
    document.getElementById("price").innerHTML = '$'+totalvalue;
    // document.getElementById("price").innerHTML = '$'+'10'+'.00';
    function validateform() {
        let fname = document.forms["billing"]["fullname"].value
        let email = document.forms["billing"]["email"].value
        let adr = document.forms["billing"]["address"].value
        let city = document.forms["billing"]["city"].value
        let state = document.forms["billing"]["state"].value
        let zip = document.forms["billing"]["zip"].value
        let cardname = document.forms["billing"]["cardname"].value
        let cardnum = document.forms["billing"]["cardnumber"].value
        let month = document.forms["billing"]["expmonth"].value
        let year = document.forms["billing"]["expyear"].value
        let cvv = document.forms["billing"]["cvv"].value
        if(fname == "" || email == "" || adr == "" || city == "" || state == "" || zip == "" || cardname == "" || cardnum == "" || expmonth == "" || expyear == "" || cvv == "") {
            document.getElementById("validation").innerHTML = "*Please fill all the fields"
            return false
          }
          else {
           
          }
      }

</script>

</body>
</html>

