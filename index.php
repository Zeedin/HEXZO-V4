<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="theme-color" content="#616161">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="utf-8">
	<meta name="google-signin-client_id" content="570489780795-bcqjr96dpmseoo5mp704jsp0d4vv9b95.apps.googleusercontent.com">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="HEXZO:: Rewrite The Wheel">
	<title>HEXZO</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="icon" href="/favicon.png">


	<!-- REMOVE PHP LINE ONCE DONE!!!!-->
	<?php
	include_once('assets/Global-Vars.php');
	date_default_timezone_set("America/Vancouver");
	echo '<link rel="stylesheet" href="assets/CSS/Main.css?v='.time().'">'; ?>
	<!-- REMOVE PHP LINE ONCE DONE!!!! -->

	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

	<script>
		function myFunction() {
			document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
		}
	</script>
	<script>
		$(function(){
			$("#Nav-Right").load("/assets/Modules/Nav-Right.html");
			$("#Nav-Top").load("/assets/Modules/Nav-Top.html");
		});
	</script>



</head>
<body>

	<!-- Nav Start -->

	<div id="Nav-Left" class="topnav">
		<header class="drawer-header">
			<div id="Nav-Box" ><a class="banner-icon">graphic_eq</a> <a class="banner-text">HEXZO<a/>
				<a id="Nav-Toggle" href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><i class="material-icons">dehaze</i></a>
			</div>
		</header>
		<nav>

			<div id="Nav-Right"></div>

			<div class="mdl-layout-spacer"></div>

		</nav>
		<!-- Login Box Start -->
		<div id="Login-Box">
			<div style="margin:20px">
				<?php include_once($_SERVER['DOCUMENT_ROOT'] ."/assets/Modules/Login-Box.php");?>
			</div>
		</div>
		<!-- Login Box End -->
	</div>
	<div id="Nav-Bar">

		<a id="Nav-Toggle" href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><i class="material-icons">dehaze</i></a><h1>Home</h1>


		<div id="Nav-Bar-Box">
			<ul class="nav">
				<li class="drop"><i class="material-icons">more_vert</i>
					<ul>
						<div id="Nav-Top"></div>
					</ul>
				</li>
			</ul>

		</div>
	</div>

	<!-- NavEnd -->

	<!-- Page content -->
	<div id="Page">
		<!-- Banner -->
		<div id="Banner">
			<div class="Title-Box">
				<div class="Title"><h1>HEXZO</h1></div>
				<h2>Rewrite The Wheel</h2>
			</div>
		</div>
		<!-- End of  Banner  -->
		<div id="Content">

			<!-- Main "header" -->
			<h1 class="card">Site is a work in progress</h1>

			<!-- Piller 3/4 -->
			<div class="Piller_34">
				<div class="card">

					<p>To Do:
						<br>
						- Add back URL generator
						<br>
						- Build the video platform
						<br>
						- Build Nextwork Stats page
						<br>
						- Add button to remove chat meassage
						<br>
						- Finshing building user perm backend

					</p>

				</div>
			</div>

			<!-- Piller 1/4 -->
			<div class="Piller_14">
				<div class="card PasteBox Card-No-Padding">

					<?php include_once("assets/PasteBin/Main.php");?>


				</div>
			</div>


		</div>
	</div>
	<!-- END of Page content -->

</body>
