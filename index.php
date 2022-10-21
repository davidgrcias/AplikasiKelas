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
	<?php // require 'pre-loader.php'; ?>
	<?php require 'header.php'; ?>
	<?php $page = "index"; ?>
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
								<div class="weight-600 font-14" style = "color: #1e90ff; width: 80px; text-align: center;"><a style = "color: #1e90ff;" href = "student.php">Student</a></div>
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
			</div>
			<style media="screen">

			</style>
			<div class="row" style = "background: white; margin-bottom: 30px;">
				<div class="col-md-12">
					<p style = "margin-top: 10px; margin-bottom: 5px; padding-bottom: 0px;" align = center>Number of Students in Each Class</p>
					<canvas id="myChart" style="width:100%;"></canvas>
				</div>
				<div class="col-md-12">
					<p style = "margin-top: 10px; margin-bottom: 5px; padding-bottom: 0px;" align = center>Age of Students in Each Class</p>
					<canvas id="myChart4" style="width:100%;"></canvas>
				</div>
				<div class="col-md-12">
					<p style = "margin-top: 10px; margin-bottom: 5px; padding-bottom: 0px;" align = center>Religion of Students in Each Class</p>
					<canvas id="myChart2" style="width:100%;"></canvas>
				</div>
				<div class="col-md-6">
					<p style = "margin-top: 10px; margin-bottom: 5px; padding-bottom: 0px;" align = center>Religion of Students</p>
					<canvas id="myChart3" style="width:100%;"></canvas>
				</div>
				<div class="col-md-6">
					<p style = "margin-top: 10px; margin-bottom: 5px; padding-bottom: 0px;" align = center>Age of Students</p>
					<canvas id="myChart5" style="width:100%;"></canvas>
				</div>
			</div>
			<?php require 'footer-wrap.php'; ?>
		</div>
	</div>
	<!-- js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script>
		<?php
		$classes = mysqli_query($connt, "SELECT * FROM class");
    foreach($classes as $class){
			$eachclass[] = $class["class"];
			$classid = $class["id"];
			$countclasses[] = count(query("SELECT * FROM data_user WHERE kelas = $classid"));

			$countregbuddha[] = count(query("SELECT * FROM data_user WHERE kelas = $classid && religion = 'Buddha'"));
			$countregislam[] = count(query("SELECT * FROM data_user WHERE kelas = $classid && religion = 'Islam'"));
			$countregchristian[] = count(query("SELECT * FROM data_user WHERE kelas = $classid && religion = 'Christian'"));
			$countreghindu[] = count(query("SELECT * FROM data_user WHERE kelas = $classid && religion = 'Hindu'"));
			$countregconfucianism[] = count(query("SELECT * FROM data_user WHERE kelas = $classid && religion = 'Confucianism'"));
		}

		$noclasscountregbuddha = count(query("SELECT * FROM data_user WHERE religion = 'Buddha'"));
		$noclasscountregchristian = count(query("SELECT * FROM data_user WHERE religion = 'Christian'"));
		$noclasscountregislam = count(query("SELECT * FROM data_user WHERE religion = 'Islam'"));
		$noclasscountreghindu = count(query("SELECT * FROM data_user WHERE religion = 'Hindu'"));
		$noclasscountregconfucianism = count(query("SELECT * FROM data_user WHERE religion = 'Confucianism'"));

		$noclasscount = "$noclasscountregbuddha" . "," . "$noclasscountregislam" . "," . "$noclasscountreghindu" . "," . "$noclasscountregchristian" . "," . "$noclasscountregconfucianism";

		$noclasscount_arr = array_map('intval', explode(',', $noclasscount));
		?>

		<?php
		$listofstudents = mysqli_query($connt, "SELECT * FROM data_user");
		$listofstudentscount = count(query("SELECT * FROM data_user"));

		foreach($listofstudents as $listofstudent){
			$ageestudent = $listofstudent['age'];

			if(!empty($listofstudentageraw)){
				if(in_array($ageestudent, $listofstudentageraw)) {
				  $ageestudent = "";
				}
			}

			$listofstudentageraw[] = $ageestudent;
		}

		?>
		// $array = array_unique($array); supaya tidak ada yang duplikat, sebenarnya bisa pake ini

		<?php $hei = array_map('intval', array_filter($listofstudentageraw)); ?>// convert string array to int array
		var listofstudentage = <?php echo json_encode(sort($hei));  ?>;

		var noclasscount_arr = <?php echo json_encode($noclasscount_arr); ?>;
		var countregbuddha = <?php echo json_encode($countregbuddha); ?>;
		var countregislam = <?php echo json_encode($countregislam); ?>;
		var countregchristian = <?php echo json_encode($countregchristian); ?>;
		var countreghindu = <?php echo json_encode($countreghindu); ?>;
		var countregconfucianism = <?php echo json_encode($countregconfucianism); ?>;

		var countclasses = <?php echo json_encode($countclasses); ?>;
		var eachclass = <?php echo json_encode($eachclass); ?>;
		var colorArray = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
		  '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
		  '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
		  '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
		  '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
		  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
		  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
		  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
		  '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];
		var xValues = eachclass;
		var yValues = countclasses;
		var barColors = colorArray;
		<?php
		$colorArray = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
		  '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
		  '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
		  '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
		  '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
		  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
		  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
		  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
		  '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];
		$colorArray2 = ['aqua', 'chartreuse', 'indianred', 'black', 'purple', 'blue', 'pink', 'orange', 'grey', 'red', 'green', 'yellow', 'teal'];
		?>
		yValuesMax = Math.max(...countclasses);

		new Chart("myChart", {
		  type: "bar",
		  data: {
		    labels: xValues,
				datasets: [{
		      backgroundColor: barColors,
		      data: yValues
		    }]
			},
		  options: {
		    legend: {display: false},
		    title: {
		      display: false,
					padding: 0
		    },
      scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
            max: yValuesMax,
          }
        }]
       }
		  }
		});
	</script>

	<script>
	var xValues2 = eachclass;

	new Chart("myChart2", {
	  type: "line",
	  data: {
	    labels: xValues2,
	    datasets: [{
	      data: countregbuddha,
	      borderColor: "yellow",
	      fill: false,
				pointStyle: 'circle',
				pointRadius: 10,
      	pointHoverRadius: 15,
				label: 'Buddha'
	    }, {
	      data: countregislam,
	      borderColor: "green",
	      fill: false,
				pointStyle: 'circle',
				pointRadius: 10,
      	pointHoverRadius: 15,
				label: 'Islam'
	    }, {
	      data: countregchristian,
	      borderColor: "black",
	      fill: false,
				pointStyle: 'circle',
				pointRadius: 10,
      	pointHoverRadius: 15,
				label: 'Christian'
	    },
			{
	      data: countreghindu,
	      borderColor: "purple",
	      fill: false,
				pointStyle: 'circle',
				pointRadius: 10,
      	pointHoverRadius: 15,
				label: 'Hindu'
	    },
			{
	      data: countregconfucianism,
	      borderColor: "red",
	      fill: false,
				pointStyle: 'circle',
				pointRadius: 10,
      	pointHoverRadius: 15,
				label: 'Confucianism'
	    }]
	  },
	  options: {
	    legend: {display: true}
	  }
	});

	var xValues3 = ["Buddha", "Islam", "Hindu", "Christian", "Confucianism"];
	var barColors = [
	  "yellow",
	  "green",
	  "purple",
	  "black",
	  "red"
	];

	new Chart("myChart3", {
	  type: "pie",
	  data: {
	    labels: xValues3,
	    datasets: [{
	      backgroundColor: barColors,
	      data: noclasscount_arr
	    }]
	  },
	  options: {
	    title: {
	      display: false,
	      text: "World Wide Wine Production 2018"
	    }
	  }
	});


	new Chart("myChart4", {
	  type: "line",
	  data: {
	    labels: xValues,
	    datasets: [
				<?php $classes2 = mysqli_query($connt, "SELECT * FROM class"); ?>
				<?php $o = 0; foreach($hei as $hi) : ?>
				<?php $agefromeachclass = [];  ?>
				<?php $ageschool[] = count(query("SELECT * FROM data_user WHERE age = $hi")); ?>
				{
					<?php
			    foreach($classes2 as $class2){
						$class2id = $class2["id"];
						$agefromeachclass[] = count(query("SELECT * FROM data_user WHERE kelas = $class2id && age = $hi"));
					}
					?>
					<?php $fixminus = $o; ?>
	      data: <?php echo json_encode($agefromeachclass); ?>,
	      borderColor: "<?php echo $colorArray2[$fixminus]; ?>",
	      fill: false,
				pointStyle: 'circle',
				pointRadius: 10,
      	pointHoverRadius: 15,
				label: '<?php echo $hi; ?>'
	    }, <?php $o++; ?><?php endforeach; ?>
		]
	  },
	  options: {
	    legend: {display: true}
	  }
	});

	new Chart("myChart5", {
	  type: "pie",
	  data: {
	    labels: <?php echo json_encode($hei); ?>,
	    datasets: [{
	      backgroundColor: <?php echo json_encode($colorArray2); ?>,
	      data: <?php echo json_encode($ageschool); ?>
	    }]
	  },
	  options: {
	    title: {
	      display: false,
	      text: "World Wide Wine Production 2018"
	    }
	  }
	});
</script>
	<?php require 'js.php'; ?>
</body>
</html>
