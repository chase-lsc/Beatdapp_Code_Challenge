<?php
$con = mysqli_connect('localhost', 'root', '','expense_tracker') or die('Error');

$expID = mysqli_real_escape_string($con, $_REQUEST['delete']);

$sql = "DELETE FROM expenses WHERE id=$expID";

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