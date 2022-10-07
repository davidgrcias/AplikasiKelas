<?php
$connt = mysqli_connect("localhost", "root", "", "aplikasikelas");
session_start();
date_default_timezone_set("Asia/Jakarta");

if(!empty($_POST["kode"])){
  if($_POST["kode"] == "editstudent"){
    editstudent();
  }
  elseif($_POST["kode"] == "comment"){
    comment();
  }
  elseif($_POST["kode"] == "hapusclass"){
    hapusclass();
  }
  elseif($_POST["kode"] == "reply"){
    reply();
  }
  elseif($_POST["kode"] == "hapusreply"){
    replydeleted();
  }
  elseif($_POST["kode"] == "deleteaccount"){
    accountdeletedd();
  }
  elseif($_POST["kode"] == "hapusstudent"){
    accountdeleteddfromadmin();
  }
  elseif($_POST["kode"] == "hapussubscriber"){
    subscriberdeleted();
  }
  elseif($_POST["kode"] == "ubahutama"){
    ubahutama();
  }
  elseif($_POST["kode"] == "addtestimonial"){
    addtestimonial();
  }
  elseif($_POST["kode"] == "hapustestimonial"){
    hapustestimonial();
  }
  elseif($_POST["kode"] == "edittestimonial"){
    edittestimonial();
  }
  elseif($_POST["kode"] == "hapusgallery"){
    hapusgallery();
  }
  elseif($_POST["kode"] == "addgallery"){
    addgallery();
  }
  elseif($_POST["kode"] == "editgallery"){
    editgallery();
  }
  elseif($_POST["kode"] == "addnewscategory"){
    addnewscategory();
  }
  elseif($_POST["kode"] == "hapusnewskategori"){
    hapusnewskategori();
  }
  elseif($_POST["kode"] == "ubahkategoriberita"){
    ubahkategoriberita();
  }
  elseif($_POST["kode"] == "addnews"){
    addnews();
  }
  elseif($_POST["kode"] == "hapusnews"){
    hapusnews();
  }
  elseif($_POST["kode"] == "ubahberita"){
    ubahberita();
  }
  elseif($_POST["kode"] == "addadmin"){
    addadmin();
  }
  elseif($_POST["kode"] == "editadmin"){
    editadmin();
  }
  elseif($_POST["kode"] == "hapusadmin"){
    hapusadmin();
  }
  elseif($_POST["kode"] == "logintoadmin"){
    logintoadmin();
  }
  elseif($_POST["kode"] == "hidenews"){
    hidenews();
  }
  elseif($_POST["kode"] == "unhidenews"){
    unhidenews();
  }
  elseif($_POST["kode"] == "addstudent"){
    addstudent();
  }
  elseif($_POST["kode"] == "addclass"){
    addclass();
  }
  elseif($_POST["kode"] == "editclass"){
    editclass();
  }
  elseif($_POST["kode"] == "hapuspublisher"){
    hapuspublisher();
  }
  elseif($_POST["kode"] == "addpublisher"){
    addpublisher();
  }
  elseif($_POST["kode"] == "editpublisher"){
    editpublisher();
  }
  elseif($_POST["kode"] == "addbook"){
    addbook();
  }
  elseif($_POST["kode"] == "hapusbook"){
    hapusbook();
  }
  elseif($_POST["kode"] == "editbook"){
    editbook();
  }
  elseif($_POST["kode"] == "addlending"){
    addlending();
  }
  elseif($_POST["kode"] == "hapuslending"){
    hapuslending();
  }
  elseif($_POST["kode"] == "editlending"){
    editlending();
  }
}

