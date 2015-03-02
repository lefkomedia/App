<!doctype html>
<html>
<head>
<title><?= $this->title(' - I/O') ?></title>
<meta name="robots" content="no index, no follow">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?= $this->styles() ?>
</head>
<body>

<nav class="navbar navbar-fixed-top navbar-default">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">I/O</a>
		</div>
	</div><!-- / container -->
</nav>

<div class="container">

<div class="row">

<div class="col-md-3" id="sidebar">
	<nav class="list-group">
		<a href="log.php" class="list-group-item"><i class="fa fa-book fa-fw"></i> Development Log</a>
		<a href="expenses.php" class="list-group-item"><i class="fa fa-clock-o fa-fw"></i> Time Tracker</a>
		<a href="expenses.php" class="list-group-item"><i class="fa fa-dollar fa-fw"></i> Expenses</a>
		<a href="invoices.php" class="list-group-item"><i class="fa fa-file-text fa-fw"></i> Invoices</a>
		<a href="mileage.php" class="list-group-item"><i class="fa fa-car fa-fw"></i> Mileage</a>
	</nav>
</div>

<div class="col-md-9">

<h2><?= $this->title() ?></h2>

<div id="feedback"></div>