<!DOCTYPE html>
<html>
<?php require 'head.php'; ?>
<style media="screen">
	body{
		overflow-x: hidden!important;
	}
	#DataTables_Table_0_wrapper{
		overflow-x:hidden!important;
	}
	#DataTables_Table_0_wrapper > .row > .col-sm-12{
		overflow-x: scroll!important;
		width: 100%!important;
	}
	#DataTables_Table_0_wrapper > .row > .col-md-6{
    overflow: hidden!important;
		margin-top: 10px!important;
  }
  #DataTables_Table_0_wrapper > .row > .col-md-5{
    overflow: hidden!important;
  }
  #DataTables_Table_0_wrapper > .row > .col-md-7{
    overflow: hidden!important;
		margin-top: 10px!important;
  }
	#namaberita{
    max-width: 120px!important;
    white-space: normal!important;
  }
  #commentss{
		max-width: 80px!important;
  white-space: -moz-pre-wrap !important;  /* Mozilla, since 1999 */
    white-space: -webkit-pre-wrap;          /* Chrome & Safari */
    white-space: -pre-wrap;                 /* Opera 4-6 */
    white-space: -o-pre-wrap;               /* Opera 7 */
    white-space: pre-wrap;                  /* CSS3 */
    word-wrap: break-word;                  /* Internet Explorer 5.5+ */
    word-break: break-all;
    white-space: normal!important;
	}
</style>
<body>
	<?php // require 'pre-loader.php'; ?>

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
								<h4>Data Table Lending</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="../perpustakaan/">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Lending</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
        <!-- Simple Datatable start -->
				<div class="card-box mb-30" id = "tableka">
					<div class="pd-20" style = "display: flex; align-items: center; justify-content: space-between; padding-right: 20px; box-sizing: border-box;">
						<h4 class="text-blue h4">Data Table Lending</h4>
						<a href="addlending.php" class = "btn btn-success">Add Lending</a>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>#</th>
									<th id = "commentss">Lending ID</th>
									<th id = "commentss">NISN</th>
                  <th id = "commentss">Name</th>
                  <th id = "commentss">Title</th>
                  <th>Borrow Date</th>
                  <th>Return Date</th>
                  <th id = "commentss">Fine</th>
                  <th>Total</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                <?php
    							$userfull = query("SELECT * FROM peminjaman ORDER BY id DESC");
									$i = 1;
    						?>
    						<?php foreach($userfull as $user) : ?>
								<tr id = "<?php echo $user['id']; ?>">
									<td id = "<?php echo $user['id']; ?>"><?php echo $i; ?></td>
									<td id = "commentss"><?php echo $user["nopinjam"]; ?></td>
									<td id = "commentss"><?php echo $user["nisnsiswa"]; ?></td>
                  <td id = "commentss">
                    <?php
                    $hilary = $user["nisnsiswa"];
                    $hilar = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_user WHERE nisn = '$hilary'"));
                    echo $hilar["nama"];
                    ?>
                  </td>
                  <td id = "commentss">
                    <?php
                    $trump = $user["judulbuku"];
                    $hilaro = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM tb_buku WHERE id = '$trump'"));
                    echo $hilaro["judul"];
                    ?>
                  </td>
                  <td>
                    <?php echo $user["tanggalpinjam"]; ?>
                  </td>
                  <td> <?php echo $user["tanggalkembali"]; ?> </td>
                  <td>
                    <?php $yurka = $user["tanggalkembali"]; ?>
                    <?php $today = date("Y-m-d"); ?>
                    <?php
                    $ryu = $user["id"];
                    $kedua = strtotime("$today");
                    $pertama = strtotime("$yurka");
                    $hasilnya = $kedua - $pertama;
                    $hasilcuy = $hasilnya / 86400;
                    $hasilbaka = $hasilcuy * $hilaro["denda"];
                    $hasilbakal = $hasilbaka * $user["totalbuku"];
                    if(str_contains("$hasilbakal", "-")){
                      $hasilgila = 0;
                    }
                    elseif(!str_contains("$hasilbakal", "-")){
                      $hasilgila = $hasilbakal;
                    }
                    $query = "UPDATE peminjaman SET denda = '$hasilgila' WHERE id = $ryu";
                    mysqli_query($connt, $query);
                    echo $hasilgila;
                    ?>
                  </td>
                  <td><?php echo $user["totalbuku"]; ?></td>
									<td id = "<?php echo $user['id']; ?>">
										<div class="dropdown" id = "<?php echo $user['id']; ?>">
											<a cla
                      ss="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
    										<a class="dropdown-item" href="editlending.php?id=<?php echo $user['id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
    										<div style = "cursor: pointer;" class="dropdown-item" onclick = "deleteaccountadmin(<?php echo $user['id']; ?>);"><i class="dw dw-return"></i> Returned</div>
											</div>
                      <script type="text/javascript">
          							function deleteaccountadmin(iduser){
          									$(document).ready(function(){
          											var deleteid = iduser;
          											var kode = "hapuslending";
          											<?php if($admin["notif"] == "y") : ?>
          											var confirmalert = confirm("Are You Sure?");
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
          														alert('Successfully Returned');
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
										</div>
									</td>
								</tr>
								<?php $i++; ?>
                <?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
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
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</body>
</html>
