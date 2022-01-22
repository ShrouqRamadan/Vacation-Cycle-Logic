<?php ob_start();?>
<?php include "../sharded/header.php"?>
<?php include "../sharded/nave.php"?>
<?php include '../general/function.php';?>
<?php if($_SESSION["user"]){
  }
  else{
    
    header("location:/employee/employees/login.php");  }?>





<?php ob_end_flush();?>
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title mt-5" data-aos="fade-up">
       
          <h2>vacation request</h2>
          
          


        </div>

      

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-6">
       <h1>Sorry no more vacation available</h1>
           
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    <?php include "../sharded/scripts.php"?>