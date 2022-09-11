<?php 
include('functions.php');
include('session.php');
include("init.php");
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `exam`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `student`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `result`"));

?>
<!DOCTYPE html>
<html>
 
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="CSE9">
   <meta name="author" content="farhanshahriyar|cse9|08">
   <title>Dashboard | <?php echo $university_name; ?></title>
   <?php retriveHeader(); ?>
   <script>
     function showmenu(){
    console.log;
    document.getElementById('bmenu').click();
}
   </script>
 </head>
 
 <body>
     <div class="container">
  
   <!-- Main content ar code-->
   <div class="main-content" id="panel">
     <!-- Topnav ar code eta-->
     <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
       <div class="container-fluid">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Search form -->
           <a class="navbarbrand" href="https://ndub.edu.bd/">
            <img src="./assets/img/mb.png" width="30" height="30" alt="">
          </a>

           <!-- Navbar links -->
           <ul class="navbar-nav align-items-center ml-md-auto">
             <!-- notification -->
             <?php showNotification(); ?>

            <!-- show pages -->
            <?php showPages(); ?>
           </ul>
           <ul class="navbar-nav align-items-center ml-auto ml-md-0">
             <li class="nav-item dropdown">
               <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <div class="media align-items-center">
                   <span class="avatar avatar-sm rounded-circle">
                     <?php
                     if(empty($user_logo)){
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
              <?php showUserMenu(); ?>
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
               <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
              
             </div>
             <div class="col-lg-6 col-5 text-right">
               
               <a href="#" onclick="showmenu()" class="btn btn-sm btn-neutral">Manage</a>
             </div>
           </div>
           <!-- Card stats -->
           <div class="row">
             <div class="col-xl-4 col-md-6">
               <div class="card card-stats">
                 <!-- Card body -->
                 <div class="card-body">
                   <div class="row">
                     <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">Students</h5>
                       <span class="h2 font-weight-bold mb-0"><?php echo $no_of_students[0]; ?></span>
                     </div>
                     <div class="col-xl-7">
                         <a href="./add/student" class="btn btn-primary wd100">Add Student</a>
                       
                     </div>
                   </div>
                 </div>
               </div>
             </div>

               <!-- Total results  -->

             <div class="col-xl-4 col-md-6">
               <div class="card card-stats">
                 <!-- Card body -->
                 <div class="card-body">
                   <div class="row">
                     <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">Total Sheets</h5>
                       <span class="h2 font-weight-bold mb-0"><?php echo $no_of_result[0]; ?></span>
                     </div>
                     <div class="col-xl-7">
                       <a href="./add/marksheet" class="btn btn-danger wd100">Add Sheet</a>
                     </div>
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
                     <div class="col">
                       <h5 class="card-title text-uppercase text-muted mb-0">Total Exams</h5>
                       <span class="h2 font-weight-bold mb-0"><?php echo $no_of_classes[0]; ?></span>
                     </div>
                     <div class="col-xl-7">
                       <a href="./add/exam" class="btn btn-warning wd100">Add Exam</a>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- Page content -->
     <div class="container-fluid mt--6">
       
       <div class="row">
         <div class="col-xl-4">
           <!-- Members list group card -->
           <div class="card">
             <!-- Card header -->
             <div class="card-header dashui">
               <!-- Title -->
               <h5 class="h3 mb-0"><?php echo $exam_container_title; ?></h5>
             </div>
             <!-- Card body -->
             <div class="card-body">
               <!-- List group -->
               <ul class="list-group list-group-flush list my--3">

               <?php
                 $db = mysqli_select_db($conn,'results');

                 $sql = "SELECT `c_name`, `id` FROM `exam`";
                 $result = mysqli_query($conn, $sql);
     
                 if (mysqli_num_rows($result) > 0) {
                    
     
                     while($row = mysqli_fetch_array($result))
     
                       {
                       echo '
                       <li class="list-group-item px-0">
                   <div class="row align-items-center">
                     <div class="col-auto">
                       <!-- icons -->
                       <a href="#" class="avatar rounded-circle class">
                        <span class="text-success"><i class="far fa-check-circle"></i></span>
                       </a>
                     </div>
                     <div class="col ml--2">
                       <h4 class="mb-0">
                         <a href="#!">'.$row['c_name'].'</a>
                       </h4>
                       
                     </div>
                     <div class="col-auto">
                       <button type="button" class="add-success">Added</button>
                     </div>
                   </div>
                 </li>
                       ';
     
                       }
     
                 } else {
                     echo "<p class='null'>No result exits</p>";
                 }

               ?>
                 


                 
                 
               </ul>
             </div>
           </div>
         </div>



         <div class="col-xl-4">
           <!-- Checklist -->
           <div class="card">
            <!-- Card header -->
            <div class="card-header dashui">
              <!-- Title -->
              <h5 class="h3 mb-0"><?php echo $student_container_title; ?></h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">

              <?php

            $sql = "SELECT `id`, `s_class`, `s_name` FROM `student`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               

                while($row = mysqli_fetch_array($result))
                  {
                    echo'<li class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <a href="#" class="avatar rounded-circle">
                          <i class="fas fa-user-graduate"></i>
                        </a>
                      </div>
                      <div class="col ml--2">
                        <h4 class="mb-0">
                          <a href="#!">'.$row['s_name'].'</a>
                        </h4>
                        <small class="ids"> ID: '.$row['id'].'</small>
                      </div>
                      <div class="col-auto">
                        <button type="button" class="add-success">Added</button>
                      </div>
                    </div>
                  </li>';
                    
                  }

                echo "";
            } else {
                echo "No Student Exists!";
            }
        ?>

              </ul>
            </div>
          </div>
         </div>
         
         <?php showSystem(); ?>
       </div>

       
       <!-- Footer -->
       <footer class="footer pt-0">
         <div class="row align-items-center justify-content-lg-between">
           <div class="col-lg-6">
             <div class="copyright text-center text-lg-left text-muted">
               &copy; 2020 <a href="https://www.facebook.com/abirxhants/" class="font-weight-bold ml-1" target="_blank">@Md.Farhan Shahriyar Abir</a>
               and <a href="https://www.facebook.com/mohammadfarhan.mohammadfarhan.3158" class="font-weight-bold ml-1" target="_blank">@Farhan Nadim</a>
             </div>
           </div>
           <div class="col-lg-6">
             <ul class="nav nav-footer justify-content-center justify-content-lg-end">
               <li class="nav-item">
                 <a href="#" class="nav-link" target="_blank">Credits</a>
               </li>
               <li class="nav-item">
                 <a href="#" class="nav-link" target="_blank">Contuct Us</a>
               </li>

               <li class="nav-item">
                 <a href="#" class="nav-link" target="_blank">FAQ</a>
               </li>
             </ul>
           </div>
         </div>
       </footer>
     </div>
   </div>
   </div>
   <!-- Argon Scripts -->
   <?php retriveFooter(); ?>
 </body>
 
 </html>