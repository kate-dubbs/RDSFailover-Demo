
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>RDS Failover Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	
	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700italic,700' rel='stylesheet' type='text/css'>
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" id="theme-switch" href="css/style.css">
	
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>

	<!-- Viewport Units Buggyfill -->
	<script src="js/viewport-units-buggyfill.js"></script>

	<!-- Googgle Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>

	
	<!-- Main JS  -->
	<script src="js/main.js"></script>

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>

<center>
 <h1><?php  
    require '/var/www/html/vendor/autoload.php';
    use Aws\Rds\RdsClient;
    
    $client = RdsClient::factory(array(
        'region' => 'us-east-1',  // replace with your desired region visit http://docs.aws.amazon.com/general/latest/gr/rande.html to get your regions.
        'version' => 'latest' // Now needs a version
    ));
    $result = $client->rebootDBInstance(array(
     'DBInstanceIdentifier' => 'orbittledata', // REQUIRED
     'ForceFailover' => true
      ));

   echo 'Rebooting DB Instance'
?></h1>

<form action="rds-demo.php" method="get">
  <input type="submit" value="Refresh IP">
</form>
<br>
<h2> Note: RDS Failover typically takes 1-2 minutes </h2>

</center>
</body>
</html>