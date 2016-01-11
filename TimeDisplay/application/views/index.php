<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Time Display</title>
	<style>
		body {
			text-align: center;
		}
		.firstbox {
			width: 200px;
			border: solid thin black;
		}
		.secbox {
			width: 200px;
			margin-top: 30px;
			border: solid thick black;
		}
	</style>
</head>
<body>
	<div align="center" class="wrapper">
		<div class="firstbox">
			<p>The current time and date</p>
		</div>
		<div class="secbox">
			<h1><?=$time?></h1>
		</div>
	</div>
</body>
</html>