function editlending(){
  global $connt;
  $nisn = $_POST["nisn"];
  $idbuku = $_POST["idbuku"];
  $total = $_POST["total"];
  $borrowdate = $_POST["borrowdate"];
  $returndate = $_POST["returndate"];
  $nopinjam = $_POST["nopinjamutama"];
  $totalold = $_POST["totalold"];

  if ( empty($nisn) || empty($idbuku) || empty($borrowdate) || empty($returndate) || empty($total) ){
    echo 4;
    exit;
  }

  $colton = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM tb_buku WHERE id = $idbuku"));
  $coltonjumlah = $colton["jumlahbuku"];
  $coltonjadi = $coltonjumlah + $totalold;
  $query4 = "UPDATE tb_buku SET jumlahbuku = $coltonjadi WHERE id = $idbuku";
  mysqli_query($connt, $query4);

  $boltons = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM tb_buku WHERE id = $idbuku"));
  $katanyarahasia = $boltons["jumlahbuku"] - $total;
  $query3 = "UPDATE tb_buku SET jumlahbuku = $katanyarahasia WHERE id = $idbuku";
  mysqli_query($connt, $query3);

  $query = "UPDATE peminjaman SET nisnsiswa = '$nisn', judulbuku = $idbuku, tanggalpinjam = '$borrowdate', tanggalkembali = '$returndate', totalbuku = $total WHERE id = $nopinjam";
  mysqli_query($connt, $query);
  echo 1;
}

function hapuslending(){
  global $connt;
  $deleteid = $_POST["deleteid"];

  $colton = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM peminjaman WHERE id = $deleteid"));
  $coltonjumlah = $colton["totalbuku"];
  $coltonidbuku = $colton["judulbuku"];

  $xolton = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM tb_buku WHERE id = '$coltonidbuku'"));
  $xoltonjumlah = $xolton["jumlahbuku"];

  $yaterus = $xoltonjumlah + $coltonjumlah;

  $query4 = "UPDATE tb_buku SET jumlahbuku = '$yaterus' WHERE id = '$coltonidbuku'";
  mysqli_query($connt, $query4);

  $query = "DELETE FROM peminjaman WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function addlending(){
  global $connt;
  $nisn = $_POST["nisn"];
  $idbuku = $_POST["idbuku"];
  $total = $_POST["total"];
  $borrowdate = $_POST["borrowdate"];
  $returndate = $_POST["returndate"];
  $uniqid = $_POST["uniqid"];

  if(empty($nisn) || empty($idbuku) || empty($borrowdate) || empty($returndate) || empty($total)){
    echo 4;
    exit;
  }

  $colton = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM tb_buku WHERE id = $idbuku"));
  $coltonjumlah = $colton["jumlahbuku"];
  if($total > $coltonjumlah){
    echo 4;
    exit;
  }
  $coltonjadi = $coltonjumlah - $total;
  $query4 = "UPDATE tb_buku SET jumlahbuku = '$coltonjadi' WHERE id = '$idbuku'";
  mysqli_query($connt, $query4);
  $query = "INSERT INTO peminjaman VALUES('', '', '$nisn', '$idbuku', '$borrowdate', '$returndate', '0', '$total', '$uniqid')";
  mysqli_query($connt, $query);
  $coco = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM peminjaman WHERE uniqid = '$uniqid'"));
  $cocoid = $coco["id"];
  $jadinyaitu = "TP00$cocoid";
  $query2 = "UPDATE peminjaman SET nopinjam = '$jadinyaitu' WHERE uniqid = '$uniqid'";
  mysqli_query($connt, $query2);
  echo 1;
}

function editbook(){
  global $connt;
  $id = $_POST["id"];
  $publisherid = $_POST["publisherid"];
  $author = $_POST["author"];
  $title = $_POST["title"];
  $total = $_POST["total"];
  $fine = $_POST["fine"];

  if(empty($publisherid) || empty($author) || empty($title) || empty($total) || empty($fine)){
    echo 4;
    exit;
  }

  $query = "UPDATE tb_buku SET judul = '$title', pengarang = '$author', idpenerbit = '$publisherid', jumlahbuku = '$total', denda = '$fine' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hapusbook(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM tb_buku WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function addbook(){
  global $connt;
  $publisherid = $_POST["publisherid"];
  $author = $_POST["author"];
  $title = $_POST["title"];
  $total = $_POST["total"];
  $fine = $_POST["fine"];

  if(empty($publisherid) || empty($author) || empty($title) || empty($total) || empty($fine)){
    echo 4;
    exit;
  }

  $query = "INSERT INTO tb_buku VALUES('', '$title', '$author', '$publisherid', '$total', '$fine')";
  mysqli_query($connt, $query);
  echo 1;
}

