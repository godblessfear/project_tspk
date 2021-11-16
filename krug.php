<?php require_once("aot.php") ?>
<?php 
if(isset($_GET['id']))
{
	$item = getKrujById($_GET['id']);
	$item = mysqli_fetch_array($item);
	if($item['id'] != '')
	{
print <<<HERE
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{$item['name']}</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>

<body>
HERE;
include("header.php");
include("main_krug.php");
include("footer.php");
echo "</body></html>";
	}
	else
	{
		header("Location: index.php");
	}
}
else
{
	header("Location: index.php");
}
?>
