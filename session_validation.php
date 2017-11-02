<?php
	/**
	 * Returns true if user has a valid
	 * session else false
	 */
	function sessionExists() {
		if ((isset($_SESSION['valid_user'])) && (($_SESSION['valid_user']) != null))  {
			return true;
		}
		else {
			return false;
		}
	}
	/**
	 * Returns true if user has a valid session
	 * and if the user is an admin
	 */
	function adminSessionExists() {
		if ((isset($_SESSION['valid_admin'])) && (($_SESSION['valid_admin']) != null)) {
			return true;
		}
		else{
			return false;
		}
	}
	/**
	 * Generates topnav to display admin topnav
	 * if admin is logged in else displays
	 * normal navbar
	 */
	function getTopNav() {
		$topNav = "";
		if (adminSessionExists()) {
			$topNav = '<nav class="navbar navbar-default" role="navigation" style="background-color: transparent;">
			<div class="container">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button><a href="./index.php"><img class="logo" src="./pic/logo.png" /></a>
			<div class="name-wrapper"><font class="nav-font">WORD EXPLORER</font>
			</div></div>
			<div class="collapse navbar-collapse">
			
			<ul class="nav navbar-nav" style="float: right;">
				<li>
					<label class="navOption"><input type="search" aria-controls="info" placeholder="search"></label>
				</li>
				<li>
					<a href="./admin.php"><button id="admin" class="navOption">Admin</button></a>
				</li>
				<li>
					<a href="./list.php"><button id="list" class="navOption">List</button></a>
				</li>
				<li>
					<a href="./help.php" style="padding: 0; margin: 2px;"><button id="help" name ="help"><img style="height: 50px;" src="./pic/help.png"></button></a>
				</li>
				<li> 
					<a href="./logout.php" style="padding: 0; margin: 2px;"><button id="logout" name ="logout" ><img style="height: 50px;" src="./pic/Login.png"></button></a>
				</li>
			</ul>
			</div><!--.nav-collapse --></div></nav>';
		}
		else if (sessionExists()) {
			$topNav = '<nav class="navbar navbar-default" role="navigation" style="background-color: transparent;">
			<div class="container">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
			<span class="icon-bar"></span><span class="icon-bar"></span>
			</button><a href="./index.php"><img class="logo" src="./pic/logo.png" /></a>
			<div class="name-wrapper"><font class="nav-font">WORD EXPLORER</font></div></div><div class="collapse navbar-collapse">
			
			<ul class="nav navbar-nav" style="float: right;">
				<li>
					<label class="navOption"><input type="search" aria-controls="info" placeholder="search"></label>
				</li>
				<li>
					<a href="./list.php"><button id="list" class="navOption">List</button></a>
				</li>
				<li>
					<a href="./help.php" style="padding: 0; margin: 2px;"><button id="help" name ="help"><img style="height: 50px;" src="./pic/help.png"></button></a>
				</li>
				<li> 
					<a href="./logout.php" style="padding: 0; margin: 2px;"><button id="logout" name ="logout" ><img style="height: 50px;" src="./pic/Login.png"></button></a>
				</li>
			</ul>
			</div><!--.nav-collapse --></div></nav>';
		}
		else{
			$topNav = '<nav class="navbar navbar-default" role="navigation" style="background-color: transparent;">
			<div class="container">
			<div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a href="./index.php"><img class="logo" src="./pic/logo.png" /></a>
			<a href="./index.php"><img class="logo" src="./pic/home.png" /></a>
			</div>
			<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav" style="float: right;">
				<li>
					<input style="font-size: 30px; margin: 2px;" type="search" aria-controls="info" placeholder="search">
				</li>
				<!--
				<li>
					<a href="./list.php"><button id="list" class="navOption">List</button></a>
				</li>
				-->
				<li>
					<a href="./help.php" style="padding: 0; margin: 2px;"><img style="height: 75px;" src="./pic/help.png"></a>
				</li>
				<li> 
					<a href="./logout.php" style="padding: 0; margin: 2px;"><img style="height: 75px;" src="./pic/Login.png"></a>
				</li>
			</ul>
			</div>
			<!--.nav-collapse -->
			</div>
        </nav>';
		}
		return $topNav;
	}
?>