function editpublisher(){
  global $connt;
  $id = $_POST["id"];
  $publishercode = $_POST["publishercode"];
  $publishername = $_POST["publishername"];
  $oldcode = $_POST["oldcode"];

  if(empty($publishercode) || empty($publishername)){
    echo 4;
    exit;
  }

  if($publishercode != $oldcode){
    $result = mysqli_query($connt, "SELECT * FROM publisher WHERE kodepenerbit = '$publishercode'");
    if (mysqli_num_rows($result) >= 1){
      echo 999;
      exit;
    }
  }

  $query = "UPDATE publisher SET kodepenerbit = '$publishercode', namapenerbit = '$publishername' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function addpublisher(){
  global $connt;
  $publishercode = $_POST["publishercode"];
  $publishername = $_POST["publishername"];

  if(empty($publishercode) || empty($publishername)){
    echo 4;
    exit;
  }
  $result = mysqli_query($connt, "SELECT * FROM publisher WHERE kodepenerbit = '$publishercode'");
  if (mysqli_num_rows($result) >= 1){
    echo 999;
    exit;
  }

  $query = "INSERT INTO publisher VALUES('', '$publishercode', '$publishername')";
  mysqli_query($connt, $query);
  echo 1;
}

function hapuspublisher(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM publisher WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function editclass(){
  global $connt;
  $id = $_POST["id"];
  $kelas = $_POST["kelas"];
  $oldclass = $_POST["oldclass"];
  if(empty($kelas)){
    echo 4;
    exit;
  }
  if($kelas != $oldclass){
    $result2 = mysqli_query($connt, "SELECT * FROM class WHERE class = '$kelas'");
    if (mysqli_num_rows($result2) >= 1){
      echo 999;
      exit;
    }
  }
  $query = "UPDATE class SET class = '$kelas' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function addclass(){
  global $connt;
  $kelas = $_POST["kelas"];
  if(empty($kelas)){
    echo 4;
    exit;
  }
  $result = mysqli_query($connt, "SELECT * FROM class WHERE class = '$kelas'");
  if (mysqli_num_rows($result) >= 1){
    echo 999;
    exit;
  }

  $query = "INSERT INTO class VALUES('', '$kelas')";
  mysqli_query($connt, $query);
  echo 1;
}

function addstudent(){
  global $connt;
  $email = strtolower(htmlspecialchars($_POST["email"]));
  $studentimage = $_POST["studentimage"];
  $nisn = $_POST["nisn"];
  $kelas = $_POST["kelas"];
  $borndate = $_POST["borndate"];
  $name = ucwords(strtolower( htmlspecialchars($_POST["name"]) ), " \.");
  if(empty($nisn)){
    echo 4;
    exit;
  }
  if(empty($kelas)){
    echo 4;
    exit;
  }
  if(empty($name)){
    echo 4;
    exit;
  }
  if(empty($borndate)){
    echo 4;
    exit;
  }
  if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    echo 4;
    exit;
  }

  $result = mysqli_query($connt, "SELECT * FROM data_user WHERE email = '$email'");
  if (mysqli_num_rows($result) >= 1){
    echo 999;
    exit;
  }
  $result2 = mysqli_query($connt, "SELECT * FROM data_user WHERE nisn = '$nisn'");
  if (mysqli_num_rows($result2) >= 1){
    echo 9999;
    exit;
  }

  $query = "INSERT INTO data_user VALUES('', '$name', '$email', '$nisn', '$kelas', '$borndate', '$studentimage')";
  mysqli_query($connt, $query);
  echo 1;
}

