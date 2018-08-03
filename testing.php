<?php
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
// $sql = "INSERT INTO BAyAreaBizDB.BayBizt (username, password, email)
// VALUES ('Kenai', 'Mypassword', 'kenai.mckinley@hgs.hiddengeniusproject.org')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
$sql = "SELECT * FROM BAyAreaBizDB.BayBizt";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . " - Name: " . $row["password"]. " " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 

