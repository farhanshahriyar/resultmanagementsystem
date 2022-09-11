<?php 
include('../functions.php');
include('style.php');
include('session.php');
include("../init.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin | <?php echo $university_name; ?></title>
    <?php styleHeader() ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800;900&display=swap');
 *{
     font-family: "Poppins" !important;
 }
    @media (min-width: 1200px){
.container {
    max-width: 640px;
}
    }
.adminform{
    display: grid;
}
.adminform input, .adminform select{
    font-family: "Poppins" !important;
    font-weight: 700;
    padding: 18px 25px;
    outline: none;
    border: none;
    margin: 5px;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.09);
}
.adminform h3{
    padding: 18px 25px;
    background: #14ed2f1f;
    color: #127239;

    border: none;
}
.btn:not(:last-child){
    margin-right: 0px !important;
}
.adminform button {
    margin-top: 10px;
}
</style>
</head>
<body>
    <div class="container">
        <div class="col-xl-12">
            <form class="adminform mt-6" action="" method="post">
                <h3>Add Admin User</h3>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="pass" placeholder="Password">
                <select name="roles" id="">
                    <option value="select role">Select Role Type</option>
                    <option value="admin">Administrator</option>
                    <option value="mod">Moderator</option>
                </select>
                <button type="submit" class="btn btn-success">Add User</button>
                <button type="button" class="btn btn-danger" onclick="window.history.back()">Back</button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['username'],$_POST['pass'],$_POST['roles'])) {
        $uname = $_POST['username'];
        $pass = $_POST['pass'];
        $roles = $_POST['roles'];
        $sql = "INSERT INTO `admin` (`username`, `password`, `roles`) VALUES ('$uname', '$pass', '$roles')";
    $result=mysqli_query($conn,$sql);
    
    if (!$result) {
      echo '<script>
      swal.fire({
        title: "Ooops!",
        text: "Something went wrong",
        icon: "error",
        timer:2500,
        showCancelButton: false,
        showConfirmButton  : false
      });
      </script>';
    } else{
      echo '<script>
      swal.fire({
        title: "Yay!",
        text: "New user has been added!",
        icon: "success",
        timer:3000,
        showCancelButton: false,
        showConfirmButton  : false
      });
      </script>';
    }
    }

    styleFooter();
    ?>

</body>
</html>