function unhidenews(){
  global $connt;
  $id = $_POST["idnya"];
  $author = "<span style = \"color: #5cb85c;\"> Public </span>";

  $query = "UPDATE news SET stat = 'p', status = '$author' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hidenews(){
  global $connt;
  $id = $_POST["idnya"];
  $author = "<span style = \"color: #d9534f;\"> Private </span>";

  $query = "UPDATE news SET stat = 'x', status = '$author' WHERE id = $id";

  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function logintoadmin(){
  global $connt;
  $usernameemail = strtolower(htmlspecialchars($_POST["usernameemail"]));
  $password = strtolower(htmlspecialchars($_POST["password"]));

  $result = mysqli_query($connt, "SELECT * FROM data_admin WHERE username = '$usernameemail' OR email = '$usernameemail'");
  if (mysqli_num_rows($result) >= 1){

    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])){
        $_SESSION["loginn"] = true;
        $_SESSION["idd"] = $row["id"];
        echo 1;
    }
    else{
      echo 99;
      exit;
    }
  }
  else{
    echo 999;
    exit;
  }
}

function hapusadmin(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM data_admin WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function editadmin(){
  global $connt;
  $id = $_POST["id"];
  $email = strtolower($_POST["email"]);
  $username = strtolower($_POST["username"]);
  $password = $_POST["password"];
  $mainresult = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_admin WHERE id = $id"));

  if($mainresult["email"] != $email || $mainresult["username"] != $username){
    if(empty($username)){
      echo 4;
      exit;
    }
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
      echo 4;
      exit;
    }

    $result = mysqli_query($connt, "SELECT * FROM data_admin WHERE email = '$email'");
    if($mainresult["email"] != $email){
      if (mysqli_num_rows($result) >= 1){
        echo 999;
        exit;
      }
    }

    $result2 = mysqli_query($connt, "SELECT * FROM data_admin WHERE username = '$username'");
    if($mainresult["username"] != $username){
      if (mysqli_num_rows($result2) >= 1){
        echo 9999;
        exit;
      }
    }

    $query = "UPDATE data_admin SET email = '$email', username = '$username' WHERE id = $id";
    mysqli_query($connt, $query);
    echo 1;
  }


  if (isset($password)){
    $passwordbaru = password_hash($password, PASSWORD_DEFAULT);
    $query2 = "UPDATE data_admin SET password = '$passwordbaru' WHERE id = $id";
    mysqli_query($connt, $query2);
    echo 1;
  }
  else{

  }
}

function addadmin(){
  global $connt;
  $date = date('d') . ' ' . date('F') . ' ' . date('Y');
  $email = strtolower(htmlspecialchars($_POST["email"]));
  $username = strtolower(htmlspecialchars($_POST["username"]));
  $password = htmlspecialchars($_POST["password"]);
  if(empty($password)){
    echo 4;
    exit;
  }
  if(empty($username)){
    echo 4;
    exit;
  }
  if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    echo 4;
    exit;
  }

  $result = mysqli_query($connt, "SELECT email FROM data_admin WHERE email = '$email'");
  if (mysqli_num_rows($result) >= 1){
    echo 999;
    exit;
  }
  $result2 = mysqli_query($connt, "SELECT username FROM data_admin WHERE username = '$username'");
  if (mysqli_num_rows($result2) >= 1){
    echo 9999;
    exit;
  }

  $passwordik = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO data_admin VALUES('', 'y', 'noprofil.jpg', '$email', '$username', '$passwordik', '$date')";
  mysqli_query($connt, $query);
  echo 1;
}

