<?php
// Establishes that the user must be signed in to view this page, if they are not will redirect to the sign-in page.
require_once('../lib/csv_util.php');
signin($_GET,'../../auth/data/users.csv.php');

if(!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "Please log in to view this page";
	header('location: ../auth//auth/signin.php');
}

?>
<!doctype html>
<html lang="en">
	<head>
	<!-- https://www.bootdey.com/snippets/view/team-user-resume#html -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"
		<title>ASE 230 - class of Fall 2021 Great Authors - Delete Quote</title>
	</head>

	<?php

		include('../lib/csv_util.php');


	?>

	<body style="text-align:center;">
		<!-- Page to delete a quote from an author -->
		<p>
			<?php
			$quotes = readContentHeader('../data/quotes.csv');
			?>
			<h2>Posted Index of <?= $_POST['index']?></h2>
			<h2>Would you like to delete this quote?</h2>
			<h1><?= $quotes[$_POST['index']]['Quote'] ?></h1>
			<p><?= $quotes[$_POST['index']]['Author'] ?></p>

			 <?php
				// Deletes the quote from the author that was given by the user.
				if(isset($_POST['delete'])) {
					//echo "Deleting at Index block". $_POST['index'];
					deleteContent('../data/quotes.csv',$_POST['index']);
					echo 'That Quote and Author entry was deleted.';
				}
			?>

			<!-- Provides a button that redirects the user home.-->
			<form method="post"	action="index.php">
				<p>
				<input type="submit" name="submit" value="Home">
				</p>
			</form>

			<!-- if the user is signed in, will display the delete button. Otherwise it will be hidden.-->
			<form method="post"	action="<?= $_SERVER['PHP_SELF']?>">
				<br><br>
				<p>
				<input type="hidden" name="index" value=<?=$_POST['index']?>>
				<input type="submit" name="delete" value="Delete Quote">
				</p>
			</form>

			<?php

			?>
		</p>

		<?php

			echo "<p>Copyright &copy; 2017-" . date("Y") . " Noah R Gestiehr</p>";
		?>
	</body>
</html>
