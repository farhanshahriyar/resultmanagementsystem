<?php 
include('../functions.php');
include('style.php');
include('session.php');
include("../init.php");
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `exam`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `student`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `result`"));

?>
<!DOCTYPE html>
<html>
 
 <head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
  
   <title>Add Exam | <?php echo $university_name; ?></title>
   <?php styleHeader(); ?>
 </head>
 
 <body>
     <div class="container">
   <!-- Main content -->
   <div class="main-content" id="panel">
     <!-- Topnav -->
     <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
       <div class="container-fluid">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Search form -->
           <a class="navbarbrand" href="https://ndub.edu.bd/">
            <img src="../assets/img/mb.png" width="30" height="30" alt="">
          </a>

           <!-- Navbar links -->
           <ul class="navbar-nav align-items-center ml-md-auto">

             <!-- notification -->
             <?php showNotification(); ?>

            <!-- show pages -->
            <?php stylePages(); ?>
           </ul>
           <ul class="navbar-nav align-items-center ml-auto ml-md-0">
             <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <div class="media align-items-center">
                   <span class="avatar avatar-sm rounded-circle">
                   <?php if(empty($user_logo)){
                       echo '<i class="fas fa-user-circle"></i>';
                     }else{
                       echo '<img alt="User" src="'.$user_logo.'">';
                     }
                     ?>
                   </span>
                   <div class="media-body ml-2 d-none d-lg-block">
                     <span class="mb-0 text-sm  font-weight-bold"><?php echo $login_session; ?></span>
                   </div>
                 </div>
               </a>
              <?php styleUserMenu(); ?>
             </li>
           </ul>
         </div>
       </div>
     </nav>
     <!-- Header -->
     <!-- Header -->
     <div class="header bg-primary pb-6">
       <div class="container-fluid">
         <div class="header-body">
           <div class="row align-items-center py-4">
             <div class="col-lg-6 col-7">
               <h6 class="h2 text-white d-inline-block mb-0">Add Exam</h6>
             </div>
             <div class="col-lg-6 col-5 text-right">
               <a href="../dashboard" class="btn btn-sm btn-neutral">Dashboard</a>
             </div>
           </div>
           <!-- Card stats -->
         <form action="" method="post">
           <div class="row">
             <div class="col-xl-8 col-md-6">
               <div class="card card-stats st-card">
                 <!-- Card Body -->
                 <div class="card-body">

                   <div class="row" id="classes">
                     <input type="text"  name="class_name" placeholder="Exam Name" required>
                     <input type="text"  name="class_id" placeholder="ID" required>
                   </div>
                   
                 </div>
               </div>
             </div>

             <!-- Total Exams -->
            
             <div class="col-xl-4 col-md-6">
               <div class="card card-stats">
                 <!-- Card body -->
                 <div class="card-body">
                   <div class="row">
                    </div>
                     <button type="submit" class="btn btn-primary wd-100">Add Exam</button>
                     <button type="button" class="btn btn-danger wd-100">Manage</button>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
    </form>

    <?php

if (isset($_POST['class_name'],$_POST['class_id'])) {
    $name=$_POST["class_name"];
    $id=$_POST["class_id"];

    // validation
    if (empty($name) or empty($id) or preg_match("/[a-z]/i",$id)) {
        if(empty($name))
        echo '<script>
          swal.fire({
            title: "Ooops!",
            text: "Class name required!",
            icon: "error",
            timer:2500,
            showCancelButton: false,
            showConfirmButton  : false
          });
          </script>';
        if(empty($id))
        echo '<script>
          swal.fire({
            title: "Ooops!",
            text: "You have to add an ID to specify the class name!",
            icon: "error",
            timer:2500,
            showCancelButton: false,
            showConfirmButton  : false
          });
          </script>';
        if(preg_match("/[a-z]/i",$id))
        echo '<script>
          swal.fire({
            title: "Ooops!",
            text: "Class ID must be a number",
            icon: "error",
            timer:2500,
            showCancelButton: false,
            showConfirmButton  : false
          });
          </script>';
        exit();
    }

    $sql = "INSERT INTO `exam` (`c_name`, `id`) VALUES ('$name', '$id')";
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
        text: "New class has been added!",
        icon: "success",
        timer:3000,
        showCancelButton: false,
        showConfirmButton  : false
      });
      </script>';
    }
}
?>
     <!-- Page content -->
     <div class="container-fluid mt--6">
       
     <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Exams</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <?php
               $sql = "SELECT `id`, `c_name`,  `reg_date` FROM `exam`";
               $result = mysqli_query($conn, $sql);
   
               if (mysqli_num_rows($result) > 0) {
                  echo '<table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Exam Name</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>';
   
                   while($row = mysqli_fetch_array($result))
                     {
                       echo '<tr>
                       <th scope="row">
                         '.$row['id'].'
                       </th>
                       <td>
                         '.$row['c_name'].'
                       </td>
                       
                       <td>
                          '.$row['reg_date'].'
                       </td>
                     </tr>';

                       
                     }
   
                   echo "</tbody>
                   </table>";
               } else {
                   echo "<p class='null'> No Exam Exists! </p>";
               }
              ?>

            </div>
          </div>
        </div>
        <!-- Show System Status  -->
        <?php showSystem(); ?>

      </div>

       
    
 </body>
 
 </html>