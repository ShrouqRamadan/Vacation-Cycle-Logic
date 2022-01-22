<?php ob_start();?>
<?php include "../sharded/header.php"?>
<?php include "../sharded/nave.php"?>



<section id="contact" class="contact">
      <div class="container">

        <div class="section-title mt-5" data-aos="fade-up">
       
          <h2>Login Page</h2>
          
          


        </div>

      

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-6">
          <?php
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $select="SELECT * FROM `employee` WHERE email='$email' AND password='$password'";

    $sql=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($sql);
    $num=mysqli_num_rows($sql);
    if($num > 0){
        $_SESSION["user"]=$email;
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $_SESSION['job']=$row['job'];
        $_SESSION['mobile']=$row['mobile'];
        $_SESSION['birthdate']=$row['birthdate'];
        $_SESSION['hiring']=$row['hiring'];
        $_SESSION['address']=$row['address'];
        $_SESSION['img']=$row['img'];
        $_SESSION['since']=$row['since'];
        $_SESSION['days']=$row['days'];



        header("location:/employee/employees/profile.php"); 

    }else{
        
            echo "<div class='alert text-center alert-danger ' style='width:50% ;text-align: center; margin: auto '>
            <h6 style='font-weight: 500'>  Your email or password false!</h6>
           </div>";
          
    }
}

?>
            <form action=""  method="post" role="form" class="php-email-form" enctype= multipart/form-data>
            <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="subject" placeholder=" Email" required>
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="subject" placeholder="password" required>
              </div>
           
             
              <div class="text-center"><button type="submit" name="login">Login</button></div>

            </form>
          </div>

        </div>

      </div>
      <?php ob_end_flush();?>
    </section><!-- End Contact Section -->
    <?php include "../sharded/scripts.php"?>