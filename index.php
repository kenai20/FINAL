<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bay Area Biz</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "BAyAreaBizDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = " SELECT * FROM BAyAreaBizDB.BayBizt ORDER BY id DESC LIMIT 1 ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo " id: " . $row["id"]. " - Name: " . $row["username"]. " - Email: " . $row["email"].  "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 
  <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: ;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

</head>

  <body>

<?php
if(isset($_POST['submit']))
{
  //
  insert();
  checkLogin();
     header("Location: index.php");
} 

function checkLogin(){
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "BAyAreaBizDB";
  session_start();
  // Create connection
  $conn = new mysqli($servername, $username, $password, $email);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT * FROM BAyAreaBizDB.BayBizt WHERE uname= LOWER('" . $_POST['username'] . "') AND pswd ='" . $_POST['password'] ." - Email: " . $row["email"]. "' LIMIT 1";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $_SESSION['email'] = $row["email"];
        $_SESSION['uname'] = $row["uname"];
          echo "id: " . $row["id"]. " - Name: " . $row["email"] ."<br>";

          
      }
  }
   $conn->close();
 }

function insert(){
  $servername = "localhost";
$username = "root";
$password = "root";
$dbname = "BAyAreaBizDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
// $sql = "CREATE TABLE BAyAreaBizDB.BayBizT (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// username VARCHAR(30) NOT NULL,
// password VARCHAR(30) NOT NULL,
// email VARCHAR(50)
// )";

// if (mysqli_query($conn, $sql)) {
//     echo "Table BayBizT created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }
$sql = "INSERT INTO BAyAreaBizDB.BayBizt (username, password, email)
VALUES ('" . $_POST['uname'] . "', '" . $_POST['pswd'] . "','" . $_POST['email'] . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



 $conn->close();
}
?>
<div id="id01" class="modal">
  
  <form class="modal-content animate"  method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
     
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="pswd"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pswd" required>

            <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter email" name="email" required>
        
      <button type="submit" name="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>


    <!--  Masthead -->
   <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">we support all black buisnesses in the bay area </h1>
          </div>             
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">SignUp</button>
            <form>
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  
                </div>
                <div class="col-12 col-md-3">
                </div>
              </div>


            </form>
          </div>

        </div>
      </div>
      

    </header>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/image2.jpeg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <a href="Food.html"><h2>Food</h2></a>
            <p class="lead mb-0">To help you find the best place to eat and have a good time.</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/image1.jpg');"></div>
          <div class="col-lg-6my-auto showcase-text">
            <h2>Fashion</h2>
            <p class="lead mb-0">To find everyone's Fashion related shops and sites.</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/image3.jpg');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Technologhy</h2>
            <p class="lead mb-0">Need someone to help you find the technological help you need? It's right here.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <!-- Call to Action -->
    <!-- Footer -->
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="https://www.facebook.com/TheHiddenGeniusProject/">
                  <i class="fa fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="https://twitter.com/HiddenGeniusPro?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
                  <i class="fa fa-twitter fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/hiddengeniuspro/?hl=en">
                  <i class="fa fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </body>

</html>
