<?php 
include('../functions.php');
include('style.php');
include('../session.php');
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
   <meta name="description" content="RMS by Farhan Shahriyar">
   <meta name="author" content="">
   <title>Add Student | <?php echo $university_name; ?></title>
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
               <h6 class="h2 text-white d-inline-block mb-0">Add Student</h6>
              
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
                 <!-- Card body -->
                 <div class="card-body">
                   <div class="row">
                     <input type="text" name="student_name" placeholder="Student Name" required>
                     <input type="text" name="roll_no" placeholder="Student ID" required>
                     
                     <?php
                    
                    $class_result=mysqli_query($conn,"SELECT `c_name` FROM `exam`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['c_name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
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
                     <button type="submit" class="btn btn-primary wd-100">Add Student</button>
                     <button type="button" onclick="window.location.replace('../manage/student')" class="btn btn-danger wd-100">Manage</button>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
    </form>

    <?php

    if(isset($_POST['student_name'],$_POST['roll_no'])) {
        $name=$_POST['student_name'];
        $rno=$_POST['roll_no'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];

        // validation
        if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            if(empty($name))
                echo '<script>
                swal.fire({
                  title: "Empty Name!",
                  text: "You have to enter the student name!",
                  icon: "error",
                  timer:2500,
            showCancelButton: false,
            showConfirmButton  : false
                });
                </script>';
            if(empty($class_name))
            echo '<script>
            swal.fire({
              title: "Oooops!",
              text: "You have to select class/exam name!",
              icon: "error",
              timer:2500,
            showCancelButton: false,
            showConfirmButton  : false
            });
            </script>';
            if(empty($rno))
            echo '<script>
            swal.fire({
              title: "Oooops!",
              text: "You have to enter student id!",
              icon: "error",
              timer:2500,
            showCancelButton: false,
            showConfirmButton  : false
            });
            </script>';
            if(preg_match("/[a-z]/i",$rno))
            echo '<script>
            swal.fire({
              title: "Something Wrong!",
              text: "Student ID must be numbers",
              icon: "error",
              timer:2500,
            showCancelButton: false,
            showConfirmButton  : false
            });
            </script>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
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
                  }
            exit();
        }
        
        $sql = "INSERT INTO `student` (`s_name`, `id`, `s_class`) VALUES ('$name', '$rno', '$class_name')";
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
        }
        else{
          echo '<script>
          swal.fire({
            title: "Successfully",
            text: "New student has been added!",
            icon: "success",
            timer:2500,
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
                  <h3 class="mb-0">Students</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <?php
               $sql = "SELECT `id`, `s_name`, `s_class`, `reg_date` FROM `student`";
               $result = mysqli_query($conn, $sql);
   
               if (mysqli_num_rows($result) > 0) {
                  echo '<table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Student Name</th>
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
                         '.$row['s_name'].'
                       </td>
                       <td>
                         '.$row['s_class'].'
                       </td>
                       <td>
                          '.$row['reg_date'].'
                       </td>
                     </tr>';

                       
                     }
   
                   echo "</tbody>
                   </table>";
               } else {
                   echo "<p class='null'>No Student Exists!</p>";
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