<!DOCTYPE html>
<html>
<?php require 'head.php'; ?>
<style media="screen">
	body{
		overflow-x: hidden!important;
	}
	@media(max-width: 991px){
		div#tableka{
			overflow-x: scroll!important;
		}
	}
</style>
<body>
	<?php require 'header.php'; ?>

	<?php require 'left-side-bar.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="row" style = "display: flex; flex-wrap: wrap; justify-content: center;">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: #1e90ff; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #1e90ff; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM data_user")); ?></div>
								<div class="weight-600 font-14" style = "color: #1e90ff; width: 80px; text-align: center;"><a style = "color: #1e90ff;" href = "students.php">Students</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: #00FF00; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #00FF00; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM class")); ?></div>
								<div class="weight-600 font-14" style = "color: #00FF00; width: 80px; text-align: center;"><a style = "color: #00FF00;" href = "class.php">Class</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: #8A2BE2; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #8A2BE2; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM tb_buku")); ?></div>
								<div class="weight-600 font-14" style = "color: #8A2BE2; width: 80px; text-align: center;"><a style = "color: #8A2BE2;" href = "books.php">Books</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: #45A94B; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #45A94B; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM publisher")); ?></div>
								<div class="weight-600 font-14" style = "color: #45A94B; width: 80px; text-align: center;"><a style = "color: #45A94B;" href = "publisher.php">Publisher</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: #FF3647; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #FF3647; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM data_admin")); ?></div>
								<div class="weight-600 font-14" style = "color: #FF3647; width: 80px; text-align: center;"><a style = "color: #FF3647;" href = "admin.php">Admin</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: #FFD700; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #FFD700; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM peminjaman")); ?></div>
								<div class="weight-600 font-14" style = "color: #FFD700; width: 80px; text-align: center;"><a style = "color: #FFD700;" href = "lending.php">Lending</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-box mb-30" id = "tableka">
				<div class="flexut" style = "display: flex; align-items: center; justify-content: space-between; padding-right: 20px;">
					<h2 class="h4 pd-20">20 Recent Students</h2>
					<a href="addstudent.php" class = "btn btn-success">Add Student</a>
				</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th>#</th>
							<th>NISN</th>
							<th>Name</th>
							<th>Email</th>
							<th>Born Date</th>
							<th>Class</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$userfull = query("SELECT * FROM data_user ORDER BY id DESC LIMIT 20");
							$i = 1;
						?>
						<?php foreach($userfull as $user) : ?>
						<tr id = "<?php echo $user['id']; ?>">
							<td><?php echo $i; ?></td>
							<td><?php echo $user["nisn"]; ?></td>
							<td>
								<!-- <h5 class="font-16">Shirt</h5> -->
								<?php echo $user["nama"]; ?>
							</td>
							<td><?php echo $user["email"]; ?></td>
							<td><?php echo $user["tanggallahir"]; ?></td>
							<td>
							<?php
							$idkelas = $user["kelas"];
							$hayolok = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM class WHERE id = $idkelas"));
							echo $hayolok["class"];
							?>
							</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="editstudent.php?id=<?php echo $user['id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
										<div style = "cursor: pointer;" class="dropdown-item" onclick = "deleteaccountadmin(<?php echo $user['id']; ?>);"><i class="dw dw-delete-3"></i> Delete</div>
									</div>
								</div>
							</td>
						</tr>
						<?php $i++; ?>
						<?php endforeach; ?>

						<script type="text/javascript">
							function deleteaccountadmin(iduser){
									$(document).ready(function(){
											var deleteid = iduser;
											var kode = "hapusstudent";
											<?php if($admin["notif"] == "y") : ?>
											var confirmalert = confirm("Are You Sure You Want To Delete This Student?");
											<?php else : ?>
											var confirmalert = true;
											<?php endif; ?>
											if (confirmalert == true){
												$.ajax({
													url: 'function.php',
													type: 'POST',
													data: {deleteid:deleteid,kode:kode},
													success: function(response){
													if(response == 1){
														<?php if($admin["notif"] == "y") : ?>
														alert('Student Deleted Successfully');
														<?php endif; ?>
														document.getElementById(deleteid).style.display = "none";
													}else if(response == 99){
														 alert('You Have Reached The Limit For Reply To This Comment');
													 }else if(response == 999){
														 alert('Email Is Already Taken');
													 }else if(response == 9999){
															 alert('Username Is Already Taken');
														 }else{
													 }
													}
												});
											}
									});
							}
						</script>
					</tbody>
				</table>
			</div>
			<?php require 'footer-wrap.php'; ?>
		</div>
	</div>
	<!-- js -->
	<?php require 'js.php'; ?>
  <!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script>
</body>
</html>
