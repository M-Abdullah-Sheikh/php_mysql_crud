<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <center>
        <h3>Student Registeration Form</h3>

        <form method="post">

            <div class="form-group">
                <label for="exampleInputPassword1">Enter Your ID</label>
                <input type="NUMBER" class="form-control" name="std_id" id="exampleInputPassword1" placeholder="Enter Your ID">
            </div>

            <br><br>


            <div class="form-group">
                <label for="exampleInputPassword1">Enter your first name</label>
                <input type="text" class="form-control" name="std_fname" id="exampleInputPassword1" placeholder="Enter your first name">
            </div>

            <br><br>

            <div class="form-group">
                <label for="exampleInputPassword1">Enter your last name</label>
                <input type="text" class="form-control" name="std_lname" id="exampleInputPassword1" placeholder="Enter your last name">
            </div>

            <br><br>





            <div class="form-group">
                <label for="exampleInputPassword1">Fees</label>
                <input type="number" class="form-control" name="fees" id="exampleInputPassword1" placeholder="Fees">
            </div>
            <br><br>


            <div class="form-group">
                <label for="exampleInputPassword1">Enter your Days</label>
                <input type="text" class="form-control" name="days" id="exampleInputPassword1" placeholder="Enter your Days">
            </div>

            <br><br>

            <button type="submit" class="btn btn-primary" name="save"> Save Student </button>
            <button type="submit" class="btn btn-info" name="update"> Update Student</button>
            <button type="submit" class="btn btn-danger" name="delete"> Delete Student</button>
            <button type="submit" class="btn btn-warning" name="search"> Search Student</button>

        </form>

    </center>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>




</html>

<?php


// Database Information



$host = "localhost";
$username = "root";
$password = "";
$dbname = "cc_gulshan";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {

    echo '<script> alert("Database is not connected"); </script>';
} else {

    echo '<script> alert("Database is connected"); </script>';
}

if (isset($_POST['save'])) {
    $std_id = $_POST['std_id'];
    $std_fname = $_POST['std_fname'];
    $std_lname = $_POST['std_lname'];
    $fees = $_POST['fees'];
    $days = $_POST['days'];
}
$insert = "INSERT INTO our_students (id , fname 
 ,lname, fees , _days)
VALUES ($std_id , '$std_fname' , '$std_lname' , $fees  , '$days')";


if ($conn->query($insert) === TRUE) {

    echo '<script> alert("Data Saved Successfully...!!!"); </script>';
} else {

    echo '<script> alert("Data Not Save..."); </script>';
}
///////////////////////////////////////////////////////////////////////////////////




if (isset($_POST['update'])) {
    $std_id = $_POST['std_id'];
    $std_fname = $_POST['std_fname'];
    $std_lname = $_POST['std_lname'];
    $fees = $_POST['fees'];
    $days = $_POST['days'];

    $update = "UPDATE our_students  SET fname = '  $std_fname' , lname = '  $std_lname'  , fees = '$fees' , _days = ' $days'  where id = '$std_id'";

    if ($conn->query($update) === TRUE) {

        echo '<script> alert("User Updated Successfully") </script>';
    } else {

        echo '<script> alert("User Id Invalid") </script>';
    }
}
///////////////////////////////////////////////////////////////////////////



if (isset($_POST['delete'])) {

    $std_id = $_POST['std_id'];



    $delete = "DELETE from our_students where id = $std_id";


    if ($conn->query($delete) === TRUE) {

        echo '<script> alert("Data successfully Deleted"); </script>';
    } else {

        echo '<script> alert("Data is  not Deleted"); </script>';
    }
}
////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['search'])) {
    $sql = "SELECT * FROM our_students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - First Name: " . $row["fname"] . " Last Name " . $row["lname"] . " Fees " . $row["fees"] . " Days " . $row["_days"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}
$conn->close();





?>