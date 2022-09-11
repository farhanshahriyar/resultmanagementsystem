<body>
 
  <!doctype html>
  <html lang="en">
<?php
        include("init.php");

?>
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/marksheet.css">
    <title>Recport Card | <?php echo $university_name; ?></title>

    <style>
      .tablefirst,
      .tablesecond {
        text-align: center;
      }
      h5{
        font-size: 1.05rem !important;

      }
      strong{
        font-size: 13px !important;
      }
      .col-sm-6.uni-logo img{
        width: 45px;
      }
      img.sign{
        width: 45px;
      }
    </style>

  </head>
  <?php

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['id'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
            echo "<div class='container' >
            <div class='err mt-5'>
            <p class='h3'> Something went wrong!</p>
            <span>Please check your student ID & exam before retry!</span>
            </br>
            </br>
            <a class='recheck' href='#back' onclick='window.history.back()'>Recheck</a>
            </div>
            
            </div>";
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `s_name` FROM `student` WHERE `id`='$rn' and `s_class`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['s_name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `id`,`p1`, `p2`, `p3`, `p4`, `marks`, `percentage`, `reg_date` FROM `result` WHERE `id`='$rn' and `exam`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
          $id = $row['id'];
          $regDate = $row['reg_date'];
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            // $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "<div class='container' >
            <div class='err mt-5'>
            <p class='h3'> No result found!</p>
            <span>Please check your student ID & exam before retry!</span>
            </br>
            </br>
            <a class='recheck' href='#back' onclick='window.history.back()'>Recheck</a>
            </div>
            
            </div>";
            exit();
        }
    ?>

  <body>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="marksheet-box">
              <div class="row">
                <div class="col-sm-3 txt-cntr"></div>
                <div class="col-sm-6 uni-logo">
                  <img src="<?php echo $u_logo; ?>" alt="uni-logo" />
                </div>
                <div class="col-sm-3 txt-cntr"></div>
                <div class="col-sm-12 uni-add">
                <h3><?php echo $university_name; ?></h3>
                  <p>Address: <?php echo $university_address; ?><br><?php echo $url; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-4 enrolmentNo txt-cntr">
                  <p><strong>Enrolment ID: </strong> <?php echo $id; ?></p>
                </div>
                <div class="col-sm-4 streamName  txt-cntr">
                  <h2>RESULT</h2>
                  <h5><?php echo $class; ?><h5>
                      <h5>Year Examination : <?php echo date("M").' - '.date("Y"); ?><h5>
                </div>
                <div class="col-sm-4">
                </div>
              </div>
              <div class="row Studen_Detail">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-4 offset-sm-2">
                      <p><span><strong>Name of Student :</strong></span><strong> <?php echo $name; ?></strong></p>

                    </div>
                    <div class="col-sm-4 offset-sm-2">
                      <p><strong>Student ID :</strong><strong> <?php echo $rn; ?></strong></p>
                      <p><strong>Year :</strong><strong> <?php $year = date("Y"); echo $year;?></strong></p>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="container-fluid">
                  <div class="col-12">
                    <div class="table-div">
                      <table class="table table-bordered tablefirst">
                        <thead>
                          <tr>
                            <!-- <th rowspan="2" style="vertical-align: middle;">Subject Code</th> -->
                            <th rowspan="2" style="vertical-align: middle;">Subject Name</th>
                            <!-- <th colspan="2">Maximum Marks</th> -->
                            <th rowspan="2" style="vertical-align: middle;">Total</th>
                            <!-- <th colspan="2">Marks Obtained</th> -->
                            <th rowspan="2" colspan="3" style="vertical-align: middle;">Marks Obtained</th>
                            <th rowspan="2" colspan="2" style="vertical-align: middle;">Result</th>
                          </tr>

                        </thead>
                        <tbody>
                          <tr>

                            <td>Paper 1</td>
                            <!-- <td>40</td>
      <td>60</td> -->
                            <td>100</td>
                            <td colspan="3"><?php echo $p1; ?></td>
                            <td colspan="2"><?php if($p1 >= $passMarks){ echo 'Pass';}else{echo 'Fail';}; ?></td>
                          </tr>
                          <tr>
                            <td>paper 2</td>

                            <td>100</td>
                            <td colspan="3"><?php echo $p2 ; ?></td>
                            <td colspan="2"><?php if($p2 >= $passMarks){ echo 'Pass';}else{echo 'Fail';}; ?></td>
                          </tr>
                          <tr>
                            <td>paper 3</td>
                            <td>100</td>
                            <td colspan="3"><?php echo $p3 ; ?></td>
                            <td colspan="2"><?php if($p3 >= $passMarks){ echo 'Pass';}else{echo 'Fail';}; ?></td>
                          </tr>

                          <tr>
                            <td>paper 4</td>

                            <td>100</td>
                            <td colspan="3"><?php echo $p4 ; ?></td>
                            <td colspan="2"><?php if($p4 >= $passMarks){ echo 'Pass';}else{echo 'Fail';}; ?></td>
                          </tr>
                          <tr>
                            <th colspan="1" style="text-align: right;">Total</th>
                            <th>400</th>
                            <th colspan="3"><?php echo $mark; ?></th>

                            <th>Percentage</th>
                            <th><?php echo $percentage.'%'; ?></th>
                          </tr>
                        </tbody>


                        <table class="table table-bordered tablesecond">

                        </table>

                    </div>
                  </div>
                </div>



              </div>
              <br><br>
              <div class="row">
                <div class="col-sm-4 txt-cntr">
                  <p style="height:40px;"></p>
                  <p><strong>Date of Issue :</strong><strong> <?php echo $regDate; ?></strong></p>
                </div>
                <div class="col-sm-4 txt-cntr">
                  <p style="height:40px;" >
                  <img src="<?php echo $sign; ?>" class="sign" alt="">
                  </p>
                  <p><strong>VC,NDUB </strong></p>
                </div>
                <div class="col-sm-4 txt-cntr">
                  <p>
                  <!-- <img src="" alt="student-signarute"
                      width="100px; height=" 40px;" /> -->
                  <img src="<?php echo $stamp; ?>" class="sign" alt="">
                      
                      </p>
                  <p><strong>Signature of Controller</strong></p>
                </div>
              </div>


            </div>
          </div>
        </div>


      </div>



      </div>
      </div>
      </div>
      </div>


      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
      </script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
      </script>
  </body>

  </html>
  <!-- partial -->

</body>

</html>