function ubahberita(){
  global $connt;
  $id = $_POST["id"];
  $titleold = $_POST["titleold"];
  $title = $_POST["title"];
  $author = $_POST["author"];
  $gallery = $_POST["gallery"];
  $category = $_POST["category"];
  $isiberita = $_POST["isiberita"];

  if( empty($title) || empty($author) || empty($category) || empty($isiberita) ){
    echo 4;
    exit;
  }

  if($titleold != $title){
    $juga = mysqli_query($connt, "SELECT * FROM news WHERE namaberita = '$title'");
    if(mysqli_num_rows($juga) >= 1){
      echo 4;
      exit;
    }

    $tukabatunama = str_replace(' ', '-', strtolower($titleold));
    unlink("news/$tukabatunama/index.php");
    rmdir("news/$tukabatunama");


    $newsrevision = str_replace(' ', '-', strtolower($title));
    @mkdir("../jurnal/news/$newsrevision");
    $myfile = fopen("../jurnal/news/$newsrevision/index.php", "w") or die("Unable to open file!");

    $txt =
    "
    <?php
    \$privasi = $id;
    \$juju = 'ini';
    require '../../pov.php';
    global \$connt;
    \$newss = mysqli_query(\$connt, 'SELECT * FROM news WHERE id = $id');
    \$news = mysqli_fetch_assoc(\$newss);
    \$sample_rate = \$news['dilihat'] + 1;
    \$queryy = \"UPDATE news SET dilihat = \$sample_rate WHERE id = $id\";
    mysqli_query(\$connt, \$queryy);
    ?>
    ";

    fwrite($myfile, $txt);
    fclose($myfile);
  }

  $query = "UPDATE news SET namaberita = '$title', namapembuat = '$author', isiberita = '$isiberita', kategori = '$category' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hapusnews(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $tukabatu = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM news WHERE id = $deleteid"));
  $tukabatuka = $tukabatu["namaberita"];
  $tukabatunama = str_replace(' ', '-', strtolower($tukabatuka));
  unlink("news/$tukabatunama/index.php");
  rmdir("news/$tukabatunama");
  $query = "DELETE FROM news WHERE id = $deleteid";
  $query2 = "DELETE FROM komentar WHERE idnews = $deleteid";
  $query3 = "DELETE FROM reply WHERE idnews = $deleteid";
  mysqli_query($connt, $query);
  mysqli_query($connt, $query2);
  mysqli_query($connt, $query3);
  echo 1;
}

function addnews(){
  global $connt;
  $title = $_POST["title"];
  $author = $_POST["author"];
  $gallery = $_POST["gallery"];
  $category = $_POST["category"];
  $isiberita = $_POST["isiberita"];
  $date = date('d') . ' ' . date('F') . ' ' . date('Y');

  if( empty($title) || empty($author) || empty($gallery) || empty($category) || empty($isiberita) ){
    echo 4;
    exit;
  }

  $juga = mysqli_query($connt, "SELECT * FROM news WHERE namaberita = '$title'");
  if(mysqli_num_rows($juga) >= 1){
    echo 4;
    exit;
  }

  $query = "INSERT INTO news VALUES('', '$title', '$author', '$date', '$gallery', '$isiberita', '$category', 0, '<span style = \"color: #5cb85c;\"> Public </span>', 'p')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);

  $selecate = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM news WHERE namaberita = '$title'"));
  $selecateid = $selecate["id"];

  $newsrevision = str_replace(' ', '-', strtolower($title));
  @mkdir("../jurnal/news/$newsrevision");
  $myfile = fopen("../jurnal/news/$newsrevision/index.php", "w") or die("Unable to open file!");

  $txt =
  "
  <?php
  \$privasi = $selecateid;
  \$juju = 'ini';
  require '../../pov.php';
  global \$connt;
  \$newss = mysqli_query(\$connt, 'SELECT * FROM news WHERE id = $selecateid');
  \$news = mysqli_fetch_assoc(\$newss);
  \$sample_rate = \$news['dilihat'] + 1;
  \$queryy = \"UPDATE news SET dilihat = \$sample_rate WHERE id = $selecateid\";
  mysqli_query(\$connt, \$queryy);
  ?>
  ";

  fwrite($myfile, $txt);
  fclose($myfile);
}

