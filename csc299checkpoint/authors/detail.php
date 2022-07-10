<!doctype html>
<html lang="en">
	<head>
	<!-- https://www.bootdey.com/snippets/view/team-user-resume#html -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"
		<title>ASE 230 - class of Fall 2021 Great Authors - Detail Page</title>
	</head>

	<?php
		include('../lib/csv_util.php');
	?>


  <!-- Displays the Author name that had been selected by the user and stored in the Index variable-->
	<body style="text-align:center;">
		<?php
			$authors = readContentHeader('../data/author.csv');
		?>

			<p> <?= $authors[$_GET['index']]['Author']?> </p>


			<!-- A hidden form that if a signed in user is on the page, will display options for the user to access the pages for deleting and modifying an author-->
			<form method="post"	action="modify.php">
				<p>
				<input type="hidden" name="index" value=<?=$_GET['index']?>>
				<input type="submit" name="submit" value="Modify">
				</p>
			</form>

			<form method="post"	action="delete.php">
				<p>
				<input type="hidden" name="index" value=<?=$_GET['index']?>>
				<input type="submit" name="submit" value="Delete Author">
				</p>
			</form>

				<!-- Provides a link to return the user to the index.-->
			<form method="post"	action="index.php">
				<p>
				<input type="submit" name="submit" value="Home">
				</p>
			</form>
		<?php
			echo "<p>Copyright &copy; 2017-" . date("Y") . " Noah R Gestiehr</p>";
		?>

	</body>
</html>
