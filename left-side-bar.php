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
          <a href="../perpustakaan" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon dw dw-chat3"></span><span class="mtext">Interaction</span>
          </a>
          <ul class="submenu">
            <li><a href="students.php">Students</a></li>
            <li><a href="class.php">Class</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="publisher.php">Publisher</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon dw dw-library"></span><span class="mtext">Website</span>
          </a>
          <ul class="submenu">
            <li><a href="textdisplay.php">Text Display</a></li>
            <li><a href="imagedisplay.php">Image Display</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle">
            <span class="micon dw dw-list3"></span><span class="mtext">Features</span>
          </a>
          <ul class="submenu">
            <li><a href="lending.php">Lending</a></li>
          </ul>
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
