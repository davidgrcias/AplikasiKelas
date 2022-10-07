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
								<h4>Add Admin</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Admin</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30" style = "padding-bottom: 5px!important;">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add Admin</h4>
						</div>
					</div>
          <div class="row" style = "display: flex; flex-direction: column; align-items: center; text-align: center!important; padding-bottom: 40px;">
          </div>
					<form id = "myForm" method = "post" action = "" autocomplete = "off">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input required type="email" class="form-control" id = "email" name = "email" maxlength="39" spellcheck="false">
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Username</label>
							<div class="col-sm-12 col-md-10">
								<input required type="text" class="form-control" id = "username" name = "username" maxlength="17" spellcheck="false">
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input required type="password" class="form-control" id = "password" name = "password" maxlength="49" spellcheck="false">
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
                  var username = document.getElementById('username').value;
                  var email = document.getElementById('email').value;
                  var password = document.getElementById('password').value;
                  var kode = "addadmin";
                    $.ajax({
                      url: 'function.php',
                      type: 'POST',
                      data: {username:username,email:email,password:password,kode:kode},
                      success: function(response){
                      if(response == 1){
                        alert('Admin Added Successfully!');
                        window.location.reload();
                      }else if(response == 99){
          	             alert('Password Does Not Match');
                       }else if(response == 999){
           	             alert('Email Is Already Taken');
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
