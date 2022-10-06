<?php
if(empty($thamuz)){
  header("Location: login.php");
}
else{

}
?>
<div class="left-side-bar">
  <div class="brand-logo">
    <a href="" style = "display: flex; align-items: center!important;">
      <img src="assets/img/<?= $utama["logo2"]; ?>" width = 50 alt="" class="light-logo">
      <p style = "font-size: 14px; line-height: 15px; text-align: center!important; margin-top: 20px; margin-left: auto; margin-right: auto;"><?php echo $utama["nama"]; ?></p>
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
      <i class="ion-close-round"></i>
    </div>
  </div>
  <div class="menu-block customscroll">
    <div class="sidebar-menu">
      <ul id="accordion-menu">
        <li class="dropdown">
          <a href="students.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="index.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-home"></span><span class="mtext">Student</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="class.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-home"></span><span class="mtext">Class</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="textdisplay.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-home"></span><span class="mtext">Text Display</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="imagedisplay.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-home"></span><span class="mtext">Image Display</span>
          </a>
        </li>
        <li>
          <a href="admin.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-diagram"></span><span class="mtext">Admin</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
