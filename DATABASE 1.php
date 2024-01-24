
<html>

<head>

<style>

#regform{

border: 5px outset blue;

background-color: white;

text-align: center;

width: 600;

height: 700;

margin:auto;

}




</style>

</head>
<body>

<div id="regform">

<h1><b> Muthoot Institute of Technology and Science</h1></b>

<form method="post" action="grocery.php">

<label for="name">Full Name:</label>

<input type="text" id="name" name="fname" required> <br><br>

<label for="roll">Roll No :</label>

<input type="text" id="roll" name="rollno" required>

<h4>Marks </h4>

<label for="ds">DS Marks :</label>

<input type="text" id="ds" name="marksDS" required><br><br>

<label for="ase">ASE Marks:</label>

<input type="text" id="ase" name="marksASE" ><br><br>

<label for="tot">Total Marks:</label>

<input type="text" id="tot" name="marksTot" ><br><br>

<input type="submit" name="submit" value="Submit"><br><br>

</form>


<?php

// Connect to DB

$conn= mysqli_connect("localhost","root","","CLGE");

if (!$conn) {

die("Connection failed: " . mysqli_connect_error());

}

echo "Connected successfully<br>";
if (isset($_POST['submit']))

{

$name = $_POST['fname'];

$rollno = $_POST['rollno'];

$marksDS = $_POST['marksDS'];

$marksASE = $_POST['marksASE'];

$marksTot = $_POST['marksTot'];

echo "rollno:".$rollno.'<br>';

echo "name:".$name.'<br>';

echo "Marks ASE :".$marksASE.'<br>';
echo "Marks DS :".$marksDS.'<br>';
echo "Total Marks :".$marksTot.'<br>';

//Connecting to database and inserting the values

$sql="insert into data values('$name', '$rollno', $marksDS, $marksASE,
$marksTot)";

if (mysqli_query($conn, $sql)) {

echo "<br>New record created successfully";

} else {

echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}


$sql = "SELECT * FROM $data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["rollno"]."</td><td>".$row["marksDS"]."</td><td>".$row["marksASE"]."</td><td>".$row["marksTot"]."</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
}


?>

</div>

</body>

</html>