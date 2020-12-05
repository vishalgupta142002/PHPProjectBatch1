<?php

 // echo "<pre>"; print_r($_GET);

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Registration Page</title>
</head>
<body>
<form method="get" name="registartion_form" id="registartion_form" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
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

    <input type="button" value="Submit" onclick="return validateRegistartion()">
</form>

<script type="text/javascript">
   function validateRegistartion() {
       var status = true;
       var user_name = document.getElementById("user_name").value;
       var first_name = document.getElementById("first_name").value;
       var last_name = document.getElementById("last_name").value;
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

       if(status)
        document.getElementById("registartion_form").submit();
   }
</script>
</body>
</html>