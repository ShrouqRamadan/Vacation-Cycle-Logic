<?php ob_start();?>
<?php include "../sharded/header.php"?>
<?php include "../sharded/nav.php"?>
<?php if(isset($_SESSION['admin'])){
}else{
header("location:/employee/employees/loginn.php");
    }?>
    <?php
    $selects="SELECT * FROM holiday";
    $sq=mysqli_query($conn,$selects);
    ?>
<?php ob_end_flush();?>




<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
           
            <img class="profile_img"  src="/employee/employees/update/<?php echo $_SESSION['imgadmin']?>" alt="">
            <h3><?php echo  $_SESSION['nameadmin'] ?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Employee ID:</strong><?php echo $_SESSION['idadmin']?></p>
          

          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Email</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION["admin"]?></td>
              </tr>
              <tr>
                <th width="30%">job Title	</th>
                <td width="2%">:</td>
                <td>Admin</td>
              </tr>
             
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>official holidays dates In 2022</h3>
          </div>
          <div class="card-body pt-0">
          <table class="table">
  <thead class="">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Official Holiday Date</th>
      <th scope="col">Holiday Name</th>
      
    </tr>
  </thead>
  <tbody>
      <?php foreach($sq as $data){?>
    <tr>
      <th scope="row"><?php echo $data['id']?></th>
      <td><?php echo $data['date']?></td>
      <td><?php echo $data['name']?></td>
      
    </tr>
  
   <?php }?>
  </tbody>
</table>


          </div>
        </div>
      </div>
    </div>
    
  </div>
  
</div>
<!-- partial -->
           
    		</div>
		</div>
    </div>
</section>
     


<?php include "../sharded/scripts.php"?>
