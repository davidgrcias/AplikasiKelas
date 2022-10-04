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
  $yujao = mysqli_query($connt, "SELECT * FROM peminjaman WHERE id = $zilong");
  $z = mysqli_fetch_assoc($yujao);

  if(mysqli_num_rows($yujao) == 0){
    header("Location: lending.php");
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
								<h4>Edit Lending</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="lending.php">Lending</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Lending</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30" style = "padding-bottom: 5px!important;">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Edit Lending</h4>
						</div>
					</div>
          <div class="row" style = "display: flex; flex-direction: column; align-items: center; text-align: center!important; padding-bottom: 40px;">
          </div>
					<form id = "myForm" method = "post" action = "" autocomplete = "off">
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Lending ID</label>
							<div class="col-sm-12 col-md-10">
								<input required type="text" class="form-control" id = "nopinjam" name = "nopinjam" value = "<?php echo $z['nopinjam']; ?>" disabled spellcheck="false">
							</div>
						</div>
						<?php $xol = query("SELECT * FROM data_user"); ?>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">NISN and Name</label>
							<div class="col-sm-12 col-md-10">
								<select name = "nisn" id = "nisn" class="custom-select col-12" required>
									<option selected hidden>Choose...</option>
                  <?php foreach($xol as $xo) : ?>
                  <?php $doubti = $xo["nisn"]; ?>
                  <?php $terangkani = $z["nisnsiswa"]; ?>
									<option value="<?php echo $xo['nisn']; ?>" <?= ($terangkani == $doubti) ? "selected" : "" ?>><?php echo $xo["nama"]; ?> and <?php echo $xo['nisn']; ?></option>
                  <?php endforeach; ?>
								</select>
							</div>
						</div>
            <?php $pol = query("SELECT * FROM tb_buku"); ?>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Title and Author</label>
							<div class="col-sm-12 col-md-10">
								<select name = "idbuku" id = "idbuku" class="custom-select col-12" disabled>
									<option selected hidden>Choose...</option>
                  <?php foreach($pol as $po) : ?>
                  <?php $doubt = $po["id"]; ?>
                  <?php $terangkan = $z["judulbuku"]; ?>
									<option value="<?php echo $po['id']; ?>" <?= ($terangkan == $doubt) ? "selected" : "" ?>><?php echo $po["judul"]; ?> by <?php echo $po["pengarang"]; ?></option>
                  <?php endforeach; ?>
								</select>
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Borrow Date</label>
							<div class="col-sm-12 col-md-10">
								<input required type="date" class="form-control" id = "borrowdate" value = "<?php echo $z['tanggalpinjam']; ?>" name = "borrowdate" maxlength="29" spellcheck="false">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Return Date</label>
							<div class="col-sm-12 col-md-10">
								<input required type="date" class="form-control" id = "returndate" value = "<?php echo $z['tanggalkembali']; ?>" name = "returndate" maxlength="29" spellcheck="false">
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Total</label>
              <input type="hidden" name="totalold" id = "totalold" value="<?php echo $z['totalbuku']; ?>">
							<div class="col-sm-12 col-md-10">
								<input required type="number" class="form-control" id = "total" name = "total" maxlength="9" value = "<?php echo $z['totalbuku']; ?>" spellcheck="false">
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
        <script type="text/javascript">
          function jadi(){
              $(document).ready(function(){
                  var nopinjamutama = "<?php echo $_GET['id']; ?>";
                  var nisn = document.getElementById('nisn').value;
                  var idbuku = document.getElementById('idbuku').value;
                  var total = document.getElementById('total').value;
                  var borrowdate = document.getElementById('borrowdate').value;
                  var returndate = document.getElementById('returndate').value;
                  var totalold = document.getElementById('totalold').value;
                  var kode = "editlending";
                    $.ajax({
                      url: 'function.php',
                      type: 'POST',
                      data: {nisn:nisn,idbuku:idbuku,total:total,borrowdate:borrowdate,returndate:returndate,kode:kode,nopinjamutama:nopinjamutama, totalold:totalold},
                      success: function(response){
                      if(response == 1){
                        alert('Lending Changed Successfully!');
                        window.location.reload();
                      }else if(response == 99){
          	             alert('Password Does Not Match');
                       }else if(response == 999){
           	             alert('Book Title Is Already Taken');
                       }else if(response == 9999){
            	             alert('Username Is Already Taken');
                         }else{

                       }
                      }
                    });
              });
          }
        </script>
				<!-- Default Basic Forms End -->



			</div>
			<?php require 'footer-wrap.php'; ?>
		</div>
	</div>
	<?php require 'js.php'; ?>
</body>
</html>
