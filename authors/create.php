<?php

// Checks to see if the user is logged in, if not re-directs them to the sign in page.
require_once('functions.php');
signin($_GET,'../../auth/data/users.csv.php');

if(!isset($_SESSION['username'])) {
	$-SESSION['msg'] = "Please log in to view this page";
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
		<title>ASE 230 - class of Fall 2021 Great Authors - Create Quote</title>
	</head>

	<?php
		include('../lib/csv_util.php');
	?>

	<body style="text-align:center;">

		<form method="post"	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<br><br>

		<!-- Reads Authors.CSV into an array -->
		<?php
			$authorFile = fopen("../data/authors.csv","r") or die("Author File does not exist.");
			while(!feof($authorFile)) {
				$authors[] = fgetcsv($authorFile, 1024);
			}
			fclose($authorFile);


		?>



		<br><br>
		<p>
		Author:<textarea name="Author" rows="5" cols="40"></textarea>
		<!--<spanclass="error">* <?php echo $quoteErr;?></span>-->
		</p>
		<br><br>


		<!-- Code to call the adding function and placing it on the button. -->
		 <?php

				if(isset($_POST['submit'])) {
					addContent('../data/authors.csv',$_POST['author']);
					echo 'That Author was added.';
				}
			?>
		<p>
		<input type="submit" name="submit" value="Add Author">
		</p>
		</form>

		<nav>
			<ul>
			<li><a href="index.php">Home</a></li>
			</ul>
		</nav>
		<?php
		echo "<p>Copyright &copy; 2017-" . date("Y") . " Noah Gestiehr</p>";
		?>
	</body>
</html>
