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

<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="index.php">vacation </a></h1>

      
      </div>

      <nav id="navbar" class="navbar">
        <ul><?php if(isset($_SESSION['admin'])){?>
          <li><a class="nav-link scrollto active" href="/employee/index.php">Home</a></li>
          <li><a class="nav-link scrollto " href="/employee/employees/adminpr.php">Profile page</a></li>
          <li><a class="nav-link scrollto " href="/employee/employees/registerad.php">Add New Admin</a></li>
          <li><a class="nav-link scrollto " href="/employee/employees/listform.php">Vacation requests</a></li>


         
          <li class="dropdown"><a href="#"><span>Employees</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/employee/employees/add.php">Add</a></li>
              <li><a href="/employee/employees/list.php">List</a></li>
              
            </ul>
          </li>
          <?php }?>
          <?php if(isset($_SESSION['admin'])):?>
          <li>
         <form action="">
         <button  name="logout"  class="btn btn-danger" >logout</button>
         </form>
         </li>

         <?php else :?>

          <li>
         <form action="">
         <a class="nav-link scrollto " href="/employee/employees/loginn.php">Login</a>
         </form>
</li>
<?php endif ;?>


       
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->