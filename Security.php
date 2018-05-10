<?php
// Note the space before "<?php"
@session_start();
ob_start();
?>


<!DOCTYPE html>
<html>

<?php
	$id = $_POST['cid'];
	$cpassword = $_POST['cpassword'];

	include 'connectDB.php';
	$conn = connectDB();

	$query = "SELECT * FROM CompanySign where (cid='".$id."' or cemail='".$id."') AND cpassword='".$cpassword."'";

	$result = mysqli_query($conn, $query);

	$count = mysqli_num_rows($result);

	if ($count==1){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['cid'] = $row["cid"];
		header('Location: JobPosting.php');
		exit();
	}
	else {
		$_SESSION['message'] = 'Incorrect ID/ Password, please try again.';
		header ('Location: Company_SignIn.php');
		exit();
	}

?>

