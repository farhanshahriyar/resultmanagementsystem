
 <!DOCTYPE html>
 <html>
 <?php
include('init.php');
 ?>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
   <title>Login | <?php echo $university_name; ?></title>
  
   <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">

   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

   <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  
   
   <link rel="stylesheet" href="./assets/css/app.css?v=1.1.0" type="text/css">
   <link rel="stylesheet" href="./assets/css/login.css?v=1.1.0" type="text/css">
 </head>
 
 <body class="bg-default student login-page">

   <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
     <div class="container">
       <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
         <img src="./assets/img/mb.png">
       </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
         <div class="navbar-collapse-header">
           <div class="row">
             <div class="col-6 collapse-brand">
               <a href="../../pages/dashboards/dashboard.html">
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
             <a href="https://ndub.edu.bd/" target="_blank" class="btn btn-neutral btn-icon">
               <span class="btn-inner--icon">
                 <i class="fas fa-sign-in-alt mr-2"></i>
               </span>
               <span class="nav-link-inner--text">OFFICIAL WEBSITE</span>
             </a>
           </li>
         </ul>
       </div>
     </div>
   </nav>
   <!-- Main content -->
   <div class="main-content">
     <!-- Header -->
     <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    
     </div>
     <!-- Page content -->
     <div class="container mt--7 pb-5">
       <div class="row justify-content-center">
         <div class="col-lg-10 col-md-7">
           <div class="card bg-secondary border-0 mb-0">
             
             <div class="card-body px-lg-5 py-lg-5">
               <div class="text-center text-muted mb-4">
                 <small>Enter Credentials</small>
               </div>
               <form role="form" action="./result" method="get">
                 <div class="form-group mb-3">
                   <div class="input-group input-group-merge input-group-alternative">
                     
                     <input class="form-control" name="id" placeholder="Student ID" type="text">
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="input-group input-group-merge input-group-alternative">
                     
                   <?php
                        include('init.php');

                        $class_result=mysqli_query($conn,"SELECT `c_name` FROM `exam`");
                            echo '<select name="class">';
                            echo '<option selected disabled>Select Class</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['c_name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>
                   </div>
                 </div>
                 <div class="custom-control custom-control-alternative custom-checkbox">
                   <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                   <label class="custom-control-label" for=" customCheckLogin">
                     <span class="text-muted">Save It as Reminder</span>
                   </label>
                 </div>
                 <div class="text-center">
                   <button type="submit" class="btn btn-primary my-4">Show Result</button>
                 </div>
               </form>
             </div>
           </div>
           
         </div>
       </div>
     </div>
   </div>
   <!-- Footer -->
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
               <a href="./admin" class="nav-link" target="_blank">Admin</a>
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
 
   <!-- Core -->
   <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
   <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
   
   <script src="./assets/js/app.js?v=1.1.0"></script>
  
   <script src="./assets/js/system.js"></script>
 </body>
 
 </html>