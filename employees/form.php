<?php ob_start();?>
<?php include "../sharded/header.php"?>
<?php include "../sharded/nave.php"?>
<?php include '../general/function.php';?>
<?php if($_SESSION["user"]){
  }
  else{
    
    header("location:/employee/employees/login.php");  }?>
<?php

if($_SESSION["days"]==0){
  header("location:/employee/employees/fail.php");
}
else{
  
   }



?>
<?php ob_end_flush();?>
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title mt-5" data-aos="fade-up">
       
          <h2>vacation request</h2>
          
          


        </div>

      

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-6">
            <?php
          if(isset($_POST['send'])){
            $to=$_POST['to'];
            $selc="SELECT * FROM holiday WHERE date='$to'";
            $sqw=mysqli_query($conn,$selc);
            $num=mysqli_num_rows($sqw);
            if($num > 0){
            echo "<div class='alert text-center alert-danger ' style='width:50% ;text-align: center; margin: auto '>
            <h6 style='font-weight: 500'> This day is already off</h6>
           </div>";
          }
          else{
            
            $id=$_SESSION['id'];
            $from=$_POST['from'];
           $reason=$_POST['reason'];
           $insert="INSERT INTO `vacation` VALUES(NULL,$id,'$from','$to','$reason','null')";
   $sqq=mysqli_query($conn,$insert);
   message($sqq,"vacation request");
   
           }

    

}
?>
            <form action=""  method="post" role="form" class="php-email-form" enctype= multipart/form-data>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="">Vacation From</label>
                  <input type="date" name="from" class="form-control" id="name" placeholder=" Name Of Employee" require >
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="">Vacation To</label>

                  <input type="date" class="form-control" name="to" id="email" placeholder=" Email Of Employee"require >
                </div>
                
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="reason" rows="5" placeholder="Reason" required></textarea>
              </div>
             
              <div class="text-center"><button type="submit" name="send">Send</button></div>

            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    <?php include "../sharded/scripts.php"?>