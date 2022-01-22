<?php ob_start();?>
<?php include "../sharded/header.php"?>
<?php include "../sharded/nav.php"?>

<?php
$select="SELECT * FROM  employee";
$sql=mysqli_query($conn,$select);
#======================
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $del="DELETE FROM employee WHERE id=$id";
    mysqli_query($conn,$del);
    header("location:list.php");
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
  

        <div class="section-title mt-5" data-aos="fade-up">
          <h2>List Of Employee</h2>

        </div>

      

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
           
            <table class="table ">
  <thead class="thead-dark">

    <tr>
      <th scope="col">ID</th>
      <th scope="col">image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">job Title</th>
      <th scope="col">Mobile</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Hiring date</th>
      <th scope="col">Password</th>
      <th scope="col">Address</th>
      <th scope="col">working since</th>
      <th scope="col" colspan="2">Actions</th>

    </tr>
  </thead>
  <tbody>
      <?php foreach($sql as $data){?>
    <tr>
      <th scope="row"><?php echo $data['id']?></th>
      <td><img src="/employee/employees/update/<?php echo $data['img']?>"  width="50px"alt=""></td>
      <td><?php echo $data['name']?></td>
      <td><?php echo $data['email']?></td>
      <td><?php echo $data['job']?></td>
    <td><?php echo $data['mobile']?></td>
      <td><?php echo $data['birthdate']?></td>
      <td><?php echo $data['hiring']?></td>
      <td><?php echo $data['password']?></td>
      <td><?php echo $data['address']?></td>
      <td><?php echo $data['since']?></td>


      <td><a href="list.php?delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a></td>
      <td><a href="add.php?edit=<?php echo $data['id']?>" class="btn btn-info">Edit</a></td>

    </tr>
   <?php }?>
   
  </tbody>
</table>
<a href="/employee/employees/add.php" class="btn btn-success"> +Add New Admin</a>

          </div>

        </div>

      </div>
    </section>
    <?php include "../sharded/scripts.php"?>