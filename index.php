<?php 
session_start();

if(empty($_SESSION['random']))
{
	$random = rand(1,100);
	$_SESSION['random'] = $random;
}
if(empty($_SESSION['game']))
{
	$value = "Submit";
	$class = "hint";
}
else if($_SESSION['game'] === "finished")
{
	$value = "Play Again!";
	$class = "congratulation";
	$_SESSION['reset']="reset";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Great Number Game</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>Welcome to the Great Number Game!</h2>
	<p>I am thinking of a number between 1 and 100</p>
	<p>Take a guess!</p>

<?php if(!empty($_SESSION['message'])){ ?>
	<div class="<?=$class?>">
		<h1><?=$_SESSION['message']?></h1>
	</div>
<?php }?>

	<form action="process.php" method="post">
		<label>
			<input type="text" name="number">
		</label>
		<input type="submit" value="<?=$value?>">
	</form>
</body>
</html>

