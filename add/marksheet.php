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
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Create Marksheet | <?php echo $university_name; ?></title>
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
               <h6 class="h2 text-white d-inline-block mb-0">Marksheet</h6>
              
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
                   <div class="row" id="result">
                     <input type="number" name="rno" placeholder="ID"
                     data-toggle="tooltip" data-placement="top" title="Enter Student ID" required>
                     <input type="number" name="p1" placeholder="P1" 
                     data-toggle="tooltip" data-placement="top" title="Paper 1 Marks" required>
                     <input type="number" name="p2" placeholder="P2" 
                     data-toggle="tooltip" data-placement="top" title="Paper 2 Marks" required>
                     <input type="number" name="p3" placeholder="P3" 
                     data-toggle="tooltip" data-placement="top" title="Paper 3 Marks"  required>
                     <input type="number" name="p4" placeholder="P4" 
                     data-toggle="tooltip" data-placement="top" title="Paper 4 Marks"  required>
                     
                     <?php
                    
                    $class_result=mysqli_query($conn,"SELECT `c_name` FROM `exam`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Select Exam</option>';
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
                     <button type="submit" class="btn btn-primary wd-100">Add Result</button>
                     <button type="button" onclick="window.loction.replace('../manage/marksheet')" class="btn btn-danger wd-100">Manage</button>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
    </form>

    <?php
    if(isset($_POST['rno'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4']))
    {
        $rno=$_POST['rno'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];

        $marks=$p1+$p2+$p3+$p4;
        $percentage=$marks/4;

        // validation
        if (empty($class_name) or empty($rno) or $p1>100 or  $p2>100 or $p3>100 or $p4>100  or $p1<0 or  $p2<0 or $p3<0 or $p4<0  ) {
            if(empty($class_name))
                echo '<p class="error">Please select class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            if(preg_match("/[a-z]/i",$marks))
                echo '<p class="error">Please enter valid marks</p>';
            if($p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 )
                echo '<p class="error">Please enter valid marks</p>';
            exit();
        }

        $name=mysqli_query($conn,"SELECT `s_name` FROM `student` WHERE `id`='$rno' and `s_class`='$class_name'");
        while($row = mysqli_fetch_array($name)) {
            $display=$row['s_name'];
            echo $display;
         }

        $sql="INSERT INTO `result` (`s_name`, `id`, `exam`, `p1`, `p2`, `p3`, `p4`, `marks`, `percentage`) VALUES ('$display', '$rno', '$class_name', '$p1', '$p2', '$p3', '$p4', '$marks', '$percentage')";
        $sql=mysqli_query($conn,$sql);

        if (!$sql) {
          echo '<script>
          swal.fire({
            title: "Oho!",
            text: "You have to enter the student name!",
            icon: "error",
            timer:2500;
            showCancelButton: false,
            showConfirmButton  : false
          });
          </script>';
        }
        else{
          echo '<script>
          swal.fire({
            title: "Woah!",
            text: "New result has been created!",
            icon: "success",
            timer:2500;
            showCancelButton: false,
            showConfirmButton  : false
          });
          </script>';
        }
    }
?>     <!-- Page content -->
     <div class="container-fluid mt--6">
       
     <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Marksheets</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <?php
               $sql = "SELECT `id`, `percentage`, `exam`, `reg_date` FROM `result`";
               $result = mysqli_query($conn, $sql);
   
               if (mysqli_num_rows($result) > 0) {
                  echo '<table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Student ID</th>
                      <th scope="col">Percentage</th>
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
                         '.$row['percentage'].'%
                       </td>
                       <td>
                         '.$row['exam'].'
                       </td>
                       <td>
                          '.$row['reg_date'].'
                       </td>
                     </tr>';

                       
                     }
   
                   echo "</tbody>
                   </table>";
               } else {
                   echo "<p class='null'>No Result Exists!</p>";
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