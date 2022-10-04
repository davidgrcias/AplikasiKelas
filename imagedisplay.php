<!DOCTYPE html>
<html>
<?php require 'head.php'; ?>
<style media="screen">
  #cont{
    margin-top: -20px;
  }
  #cont .profil{
    display: flex;
    justify-content: center;
    position: relative;
    width: 100px;
    margin: auto;
  }

  #cont .profil > img{
    border: 6px solid #eaeaea;
    border-radius: 50%;
    width: 100px;
  }

  #cont .profil .round{
    background: #80BDFF;
    width: 32px;
    height: 32px;
    line-height: 32px;
    text-align: center;
    border-radius: 50%;
    cursor: pointer;
    position: absolute;
    bottom: 0;
    right: 0;
  }

  #cont .profil input{
    opacity: 0;
    position: absolute;
    width: 32px;
    height: 37px;
    z-index: 2;
    cursor: pointer;
    box-sizing: content-box;
    border-radius: 50%;
    bottom: -2px;
    right: 0px;
  }

  input[type=file], /* FF, IE7+, chrome (except button) */
  input[type=file]::-webkit-file-upload-button { /* chromes and blink button */
      cursor: pointer;
  }

  #cont .profil .round img{
    margin-top: 4px;
  }

  @media (max-width: 768px){
    #nbsp{
      display: none;
    }
  }

  @media (max-width: 768px){
    #flexit{
      flex-direction: column!important;
      align-items: center!important;
      width: 100%;
    }

    #flexit button{
      display: block!important;
      width: 100%!important;
    }

    #flexit div{
      width: 100%;
    }

    #flexit .btn-primary{
      margin-top: -30px!important;
    }
  }
</style>
<body>
	<?php require 'header.php'; ?>

	<?php require 'left-side-bar.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Image Display Setting</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="../perpustakaan/">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Image Display</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
        <?php
        $utamafull = mysqli_query($connt, "SELECT * FROM utama");
        $utama = mysqli_fetch_assoc($utamafull);
        ?>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30" style = "padding-bottom: 5px!important;">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Image Display Setting</h4>
						</div>
					</div>
          <div class="row" style = "display: flex; flex-direction: column; align-items: center; text-align: center!important; padding-bottom: 40px;">
          </div>
          <div class="row" style = "display: flex; flex-direction: column; align-items: center; text-align: center!important; padding-bottom: 40px;">
            <div class="col-md-4" id = "cont">
                <h3 style = "letter-spacing: 1.0px;">Website Logo</h3>
                <div class="profil">
                  <form class="myFormmm" enctype="multipart/form-data" id = "myFormmm" action="" method="post" style = "display: flex!important; flex-direction: column; justify-content: center!important; align-items: center!important;">
                  <?php $gambarr = $utama["logo2"]; ?>
                  <input type="hidden" id = "logo2" name="logo2" class = "logo2" value="logo2">
                  <img class="mt-3" src="assets/img/<?php echo $gambarr; ?>">
                  <input type="file" class="upload" id = "file2" name="file" accept=".jpg, .jpeg, .png" capture="camera">
                  <div class = "round">
                    <img src="assets/img/camera.png">
                  </div>
                  </form>
                </div>
            </div>
          </div>
          <?php
          if(isset($_POST["logo2"])){
            uploadd();
          }
          function uploadd(){
              global $connt;
              $namaFile = $_FILES["file"]["name"];
              $ukuranFile = $_FILES["file"]["size"];
              $tmpName = $_FILES["file"]["tmp_name"];
              $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
              $ekstensiGambar = explode('.', $namaFile);
              $ekstensiGambar = strtolower(end($ekstensiGambar));
              if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
                echo
                "
                <script>
                  alert('Invalid Image Extension');
                  document.location.href = 'imagedisplay.php';
                </script>
                ";
                return false;
              }

              if ($ukuranFile > 1200000){
                echo
                "
                <script>
                  alert('The Image Size Is Too Large');
                  document.location.href = 'imagedisplay.php';
                </script>
                ";
                return false;
              }

              // generate nama gambar baru
              $namaFileBaru = uniqid();
              $namaFileBaru .= '.' . $ekstensiGambar;
              $query22 = "UPDATE utama SET logo2 = '$namaFileBaru' WHERE id = 1";

              mysqli_query($connt, $query22);

              move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
              echo
              "
              <script>
              document.location.href = 'imagedisplay.php';
              </script>
              ";

              return $namaFileBaru;
            }
          ?>
          <script type="text/javascript">
            document.getElementById("file2").onchange = function() {
                document.getElementById("myFormmm").submit();
            };
          </script>
				</div>



			</div>
			<?php require 'footer-wrap.php'; ?>
		</div>
	</div>
	<?php require 'js.php'; ?>
</body>
</html>
