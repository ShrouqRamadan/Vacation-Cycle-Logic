<?php
$host="localhost";
$user="root";
$password="";
$dbname="employee";
$conn=mysqli_connect($host,$user,$password,$dbname);
session_start();
if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  }
?>
<?php 
$id=$_SESSION['id'];
$selectss="SELECT * FROM `vacation` WHERE empid=$id";
$sqlu=mysqli_query($conn,$selectss);


?>



<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="index.php">vacation </a></h1>

      
      </div>

      <nav id="navbar" class="navbar">

        <ul>
          <?php if(isset($_SESSION['user'])){?>
          
          <li><a class="nav-link scrollto " href="/employee/employees/profile.php">Profile page</a></li>
          <li><a class="nav-link scrollto " href="/employee/employees/form.php">VACATION REQUEST</a></li>
          <?php } ?>


          <?php if(isset($_SESSION['user'])):?>
          <li class="dropdown " ><a href="#" ><span>history requests </span> <i class="bi bi-chevron-down"></i></a>
          
            <ul>
              <li><table class="table">
  <thead class="thead-dark" >
    <tr>
      
      <th scope="col">From</th>
      <th scope="col">to</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($rowss=mysqli_fetch_assoc($sqlu)){?>
    <tr>
   <?php $_SESSION['empid']=$rowss['empid']?>

      
      <th scope="row"><?php echo  $_SESSION['vfrom']=$rowss['vfrom']?></th>
      <td><?php echo $_SESSION['vto']=$rowss['vto']?></td>
      <td><?php echo $_SESSION['statue']=$rowss['statue'] ?></td>
    </tr>
    <?php }?>
   
  </tbody>
</table>

</li>
              
          
            </ul>
          </li>
          <?php endif ;?>   
          <?php if(isset($_SESSION["user"])):?>
          <li>
         <form action="">
         <button  name="logout"  class="btn btn-danger" >logout</button>
         </form>
         </li>

         <?php else :?>

          <li>
         <form action="">
         <a class="nav-link scrollto " href="/employee/employees/login.php">Login</a>
         </form>
</li>
<?php endif ;?>


       
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->