<?php
// ====system function ====
function runAPI($x) {
  $minp = 90;
  $mp = 100;

  
  return rand($minp,$mp);
}
// ==== SYStem Status =====
function showUserMenu(){
  echo '
  <div class="dropdown-menu dropdown-menu-right">
  <div class="dropdown-header noti-title">
    <h6 class="text-overflow m-0">Welcome!</h6>
  </div>
  <a href="../add/admin" class="dropdown-item">
    <i class="fas fa-user"></i>
    <span>Logout</span>
  </a>
  <a href="./logout" class="dropdown-item">
    <i class="ni ni-user-run"></i>
    <span>Logout</span>
  </a>
</div>
  ';
}
function sitetitle(){
    $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
    $urlPath = $_SERVER['REQUEST_URI'];
    if($urlPath == "admin"){
        echo 'Admin Panel';
    }
}
function retriveLoginHeader(){
  echo '
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.3/sweetalert2.all.js" integrity="sha512-Qd9etBVqREuqrtMBIAvtW2l1y7bbpiOgLozRkK82HHGiRRXihUHndhaiwTJGWdRGq9NJP68V06QfLbcyA1ELpg==" crossorigin="anonymous"></script>
  <!-- <link ref=""stylesheet" href="./assets/vendor/sweetalert2/dist/sweetalert2.min.css" type="text/css">
  <script src="./assets/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
   -->
   <!-- Favicon -->
   <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  

   <link rel="stylesheet" href="./assets/css/app.css" type="text/css">
   <link rel="stylesheet" href="./assets/css/login.css" type="text/css">

';
}

function retriveHeader(){
    echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- Favicon -->
    <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
   
 
    <link rel="stylesheet" href="./assets/css/app.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/dashui.css" type="text/css">

';
}

function retriveFooter(){
    echo '
    <!-- Core -->
   <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
   <script src="./assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
   <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
   <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
   <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
   <!-- System JS -->
   <script src="./assets/js/app.js"></script>
   <script src="./assets/js/system.js"></script>
    ';
}
function showNotification(){
    echo'
    <li class="nav-item dropdown">
               <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="ni ni-bell-55"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                 <!-- Dropdown header -->
                 <div class="px-3 py-3">
                   <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">1</strong> notifications.</h6>
                 </div>
                 <!-- List group -->
                 <div class="list-group list-group-flush">
                   <a href="#!" class="list-group-item list-group-item-action">
                     <div class="row align-items-center">
                       <div class="col-auto not-icon">
                         <i class="fas fa-bolt"></i>
                       </div>
                       <div class="col ml--2">
                         <div class="d-flex justify-content-between align-items-center">
                           <div>
                             <h4 class="mb-0 text-sm not-title" >v1.1.0 Update</h4>
                           </div>
                           <div class="text-right text-muted">
                             <small class="fwho">From System</small>
                           </div>
                         </div>
                         <p class="text-sm mb-0">Result System has been updated!</p>
                       </div>
                     </div>
                   </a>
                   
                  
                   
                  
                 </div>
                 <!-- View all -->
                 <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">That is all.</a>
               </div>
             </li>
    ';
}

function showPages(){
    echo '
    <li class="nav-item dropdown">
    <a class="nav-link" id="bmenu" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="ni ni-ungroup"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
      <div class="row shortcuts px-4">
        <a href="./manage/student" class="col-4 shortcut-item">
          <span class="shortcut-media avatar rounded-circle bg-gradient-red">
            <i class="fas fa-cogs"></i>
          </span>
          <small>Students</small>
        </a>
        <a href="./manage/exam" class="col-4 shortcut-item">
          <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
            <i class="fas fa-cogs"></i>
          </span>
          <small>Exams</small>
        </a>
        <a href="./manage/marksheet" class="col-4 shortcut-item">
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
function showFooter(){
    echo '
    <footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6">
        <div class="copyright text-center text-lg-left text-muted">
          &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">DigiTaL University Ltd</a>
        </div>
      </div>
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="#" class="nav-link" target="_blank">Credits</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" target="_blank">About Us</a>
          </li>

          <li class="nav-item">
            <a href="./license" class="nav-link" target="_blank">License</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>';
}
function showSystem(){
  echo'
  <div class="col-xl-4">
  <!-- Progress track -->
  <div class="card">
    <!-- Card header -->
    <div class="card-header dashui">
      <!-- Title -->
      <h5 class="h3 mb-0"> System Status</h5>
    </div>
    <!-- Card body -->
    <div class="card-body" >
   
     <div id="conperf">
      <!-- List group -->
      <ul class="list-group list-group-flush list my--3">
        <li class="list-group-item px-0" id="down" >
          <div class="row align-items-center">
            <div class="col-auto">
              <!-- Avatar -->
              <a href="#" class="avatar rounded-circle st-orange">
                <span><i class="fas fa-arrow-down"></i></span>
              </a>
            </div>
            <div class="col">
              <h5 id="sdtext">Loading...</h5>
              <div class="progress progress-xs mb-0">
                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item px-0" id="apiperf" >
          <div class="row align-items-center">
            <div class="col-auto">
              <!-- Avatar -->
              <a href="#" class="avatar rounded-circle st-blue">
                <span>API</span>
              </a>
            </div>
            <div class="col">
              <h5 id="apitext" >Loading...</h5>
              <div class="progress progress-xs mb-0">
               <div class="progress-bar bg-teal" role="progressbar" title="99%" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width: 99%;"></div>
             </div>
            </div>
          </div>
        </li>
        <li class="list-group-item px-0" id="siteperf">
          <div class="row align-items-center">
            <div class="col-auto">
              <!-- Avatar -->
              <a href="#" class="avatar rounded-circle st-green">
                <span><i class="fas fa-bolt"></i></span>
              </a>
            </div>
            <div class="col">
              <h5>Site Performance</h5>
              <div class="progress progress-xs mb-0">
                <div class="progress-bar bg-green" role="progressbar" title="92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 96%;"></div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item px-0" id="lib">
          <div class="row align-items-center">
            <div class="col-auto">
              <!-- Avatar -->
              <a href="#" class="avatar rounded-circle st-blue"> 
                <span>LIB</span>
              </a>
            </div>
            <div class="col">
              <h5 id="libperf">Loading...</h5>
              <div class="progress progress-xs mb-0">
                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
              </div>
            </div>
          </div>
        </li>
      </ul>
      </div>
    </div>
  </div>
</div>
  ';
}

function showprofile(){}
?>