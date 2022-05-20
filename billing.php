<html>
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styles.css">
<title>MoonLight Restaurant</title>
<link rel ="icon" href="images/headerimage.png">
  <body>
  <?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'Gnanesh@1140';
$dbname = 'web_project';
$typeoforder = $_POST['typeoforder'];
echo $typeoforder;
$ordervalue = $_POST['takeoutorderid'];
echo $ordervalue;
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_errno)
{
    printf("Connect failed: %s<br />", $conn->connect_error);
    exit();
}
$select_sql = "SELECT MAX(orderid) FROM orders";
$result = $conn->query($select_sql);
$row = mysqli_fetch_array($result);
$displayvalue = $row[0];
$conn->close();
?>
  </head>
  <body>
  <div class="topbar">
         <div class = "container">
            <img class = "logo" src="images/headerimage.png" alt="Restuarant Logo" style="cursor: pointer;">
         </div>
      </div>
<div id=takeoutform style="display : None" class="confirmtable">
      <h2>Thank you for your ordering the food</span></h2>
      <h4>Your OrderID is: <span id="ordernumber" value=""></span></h4>
      <a href="index.html" style="color:whitesmoke">Back To Homepage</a>
</div>
         <div class="form-container" id="billing" style="display: none;">
         <form id="billingaddress" autocomplete="off" action="final.php" autocomplete="off" methd="POST" onsubmit="return validateform()">
           <fieldset>
           <p id = "validation" style="color: red;" value=""></p>             
            <div class="">
            <h4>Your OrderID is: <span id="billingid" value=""></span></h4>
               <h3>Billing Address</h3>
               <label for="fname"><i class="fa fa-user"></i> Full Name</label>
               <input type="text" id="fname" pattern="[A-Za-z]{1,25}$" name="fname" placeholder="Name" value="">
               <label for="email"><i class="fa fa-envelope"></i> Email</label>
               <input type="text" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="example@gmail.com" value="">
               <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
               <input type="text" id="adr" name="adr" pattern="^[#.0-9a-zA-Z\s,-]+$" value="">
               <label for="city"><i class="fa fa-institution"></i> City</label>
               <input type="text" id="city" pattern="[A-Za-z]{1,15}$" name="city" placeholder="City" value="">
               <label for="state"><i class="fa fa-institution"></i>State</label>
               <input type="text" id="state" pattern="[A-Za-z]{1,15}$" name="state" placeholder="NY" value="">
               <label for="zip"><i class="fa fa-institution"></i>Zip</label>
               <input type="text" id="zip" name="zip" pattern="[0-9]{5}$" placeholder="10001" value="">
               <label>
               <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
               </label>
               <input type="submit" value="Continue to checkout" style="margin-left: 5em;">
            </div>
            </fieldset>
         </form>
      </div>
      <script script type="text/javascript">
        var value = <?php echo json_encode($typeoforder) ?>;
        var orderid = <?php echo json_encode($displayvalue) ?>;
        if (value == "Takeout") {
          document.getElementById('takeoutform').style.display = 'block'
          document.getElementById('ordernumber').innerHTML = orderid;
        } 
        else {
          document.getElementById('billingid').innerHTML = orderid;
          document.getElementById('billing').style.display = 'block';
          document.getElementById('takeoutform').style.display = 'none';
        }

        function validateform() {
        let fname = document.forms["billingaddress"]["fname"].value
        let email = document.forms["billingaddress"]["email"].value
        let adr = document.forms["billingaddress"]["adr"].value
        let city = document.forms["billingaddress"]["city"].value
        let state = document.forms["billingaddress"]["state"].value
        let zip = document.forms["billingaddress"]["zip"].value
        if(fname == "" || email == "" || adr == "" || city == "" || state == "" || zip == "") {
            document.getElementById("validation").innerHTML = "*Please fill all the fields"
            return false
          }
      }


</script>
<footer>
         <p class="copyright">&copy; MoonLight Restaurant (Project work)</p>
      </footer>
        </body>
</html>