function ubahkategoriberita(){
  global $connt;
  $id = $_POST["id"];
  $kategoriberitaold = $_POST["kategoriberitaold"];
  $kategoriberita = $_POST["kategoriberita"];

  if(empty($kategoriberita)){
    echo 4;
    exit;
  }
  if($kategoriberitaold == $kategoriberita){
    echo 4;
    exit;
  }
  $juga = mysqli_query($connt, "SELECT * FROM kategori WHERE namakategori = '$kategoriberita'");
  if(mysqli_num_rows($juga) >= 1){
    echo 4;
    exit;
  }

  $tukabatunama = str_replace(' ', '-', strtolower($kategoriberitaold));
  unlink("news/category/$tukabatunama/index.php");
  rmdir("news/category/$tukabatunama");


  $newscategoryrevision = str_replace(' ', '-', strtolower($kategoriberita));
  @mkdir("../jurnal/news/category/$newscategoryrevision");
  $myfile = fopen("../jurnal/news/category/$newscategoryrevision/index.php", "w") or die("Unable to open file!");

  $txt =
  "

  <?php
  \$privasi = $id;
  \$jija = 'itu';
  require '../../../piv.php';
  global \$connt;
  ?>

  ";

  fwrite($myfile, $txt);
  fclose($myfile);

  $query = "UPDATE kategori SET namakategori = '$kategoriberita' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hapusnewskategori(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $tukabatu = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM kategori WHERE id = $deleteid"));
  $tukabatuka = $tukabatu["namakategori"];
  $tukabatunama = str_replace(' ', '-', strtolower($tukabatuka));
  unlink("news/category/$tukabatunama/index.php");
  rmdir("news/category/$tukabatunama");
  $query = "DELETE FROM kategori WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function addnewscategory(){
  global $connt;
  $newscategory = $_POST["newscategory"];

  if( empty($newscategory) ){
    echo 4;
    exit;
  }

  $juga = mysqli_query($connt, "SELECT * FROM kategori WHERE namakategori = '$newscategory'");
  if(mysqli_num_rows($juga) >= 1){
    echo 4;
    exit;
  }

  $query = "INSERT INTO kategori VALUES('', '$newscategory')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);

  $selecate = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM kategori WHERE namakategori = '$newscategory'"));
  $selecateid = $selecate["id"];

  $newscategoryrevision = str_replace(' ', '-', strtolower($newscategory));
  @mkdir("../jurnal/news/category/$newscategoryrevision");
  $myfile = fopen("../jurnal/news/category/$newscategoryrevision/index.php", "w") or die("Unable to open file!");

  $txt =
  "

  <?php
  \$privasi = $selecateid;
  \$jija = 'itu';
  require '../../../piv.php';
  global \$connt;
  ?>

  ";

  fwrite($myfile, $txt);
  fclose($myfile);
}

