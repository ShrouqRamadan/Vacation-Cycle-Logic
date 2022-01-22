<?php ob_start();?>
<?php include "../sharded/header.php"?>
<?php include "../sharded/nave.php"?>
<?php if($_SESSION["user"]){
  }
  else{
    
    header("location:/employee/employees/login.php");  }?>
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
            <!-- <img class="profile_img" src="/employee/employees/update/" alt="student dp"> -->
            <img class="profile_img"  src="/employee/employees/update/<?php echo $_SESSION['img'] ?>" alt="">
            <h3><?php echo $_SESSION['name'] ?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Employee ID:</strong><?php echo $_SESSION['id'] ?></p>
            <p class="mb-0"><strong class="pr-1">working since:</strong> <?php echo $_SESSION['since']?>Years</p>

           
            <p class="mb-0"><strong class="pr-1">assigned vacation days:</strong><?php echo  $_SESSION['days']  ?></p>
            



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
                <td><?php echo $_SESSION['user']?></td>
              </tr>
              <tr>
                <th width="30%">job Title	</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['job']?></td>
              </tr>
              <tr>
                <th width="30%">Mobile</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['mobile']?></td>
              </tr>
              <tr>
                <th width="30%">Birthdate</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['birthdate']?></td>
              </tr>
              <tr>
                <th width="30%">Hiring Date</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['hiring']?></td>
              </tr>
              <tr>
                <th width="30%">Address</th>
                <td width="2%">:</td>
                <td><?php echo $_SESSION['address']?></td>
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
      
      <th scope="col">Official Holiday Date</th>
      <th scope="col">Holiday Name</th>
      
    </tr>
  </thead>
  <tbody>
      <?php foreach($sq as $data){?>
    <tr>
     
      <td><?php echo $data['date']?></td>
      <td><?php echo $data['name']?></td>
      
    </tr>
  
   <?php }?>
  </tbody>
</table>

<button class="btn btn-success"><a href="/employee/employees/form.php">Avacation request</a></button>
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
