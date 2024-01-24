

<!DOCTYPE html>
<html>
<head>
<style>
#regform {
    border: 7px outset black;
    background-color: #fff;
    text-align: center;
    width: 600px; /* Add "px" */
    height: 650px; /* Add "px" */
    margin: auto;
}
table {
    border-collapse: collapse;
    width: 50%;
    margin: 20px 0;
}
table, th, td {
    border: 1px solid black;
}
th, td {
    padding: 10px;
    text-align: left;
}
.center {
    margin-left: auto;
    margin-right: auto;
}
.btn{
    background-color:#4caf50;
    height:50px;
    width:100px;
    font-weight:bolder;
    color:white;

}
.tab{
   
            
}
</style>
</head>
<body style="background-color:wheat">
    <div id="regform">
        <h2>LIBRARY-BOOK REGISTRATION</h2>
        <table class="center">
            <tr>
                <td>
                    <form name="bookForm" action="E.php" method="post">
                        <label for="id">Book ID:</label>
                        <input type="text" id="id" name="id" required><br><br>
                        <label for="name">Book Name:</label>
                        <input type="text" id="name" name="name" required><br><br>
                        <label for="author">Book Author:</label>
                        <input type="text" id="author" name="author" required><br><br>
                        <label for="price">Book Price:</label>
                        <input type="text" id="price" name="price" required><br><br>
                        <input type="submit" class="btn" name="register" value="Register"><br><br>
                    </form>
                </td>
            </tr>
        </table>

        <h4>SEARCH BY AUTHOR</h4>
        <table class="center">
            <tr>
                <td>
                    <form name="searchForm" action="E.php" method="post">
                        <label for="author2">AUTHOR NAME:</label>
                        <input type="text" name="author2" id="author"> <!-- Change name attribute to "author" -->
                        <input type="submit" name="search" value="Search"><br><br>
                    </form>
                </td>
            </tr>
        </table>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "boooks");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully<br>";

        if (isset($_POST['register'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $author = $_POST['author'];
            $price = $_POST['price'];

            $sql1 = "INSERT INTO my_books  VALUES ('$id', '$name', '$author', '$price')";
            if (mysqli_query($conn, $sql1)) {
                echo "<br>New record created successfully";
            } else {
                echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
            }
        }

        if (isset($_POST['search'])) {
            $author2 = $_POST['author2'];   // Change variable name to $book_author2
            echo "book_author: " . $author2 . '<br>';
            $sql = "SELECT * FROM my_books WHERE author='$author2' ";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                echo"<center>";
                echo "<div class='tab'>";
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Name</th>';
                echo '<th>Author</th>';
                echo '<th>Price</th>';
                echo '</tr>';
                
                    echo '<tr>';
                    echo '<td>' . $row["id"] . '</td>';
                    echo '<td>' . $row["name"] . '</td>';
                    echo '<td>' . $row["author"] . '</td>';
                    echo '<td>' . $row["price"] . '</td>';
                    echo '</tr>';
                    echo "</div>";
                    echo"</center>";
                }
                
                echo '</table>';
            }
        
        ?>
    </div>
</body>
</html>