function editgallery(){
  global $connt;
  $id = $_POST["id"];
  $name = $_POST["name"];

  if(empty($name)){
    echo 4;
    exit;
  }

  $query = "UPDATE gallery SET judul = '$name' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function addgallery(){
  global $connt;
  $name = $_POST["name"];
  $gallery = $_POST["gallery"];
  $tanggal = date('d') . ' ' . date('F') . ' ' . date('Y');

  if( empty($name) ){
    echo 4;
    exit;
  }

  $query = "INSERT INTO gallery VALUES('', '$name', '$tanggal', '$gallery')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hapusgallery(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM gallery WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function edittestimonial(){
  global $connt;
  $id = $_POST["id"];
  $name = $_POST["name"];
  $position = $_POST["position"];
  $testimony = $_POST["testimony"];

  if(empty($name) || empty($position) || empty($testimony)){
    echo 4;
    exit;
  }

  $query = "UPDATE testimonial SET nama = '$name', jabatan = '$position', isi = '$testimony' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hapustestimonial(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM testimonial WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function addtestimonial(){
  global $connt;
  $name = $_POST["name"];
  $position = $_POST["position"];
  $testimony = $_POST["testimony"];

  if(empty($name) || empty($position) || empty($testimony)){
    echo 4;
    exit;
  }

  $query = "INSERT INTO testimonial VALUES('', 'noprofil.jpg', '$name', '$position', '$testimony')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function ubahutama(){
  global $connt;
  $title = $_POST["title"];
  $copyright = $_POST["copyright"];

  if(empty($title)){
    echo 4;
    exit;
  }

  if(empty($copyright)){
    echo 4;
    exit;
  }

  $query = "UPDATE utama SET nama = '$title', copyright = '$copyright' WHERE id = 1";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function subscriberdeleted(){
  global $connt;
  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM subscriber WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function accountdeleteddfromadmin(){
  global $connt;
  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM data_user WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function accountdeletedd(){
  global $connt;
  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM data_user WHERE id = $deleteid";
  $query2 = "DELETE FROM komentar WHERE iduser = $deleteid";
  mysqli_query($connt, $query);
  mysqli_query($connt, $query2);
  echo 1;
}

function replydeleted(){
  global $connt;
  $deleteid = $_POST["deleteid"];
  $barulagi = str_replace('s', '', $deleteid);
  $query = "DELETE FROM reply WHERE id = '$barulagi'";
  mysqli_query($connt,$query);
  echo 1;
}

function reply(){
  global $connt;
  $idnews = $_POST["idnews"];
  $iduser = $_POST["iduser"];
  $idkomentar  = $_POST["idkomentar"];
  $reply = htmlspecialchars($_POST["reply"]);
  $tanggal = $_POST["tanggal"];
  if(empty($iduser)){
    echo 4;
    exit;
  }
  if(empty($idkomentar)){
    echo 4;
    exit;
  }
  if(empty($reply)){
    echo 4;
    exit;
  }
  if(empty($idnews)){
    echo 4;
    exit;
  }
  $result2 = mysqli_query($connt, "SELECT * FROM reply WHERE isireply = '$reply' AND iduser = $iduser AND idkomentar = $idkomentar");
  if (mysqli_num_rows($result2) >= 1){
    echo 4;
    exit;
  }
  $result3 = mysqli_query($connt, "SELECT * FROM reply WHERE iduser = $iduser AND idkomentar = $idkomentar");
  if (mysqli_num_rows($result3) >= 3){
    echo 99;
    exit;
  }
  $query = "INSERT INTO reply VALUES('', '$idkomentar', '$iduser', '$reply', '$tanggal', '$idnews')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hapusclass(){
  global $connt;
  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM class WHERE id = $deleteid";
  $query2 = "DELETE FROM data_user WHERE kelas = $deleteid";
  mysqli_query($connt,$query);
  mysqli_query($connt,$query2);
  echo 1;
}

function comment(){
  global $connt;
  $iduser = $_POST["iduser"];
  $idnews  = $_POST["idnews"];
  $comment = htmlspecialchars($_POST["comment"]);
  $tanggal = $_POST["tanggal"];
  if(empty($iduser)){
    echo 4;
    exit;
  }
  if(empty($idnews)){
    echo 4;
    exit;
  }
  if(empty($comment)){
    echo 4;
    exit;
  }
  $result2 = mysqli_query($connt, "SELECT * FROM komentar WHERE isikomentar = '$comment' AND iduser = $iduser AND idnews = $idnews");
  if (mysqli_num_rows($result2) >= 1){
    echo 4;
    exit;
  }
  $result3 = mysqli_query($connt, "SELECT * FROM komentar WHERE iduser = $iduser AND idnews = $idnews");
  if (mysqli_num_rows($result3) >= 3){
    echo 99;
    exit;
  }
  $query = "INSERT INTO komentar VALUES('', '$idnews', '$iduser', '$comment', '$tanggal')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function editstudent(){
  global $connt;
  $id = $_POST["id"];
  $name  = ucwords(strtolower( htmlspecialchars($_POST["name"]) ), " \.");
  $email = strtolower(htmlspecialchars($_POST["email"]));
  $nisn = $_POST["nisn"];
  $borndate = $_POST["borndate"];
  $kelas = $_POST["kelas"];
  $oldnisn = $_POST["oldnisn"];
  $oldemail = $_POST["oldemail"];
  if(empty($name)){
    echo 4;
    exit;
  }
  if(empty($nisn)){
    echo 4;
    exit;
  }
  if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    echo 4;
    exit;
  }
  if(empty($borndate)){
    echo 4;
    exit;
  }
  if(empty($kelas)){
    echo 4;
    exit;
  }
  if($email != $oldemail){
    $result = mysqli_query($connt, "SELECT * FROM data_user WHERE email = '$email'");
    if (mysqli_num_rows($result) >= 1){
      echo 999;
      exit;
    }
  }
  if($nisn != $oldnisn){
    $result2 = mysqli_query($connt, "SELECT * FROM data_user WHERE nisn = '$nisn'");
    if (mysqli_num_rows($result2) >= 1){
      echo 9999;
      exit;
    }
  }
  $query = "UPDATE data_user SET nama = '$name', email = '$email', nisn = '$nisn', kelas = $kelas, tanggallahir = '$borndate' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function query($query){
  global $connt;
  $result = mysqli_query($connt, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }

  return $rows;
}
?>
