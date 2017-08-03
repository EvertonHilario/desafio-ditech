<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="pt-br">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <!-- <link href="../assets/css/bootstrap.min.css" rel="stylesheet" /> -->

    <!--  Material Dashboard CSS    -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/themes/material-dashboard-html/assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!-- <link href="<?php //echo Yii::app()->request->baseUrl; ?>/themes/material-dashboard-html/assets/css/demo.css" rel="stylesheet" /> -->

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

<body>

	<div class="wrapper">

		<?php echo $content; ?>

	</div>
</body>

	<!--   Core JS Files   -->
	<!-- <script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script> -->
	<!-- <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script> -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/material-dashboard-html/assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/material-dashboard-html/assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/material-dashboard-html/assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/material-dashboard-html/assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/material-dashboard-html/assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>

</html>
