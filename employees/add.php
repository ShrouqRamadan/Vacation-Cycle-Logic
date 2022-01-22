<?php ob_start();?>
<?php include "../sharded/header.php"?>
<?php include "../sharded/nav.php"?>
<?php include '../general/function.php';?>
<?php error_reporting(0)?>
<?php
  if($_SESSION["admin"]){

  }else{
    header("location:/employee/employees/loginn.php");
  }
  ?>
<?php

#==================================
$na="";
    $em="";
    $mo="";
    $jo="";
    $bi="";
    $hi="";
    $pa="";
    $ad="";
    $update=false;
if(isset($_GET['edit'])){
    $update=true;
    $id=$_GET['edit'];
    $sel="SELECT * FROM employee WHERE id=$id";
    $sqli=mysqli_query($conn,$sel);
    $row=mysqli_fetch_assoc($sqli);
    $na=$row['name'];
    $em=$row['email'];
    $mo=$row['mobile'];
    $jo=$row['job'];
    $bi=$row['birthdate'];
    $hi=$row['hiring'];
    $pa=$row['password'];
    $ad=$row['address'];
    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $job=$_POST['job'];
        $birth=$_POST['birth'];
        $hir=$_POST['hir'];
        $password=$_POST['password'];
        $addresss=$_POST['addresss'];
        $img_type=$_FILES['img']['type'];
        $img_name=$_FILES['img']['name'];
        $img_tmp=$_FILES['img']['tmp_name'];
        $location="./update/";
        $today = date("Y-m-d");
    $diff = date_diff(date_create($hir), date_create($today));
    $since= $diff->format('%y');
    move_uploaded_file($img_tmp,$location.$img_name);
    if($_SESSION['since'] >= 10){
      $days=21;
    }else{
      $days=30;
    }
        move_uploaded_file($img_tmp,$location.$img_name);
        $up="UPDATE employee SET name='$name',email='$email',job='$job',mobile='$mobile',birthdate='$birth', hiring='$hir',password='$password',address='$addresss', img='$img_name', since=$since,days=$days WHERE id=$id";
        mysqli_query($conn,$up);
        header("location:/employee/employees/list.php"); 
    }
}

?>

<section id="contact" class="contact">
      <div class="container">

        <div class="section-title mt-5" data-aos="fade-up">
           <?php  if($update):?>
        <h2>Update : <?php  echo $na?></h2>
        <?php else :?>
          <h2>Add New Employee</h2>
          <?php endif;?>
          


        </div>

      

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <?php
          if(isset($_POST['send'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $job=$_POST['job'];
    $birth=$_POST['birth'];
    $hir=$_POST['hir'];
    $password=$_POST['password'];
    $addresss=$_POST['addresss'];
    $img_type=$_FILES['img']['type'];
    $img_name=$_FILES['img']['name'];
    $img_tmp=$_FILES['img']['tmp_name'];
    $location="./update/";
    $today = date("Y-m-d");
    $diff = date_diff(date_create($hir), date_create($today));
    $since= $diff->format('%y');
    move_uploaded_file($img_tmp,$location.$img_name);
    if($_SESSION['since'] > 10){
      $days=21;
    }else{
      $days=30;
    }
    $insert="INSERT INTO employee VALUES(NULL,'$name','$email','$job','$mobile','$birth','$hir','$password','$addresss','$img_name',$since,$days)";
    $sql=mysqli_query($conn,$insert);
    message($sql,"insert");
}
?>
            <form action=""  method="post" role="form" class="php-email-form" enctype= multipart/form-data>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder=" Name Of Employee" required value="<?php echo $na ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder=" Email Of Employee" required value="<?php echo $em ?>">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6 form-group">
                  <input type="text" name="mobile" class="form-control" id="name" placeholder=" Mobile Of Employee" required value="<?php echo $mo ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input  class="form-control" name="job" id="email" placeholder=" job Title Of Employee" required value="<?php echo $jo ?>">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label for="">Birthdate of Employee</label>
                  <input type="date" name="birth" class="form-control" id="name"  required value="<?php echo $bi ?>">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="">hiring data of Employee</label>

                  <input type="date" class="form-control" name="hir" id="email"  required value="<?php echo $hi ?>">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="subject" placeholder="Password" required value="<?php echo $pa ?>">
                <!-- An element to toggle between password visibility -->
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="addresss" id="subject" placeholder="Address" required value="<?php echo $ad ?>">
              </div>
              <div class="form-group mt-3">
                  <label for="">Upload Photo</label>
                <input type="file" class="form-control" name="img" id="subject"  >
              </div>
              
              
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <?php if($update):?>
              <div class="text-center"><button type="submit" name="update" >Update </button></div>
              <?php else:?>
              <div class="text-center"><button type="submit" name="send" >Send </button></div>
              <?php endif ;?>

            </form>
          </div>

        </div>

      </div>
      <?php ob_end_flush();?>
    </section><!-- End Contact Section -->
    <?php include "../sharded/scripts.php"?>