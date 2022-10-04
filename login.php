<!DOCTYPE html>
<html>
<?php require 'head.php'; ?>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.php">
					<img src="assets/img/<?php echo $utama['logo2']; ?>" alt="" width = 55>
				</a>
			</div>
		</div>
	</div>
  <?php

  if(!empty($_SESSION['idd'])){
    header("Location: index.php");
  }
  else{
  }

  ?>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-5" style = "margin: auto!important;">
					<div class="login-box bg-white box-shadow border-radius-10" style = "margin: auto!important;">
						<div class="login-title">
							<h2 class="text-center text-primary">Aplikasi Kelas</h2>
						</div>
						<form id = "myForm" method = "post" action = "" autocomplete = "off">
							<div class="input-group custom">
								<input type="text" required class="form-control form-control-lg" id = "usernameemail" name = "usernameemail" placeholder="Username or Email" maxlength = "40" spellcheck = "false">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input required type="password" class="form-control form-control-lg" placeholder="********" id = "password" name = "password" maxlength="49" spellcheck="false">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button class="btn btn-primary btn-lg btn-block" type="submit" onclick = "jadi();" name = "submit" id = "submit">Login</button>
									</div>
								</div>
							</div>
						</form>
            <script type="text/javascript">
            var form = document.getElementById("myForm");
            function handleForm(event) { event.preventDefault(); }
            form.addEventListener('submit', handleForm);
            </script>
            <script type="text/javascript">
              function jadi(){
                  $(document).ready(function(){
                      var usernameemail = document.getElementById('usernameemail').value;
                      var password = document.getElementById('password').value;
                      var kode = "logintoadmin";
                        $.ajax({
                          url: 'function.php',
                          type: 'POST',
                          data: {usernameemail:usernameemail,password:password,kode:kode},
                          success: function(response){
                          if(response == 1){
                            window.location.reload();
                          }else if(response == 99){
              	             alert('Wrong Password');
                           }else if(response == 999){
               	             alert('Email or Username Is Not Registered');
                           }else if(response == 9999){
                	             alert('Username Is Already Taken');
                             }else{
                           }
                          }
                        });
                  });
              }
            </script>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>
