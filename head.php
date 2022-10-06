<?php
$thamuz = "a";
require 'function.php';
global $connt;
$utama = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM utama"));
$admin = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_admin"));
?>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Admin - <?php echo $utama["nama"]; ?></title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/<?= $utama["logo2"]; ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/img/<?= $utama["logo2"]; ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/img/<?= $utama["logo2"]; ?>">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
</head>
<script type="text/javascript">
	window.onload = function () {
startTime();
}
</script>
