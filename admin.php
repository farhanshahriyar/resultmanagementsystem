<?php include('functions.php')?>

 <!DOCTYPE html>
 <html>
 
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <?php
    include("init.php");
    session_start();
?>
   <title>Admin Login | <?php echo $university_name; ?></title>
  <?php retriveLoginHeader(); ?>
  

 </head>
 
 

 <body class="bg-default admin login-page">
   <!-- Navbar aita -->
   <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
     <div class="container">
       <a class="navbar-brand" href="./">
         <img src="./assets/img/mb.png">
       </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
         <div class="navbar-collapse-header">
           <div class="row">
             <div class="col-6 collapse-brand">
               <a href="./">
                 <img src="../../assets/img/brand/blue.png">
               </a>
             </div>
             <div class="col-6 collapse-close">
               <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                 <span></span>
                 <span></span>
               </button>
             </div>
           </div>
         </div>
         <ul class="navbar-nav mr-auto">
          
         </ul>
         <hr class="d-lg-none" />
         <ul class="navbar-nav align-items-lg-center ml-lg-auto">
         
           <li class="nav-item d-none d-lg-block ml-lg-4">
             <a href="login.php" target="_blank" class="btn btn-neutral btn-icon">
               <span class="btn-inner--icon">
                 <i class="fas fa-sign-in-alt mr-2"></i>
               </span>
               <span class="nav-link-inner--text">Search Result</span>
             </a>
           </li>
         </ul>
       </div>
     </div>
   </nav>
   <!-- Main content part eta -->
   <div class="main-content">
     <!-- Header -->
     <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    
     </div>
     <!-- Page content eta -->
     <div class="container mt--7 pb-5">
       <div class="row justify-content-center">
         <div class="col-lg-10 col-md-7">
           <div class="card bg-secondary border-0 mb-0">
             
             <div class="card-body px-lg-5 py-lg-5">
               <div class="text-center text-muted mb-4">
                 <small>Admin Login</small>
               </div>
               <form role="form" action="" method="post">
                 <div class="form-group mb-3">
                   <div class="input-group input-group-merge input-group-alternative">
                     <input class="form-control" placeholder="Username" name="userid" type="text" required>
                   </div>
                 </div>
                 <div class="form-group">
                 <div class="input-group input-group-merge input-group-alternative">
                     <input class="form-control" placeholder="Password" name="password" type="password" required>
                   </div>
                 </div>
                 <div class="custom-control custom-control-alternative custom-checkbox">
                   <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                   <label class="custom-control-label" for=" customCheckLogin">
                     <span class="text-muted">Save It as Reminder</span>
                   </label>
                 </div>
                 <div class="text-center">
                   <button type="submit" class="btn btn-primary my-4">Sign Me</button>
                 </div>
               </form>
             </div>
           </div>
           
         </div>
       </div>
     </div>
   </div>
   <?php
    
    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $sql = "SELECT username FROM admin WHERE username='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        // $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            echo '<script>
          swal.fire({
            title: "Yay!",
            text: "Successfully logged!",
            icon: "success",
            timer:2000,
            showCancelButton: false,
            showConfirmButton  : false
          });
          setTimeout(()=>{window.location.replace("./dashboard")}, 3000);
          </script>';
            
        }else {
          echo '<script>
          swal.fire({
            title: "Ooops!",
            text: "Invalid username or password!",
            icon: "error",
            timer: 2500,
            showCancelButton: false,
            showConfirmButton  : false
          });
          </script>';
        }
        
    }
?>
   <!-- Footer ar code eta -->
   <footer class="py-5" id="footer-main">
     <div class="container">
       <div class="row align-items-center justify-content-xl-between">
         <div class="col-xl-6">
           <div class="copyright text-center text-xl-left text-muted">
             &copy; 2020 <a href="https://www.facebook.com/abirxhants/" class="font-weight-bold ml-1" target="_blank">Md.Farhan Shahriyar</a>
             and <a href="https://www.facebook.com/mohammadfarhan.mohammadfarhan.3158" class="font-weight-bold ml-1" target="_blank">Farhan Nadim</a>
           </div>
         </div>
         <div class="col-xl-6">
           <ul class="nav nav-footer justify-content-center justify-content-xl-end">
             <li class="nav-item">
               <a href="#" class="nav-link" target="_blank">Admin</a>
             </li>
             <li class="nav-item">
              <a href="https://ndub.edu.bd/contact" class="nav-link" target="_blank">Contuct Us</a>
            </li>
             
             <li class="nav-item">
               <a href="https://www.ndub.edu.bd/faq" class="nav-link" target="_blank">FAQ</a>
             </li>
           </ul>
         </div>
       </div>
     </div>
   </footer>
   <?php retriveFooter(); ?>
  
 </body>
 
 </html>