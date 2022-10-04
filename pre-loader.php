<?php
if(empty($thamuz)){
  header("Location: login.php");
}
else{

}
?>
  <div class="pre-loader">
    <div class="pre-loader-box">
      <div class="loader-logo" ><img style = "width: 150px;" src="assets/img/<?= $utama["logo2"]; ?>" alt=""></div>
      <div class='loader-progress' id="progress_div">
        <div class='bar' id='bar1'></div>
      </div>
      <div class='percent' id='percent1'>0%</div>
      <div class="loading-text">
        Loading...
      </div>
    </div>
  </div>
