<?php
function styleFooter(){
    echo '
    <!-- Core -->
   <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
   <script src="../assets/vendor/popper/popper.min.js"></script>
   <script src="../assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
   <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
   <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
   <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

   <script src="../assets/js/app.js"></script>
   <script src="../assets/js/system.js"></script>
    ';
}

function styleHeader(){
    echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.3/sweetalert2.all.js" crossorigin="anonymous"></script>
  <!--  <script src="../assets/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script> -->


    <!-- Favicon -->
    <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
   
 
    <link rel="stylesheet" href="../assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/dashui.css" type="text/css">

';
}

function styleUserMenu(){
  echo '
  <div class="dropdown-menu dropdown-menu-right">
  <div class="dropdown-header noti-title">
    <h6 class="text-overflow m-0">Welcome!</h6>
  </div>
  
  <a href="./logout" class="dropdown-item">
    <i class="ni ni-user-run"></i>
    <span>Logout</span>
  </a>
</div>
  ';
}

function stylePages(){
  echo '
  <li class="nav-item dropdown">
  <a class="nav-link" id="bmenu" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="ni ni-ungroup"></i>
  </a>
  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
    <div class="row shortcuts px-4">
      <a href="../manage/student" class="col-4 shortcut-item">
        <span class="shortcut-media avatar rounded-circle bg-gradient-red">
          <i class="fas fa-cogs"></i>
        </span>
        <small>Students</small>
      </a>
      <a href="../manage/exam" class="col-4 shortcut-item">
        <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
          <i class="fas fa-cogs"></i>
        </span>
        <small>Exams</small>
      </a>
      <a href="../manage/marksheet" class="col-4 shortcut-item">
        <span class="shortcut-media avatar rounded-circle bg-gradient-info">
          <i class="fas fa-cogs"></i>
        </span>
        <small>Results</small>
      </a>
     
      
    </div>
  </div>
</li>
  ';
}
?>