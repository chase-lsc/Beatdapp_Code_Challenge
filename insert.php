<?php
$con = mysqli_connect('localhost', 'root', '','expense_tracker') or die('Error');

$expName = mysqli_real_escape_string($con, $_REQUEST['name']);
$expCost = mysqli_real_escape_string($con, $_REQUEST['cost']);
$expCat = mysqli_real_escape_string($con, $_REQUEST['category']);

$sql = "INSERT INTO expenses (expense_name, cost, category) VALUES ('$expName', '$expCost', '$expCat')";

$rs = mysqli_query($con, $sql);
if($rs)
{
	header("Location: expense_tracker.php");
}
else {
	echo "error";
}
mysqli_close($con);
?>