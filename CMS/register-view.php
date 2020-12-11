<?php

$host = "localhost";
$user_name = "root";
$password = "";
$database = "phpcms";
$port = 3306;
// Single line comment
/*Single line comment*/  //Multi line comment
// echo "<pre>"; print_r($_GET);

// Create Connection
$conn = mysqli_connect($host, $user_name, $password, $database, $port);

if(!$conn) {
    die("Connection Failed: ".mysqli_connect_error());
}else{
   // die("Connected");
    // exit();
}

$username = $_POST['user_name'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

$query = " INSERT INTO employee (user_name, first_name, last_name) VALUES('$username', '$first_name', '$last_name')";

$result = mysqli_query($conn, $query);

if($result){
    echo " <script>alert('Data has been inserted.');</script>";
}else{
    die("Something has been wrong.");
}


$query = " SELECT * from employee ";
$result_query = mysqli_query($conn, $query);
if(mysqli_num_rows($result_query) > 0) {
    //while($row = mysqli_fetch_array($result_query)){
    $data = mysqli_fetch_assoc($result_query);
    while($row = mysqli_fetch_assoc($result_query)){
        echo "<pre>";
        print_r($row);
        echo "<br>";
    }

}else{
    echo " <script>alert('No record found.');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Registration Page</title>
</head>
<body>
<form method="post" name="registartion_form" id="registartion_form" action="<?php echo $_SERVER['PHP_SELF'];?>"
      autocomplete="off" onsubmit=" return validateRegistartion();">
    <div>
        <label for="user_name">Username</label>
        <input type="text" name="user_name" id="user_name" >
    </div>

    <div>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" >
    </div>

    <div>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" >
    </div>

    <div>
        <label>Course</label>
        PHP: <input type="checkbox" name="php" id="php" >
        Mysql: <input type="checkbox" name="mysql" id="mysql" >
    </div>

    <input type="submit" value="Submit" >
</form>

<script type="text/javascript">
   function validateRegistartion() {
       var status = true;

       var user_name = document.getElementById("user_name").value;
       var first_name = document.getElementById("first_name").value;
       var last_name = document.getElementById("last_name").value;
       var php = document.getElementById("php").checked;
       var mysql = document.getElementById("mysql").checked;
       /*if(!php && !mysql){
           alert("Please select at least one course.");
       }*/

       if(php === false && mysql === false){
           alert("Please select at least one course!.");
       }

       if (!user_name) {
           status = false;
           alert("Username can not be empty.");
       }
       else if (!first_name) {
           status = false;
           alert("First Name can not be empty.");
       }
       else if (!last_name) {
           status = false;
           alert("Last Name can not be empty.");
       }

       return status;
      //if(status)
       // document.getElementById("registartion_form").submit();
   }
</script>
</body>
</html>