<?php   
function message($cond,$mess){
    if($cond){
        echo "<div class='alert text-center alert-info ' style='width:50% ;text-align: center; margin: auto '>
       <h6 style='font-weight: 500'> $mess process is Done!</h6>
      </div>";
    }
    else{
      echo "<div class='alert text-center alert-danger ' style='width:50% ;text-align: center; margin: auto '>
      <h6 style='font-weight: 500'> $mess process false!</h6>
     </div>";
    }
}




?>