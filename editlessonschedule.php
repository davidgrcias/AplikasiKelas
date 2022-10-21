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
    width: 200px;
    margin: auto;
  }

  #cont .profil > img{
    border: 6px solid #eaeaea;
    border-radius: 50%;
    width: 100%;
  }

  #cont .profil .round{
    background: #212523;
    width: 32px;
    height: 32px;
    line-height: 32px;
    text-align: center;
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
  $yujao = mysqli_query($connt, "SELECT * FROM lessonschedule WHERE id = '$zilong'");

  if(mysqli_num_rows($yujao) == 0){
    header("Location: lessonschedule.php");
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
								<h4>Edit Lesson Schedule</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="lessonschedule.php">Lesson Schedule</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Lesson Schedule</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
        <?php
        global $connt;
        $get_id = $_GET["id"];
        $userdone = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM lessonschedule WHERE id = $get_id"));

        $userdoneclass = $userdone["class"];

        $diday = "";
        if($userdone["day"] == 1){
          $diday = "Monday";
        }
        elseif($userdone["day"] == 2){
          $diday = "Tuesday";
        }
        elseif($userdone["day"] == 3){
          $diday = "Wednesday";
        }
        elseif($userdone["day"] == 4){
          $diday = "Thursday";
        }
        else{
          $diday = "Friday";
        }

        ?>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30" style = "padding-bottom: 5px!important;">
					<div class="clearfix" style = "margin-bottom: 20px!important;">
						<div class="pull-left">
              <?php $classdetail = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM class WHERE id = $userdoneclass")); ?>
							<h4 class="text-black"><?php echo $classdetail["class"]; ?>, <?php echo $userdone["name"]; ?>, <?php echo $diday; ?>, <?php echo $userdone["timestart"]; ?></h4>
						</div>
					</div>
					<form id = "myForm" method = "post" action = "" autocomplete = "off">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input required type="text" class="form-control" id = "name" name = "name" maxlength="39" spellcheck="false" value="<?php echo $userdone['name']; ?>">
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Day</label>
							<div class="col-sm-12 col-md-10">
								<select name = "day" id = "day" class="custom-select col-12" required>
									<option value = "" selected hidden>Choose...</option>
									<option value="1" <?= ($userdone["day"] == 1) ? "selected" : "" ?>>Monday</option>
                  <option value="2" <?= ($userdone["day"] == 2) ? "selected" : "" ?>>Tuesday</option>
                  <option value="3" <?= ($userdone["day"] == 3) ? "selected" : "" ?>>Wednesday</option>
                  <option value="4" <?= ($userdone["day"] == 4) ? "selected" : "" ?>>Thursday</option>
                  <option value="5" <?= ($userdone["day"] == 5) ? "selected" : "" ?>>Friday</option>
								</select>
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Time Start</label>
							<div class="col-sm-12 col-md-10">
								<input required type="time" value="<?php echo $userdone['timestart']; ?>" class="form-control" id = "timestart" name = "timestart" maxlength="39" spellcheck="false">
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Time End</label>
							<div class="col-sm-12 col-md-10">
								<input required type="time" value="<?php echo $userdone['timeend']; ?>" class="form-control" id = "timeend" name = "timeend" maxlength="39" spellcheck="false">
							</div>
						</div>
            <?php $pol = query("SELECT * FROM class"); ?>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Class</label>
							<div class="col-sm-12 col-md-10">
								<select name = "class" id = "class" class="custom-select col-12" required>
									<option value = "" selected hidden>Choose...</option>
                  <?php foreach($pol as $po) : ?>
                    <?php $idop = $po["id"]; ?>
                    <?php $iou = $userdone["class"]; ?>
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
                  var id = <?php echo $_GET["id"]; ?>;
                  var timestart = document.getElementById('timestart').value;
                  var timeend = document.getElementById('timeend').value;
                  var name = document.getElementById('name').value;
                  var kelas = document.getElementById('class').value;
                  var day = document.getElementById('day').value;
                  var kode = "editlessonschedule";
                    $.ajax({
                      url: 'function.php',
                      type: 'POST',
                      data: {id:id,timeend:timeend,timestart:timestart,day:day,kelas:kelas,name:name,kode:kode},
                      success: function(response){
                      if(response == 1){
                        alert('Lesson Schedule Has Been Updated!');
                        window.location.reload();
                      }else if(response == 11){
                         alert('Student Has Been Updated');
                       }else if(response == 99){
                         alert('Password Does Not Match');
                       }else if(response == 999){
                         alert('Email Is Already Taken');
                       }else if(response == 9999){
                           alert('NISN Is Already Taken');
                         }else{
                           alert(response);
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
