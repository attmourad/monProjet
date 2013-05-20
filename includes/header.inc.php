<?php 
	$lan = "fr";
	
	if(isset($_COOKIE["ssllan"])) {
		$lan = $_COOKIE["ssllan"];
	}

	if(isset($_GET["lan"])) {
		$lan = $_GET["lan"];
		setcookie("ssllan",$lan,time()+10*365*24*3600);
	}

	if(!file_exists("texts/$lan.xml")) {
		$lan="fr";
	}

	include_once("lib/xmldata.cls.php");
	include_once("lib/i18n.cls.php");
	$i18n = new I18nData("texts/$lan.xml");
	$_s = $i18n->readDataIntoArray();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="<?=$lan?>" class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="<?=$lan?>" lang="<?=$lan?>" class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="<?=$lan?>" lang="<?=$lan?>" lang="<?=$lan?>" class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="<?=$lan?>"> <!--<![endif]-->
	<head>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,300' rel='stylesheet'>
		<title><?=$_s['header']['title_'.$page]?></title>
		<meta charset="utf-8">
		<meta name="description" content="<?=$_s['header']['meta_desc_'.$page]?>">
		<!--[if lt IE 9]>
		<script src="assets/js/lib/html5shiv.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="assets/styles/css/normalize.css">
		<link rel="stylesheet" href="assets/styles/css/iconfonts.css">
		<link rel="stylesheet" href="assets/styles/css/main.css">
	</head>
	<body>
		<div id="container">
			<header>
				<nav class="primary">
					<ul class="left">
						<li class="<?php echo ($page=='home')?'active':''; ?>"><a href="index.php"><?=$_s['header']['menu_home']?></a></li>
						<li class="<?php echo ($page=='trad')?'active':''; ?>"><a href="portfolio-acrylique.php"><?=$_s['header']['menu_trad']?></a></li>
						<li class="<?php echo ($page=='digital')?'active':''; ?>"><a href="portfolio-numerique.php"><?=$_s['header']['menu_digital']?></a></li>
						<li class="<?php echo ($page=='cv')?'active':''; ?>"><a href="#"><?=$_s['header']['menu_cv']?></a></li>
					</ul>
					<ul class="right">
						<li class='group'><a href="<?php echo $_SERVER["PHP_SELF"]."?lan=fr"; ?>">FR</a> | </li>
						<li class='group'><a href="<?php echo $_SERVER["PHP_SELF"]."?lan=en"; ?>">EN</a></li>
						<li><a href="#"><span class="icon-mail"></span><?=$_s['header']['contact']?></a></li>
					</ul>
				</nav>
				<h1><span>SUSAN</span> ST-LAURENT</h1>
			</header>