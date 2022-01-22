<?php ob_start();?>
<?php include "../sharded/header.php"?>
<?php include "../sharded/nav.php"?>

<?php
$select="SELECT vacation.id,vacation.vfrom,vacation.vto,vacation.reason,employee.id empid,employee.name FROM vacation JOIN employee ON vacation.empid= employee.id;
";
$sql=mysqli_query($conn,$select);
#======================
if(isset($_GET['reject'])){
  $id= $_GET['reject'];
    $del="UPDATE vacation SET statue='Refused' WHERE id=$id";
    mysqli_query($conn,$del);
    header("location:/employee/employees/listform.php");
    
}
#=================
if(isset($_GET['accept'])){
  $id= $_GET['accept'];
    $del="UPDATE vacation SET statue='accepted' WHERE id=$id";
    mysqli_query($conn,$del);
    $day=$_SESSION['days'];
    $dd=$_SESSION['empid'];
    $s="SELECT * FROM vacation WHERE id=$id";
    $l=mysqli_query($conn,$s);
    $f=mysqli_fetch_assoc($l);
    $dd=$f['empid'];
    $ups="UPDATE `employee` SET days=days-1 WHERE id=$dd";
    mysqli_query($conn,$ups);
    header("location:/employee/employees/listform.php");
}
?>
<?php
  if($_SESSION["admin"]){

  }else{
    header("location:/employee/employees/loginn.php");
  }
  ?>
<?php ob_end_flush();?>
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title mt-5" data-aos="fade-up">
          <h2>Vacation requests</h2>

        </div>

      

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
           
            <table class="table">
  <thead class="thead-dark">

    <tr>
      <th scope="col">ID</th>
      <th scope="col">Employee ID</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Vacation From</th>
      <th scope="col">Vacation To</th>
      <th scope="col">Reason</th>
      <th scope="col" colspan="2">accept/reject</th>

      
      
    

    </tr>
  </thead>
  <tbody>
      <?php foreach($sql as $data){?>
    <tr>
      <th scope="row"><?php echo $data['id']?></th>
      <td><?php echo $data['empid']?></td>
      <td><?php echo $data['name']?></td>
      <td><?php echo $data['vfrom']?></td>
    <td><?php echo $data['vto']?></td>
      <td><?php echo $data['reason']?></td>
     


      
      <td><a href="listform.php?reject=<?php echo $data['id']?>" class="btn btn-danger">reject</a></td>
      <td><a href="listform.php?accept=<?php echo $data['id']?>" class="btn btn-success">Accept</a></td>



      

    </tr>
   <?php }?>
   
  </tbody>
</table>


          </div>

        </div>

      </div>
    </section>
    <?php include "../sharded/scripts.php"?>