<?php ob_start();?>
<?php include "../sharded/header.php"?>
<?php include "../sharded/nav.php"?>
<?php include '../general/function.php';?>
<?php
  if($_SESSION["admin"]){

  }else{
    header("location:/employee/employees/loginn.php");
  }
  ?>


<section id="contact" class="contact">
      <div class="container">

        <div class="section-title mt-5" data-aos="fade-up">
          <h2>Add New Admin</h2>
        </div>

        <?php
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $img_type=$_FILES['img']['type'];
    $img_name=$_FILES['img']['name'];
    $img_tmp=$_FILES['img']['tmp_name'];
    $location="./update/";
    move_uploaded_file($img_tmp,$location.$img_name);
    $insert="INSERT INTO `admin` VALUES(NULL,'$name','$email','$password','$img_name')";
    $sql=mysqli_query($conn,$insert);
    message($sql,"insert");

}

?>

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <form action=""  method="post" role="form" class="php-email-form" enctype= multipart/form-data>
            
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder=" Name Of Employee" required >
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder=" Email Of Employee" required >
                </div>
              </div>
        
               
             
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="subject" placeholder="Password" required >
                
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
              
              
              <div class="text-center"><button type="submit" name="send" >Send </button></div>
              

            </form>
          </div>

        </div>

      </div>
      <?php ob_end_flush();?>
    </section><!-- End Contact Section -->
    <?php include "../sharded/scripts.php"?>