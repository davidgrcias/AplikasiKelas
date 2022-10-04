<?php
if( !isset($_GET["id"]) ){
  require '403.php';
  exit;
}

?>

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
  <?php

  $zilong = $_GET["id"];
  $yujao = mysqli_query($connt, "SELECT * FROM data_user WHERE id = '$zilong'");

  if(mysqli_num_rows($yujao) == 0){
    header("Location: students.php");
  }?>
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
								<h4>Edit User Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="students.php">Students</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Student</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
        <?php
        global $connt;
        $get_id = $_GET["id"];
        $userdone = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_user WHERE id = $get_id"));
        ?>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30" style = "padding-bottom: 5px!important;">
					<div class="clearfix" style = "margin-bottom: 20px!important;">
						<div class="pull-left">
							<h4 class="text-blue"><?php echo $userdone["nama"]; ?><span style = "color: black!important;">'s Profile</span></h4>
						</div>
					</div>
					<form id = "myForm" method = "post" action = "" autocomplete = "off">
						<div class="form-group row">
              <input type="hidden" name="oldnisn" id = "oldnisn" value="<?php echo $userdone['nisn']; ?>">
              <input type="hidden" name="oldemail" id = "oldemail" value="<?php echo $userdone['email']; ?>">
							<label class="col-sm-12 col-md-2 col-form-label">NISN</label>
							<div class="col-sm-12 col-md-10">
                <input type="hidden" name="id" id = "id" value="<?php echo $userdone['id']; ?>">
								<input maxlength="49" required type="text" class="form-control" id="nisn" name = "nisn" value = "<?php echo $userdone['nisn']; ?>" spellcheck="false">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input required type="text" class="form-control" id = "name" name = "name" maxlength="39" value = "<?php echo $userdone['nama']; ?>" spellcheck="false">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input required type="email" class="form-control" id = "email" = "email" maxlength="39" value = "<?php echo $userdone['email']; ?>" spellcheck="false">
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Born Date</label>
							<div class="col-sm-12 col-md-10">
								<input value = "<?php echo $userdone['tanggallahir']; ?>" required type="date" class="form-control" id = "borndate" name = "borndate" maxlength="39" spellcheck="false">
							</div>
						</div>
            <?php $z = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_user WHERE id = $get_id")); ?>
            <?php $pol = query("SELECT * FROM class"); ?>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Class</label>
							<div class="col-sm-12 col-md-10">
								<select name = "class" id = "class" class="custom-select col-12" required>
									<option value = "" selected hidden>Choose...</option>
                  <?php foreach($pol as $po) : ?>
                  <?php $idop = $po["id"]; ?>
                  <?php $iou = $z["kelas"]; ?>
									<option value="<?php echo $po['id']; ?>" <?= ($iou == $idop) ? "selected" : "" ?>><?php echo $po['class']; ?></option>
                  <?php endforeach; ?>
								</select>
							</div>
						</div>
            <div class="form-group row">
              <div id="flexit" style = "margin-top: -40px!important; position: relative; display: flex; justify-content: flex-end; flex-direction: row; width: 100%; padding-left: 15px; padding-right: 15px;">
                <div class="mt-5 text-right"><button class="btn btn-primary" type="submit" onclick = "jadi();" name = "submit" id = "submit">Save</button></div>
              </div>
            </div>
					</form>
				</div>
        <script type="text/javascript">
        var form = document.getElementById("myForm");
        function handleForm(event) { event.preventDefault(); }
        form.addEventListener('submit', handleForm);
        </script>
				<!-- Default Basic Forms End -->
        <script type="text/javascript">
          function jadi(){
              $(document).ready(function(){
                  var id = document.getElementById('id').value;
                  var name = document.getElementById('name').value;
                  var nisn = document.getElementById('nisn').value;
                  var email = document.getElementById('email').value;
                  var borndate = document.getElementById('borndate').value;
                  var kelas = document.getElementById('class').value;
                  var oldemail = document.getElementById('oldemail').value;
                  var oldnisn = document.getElementById('oldnisn').value;
                  var kode = "editstudent";
                    $.ajax({
                      url: 'function.php',
                      type: 'POST',
                      data: {oldemail:oldemail,oldnisn:oldnisn,id:id,name:name,nisn:nisn,email:email,borndate:borndate,kelas:kelas,kode:kode},
                      success: function(response){
                      if(response == 1){
                        alert('Student Has Been Updated');
                        window.location.reload();
                      }else if(response == 11){
                         alert('Student Has Been Updated');
                         window.location.reload();
                       }else if(response == 99){
                         alert('Password Does Not Match');
                       }else if(response == 999){
                         alert('Email Is Already Taken');
                       }else if(response == 9999){
                           alert('NISN Is Already Taken');
                         }else{
                       }
                      }
                    });
              });
          }
        </script>



			</div>
			<?php require 'footer-wrap.php'; ?>
		</div>
	</div>
	<?php require 'js.php'; ?>
</body>
</html>
