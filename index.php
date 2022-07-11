<!doctype html>
<html lang="en">
	<head>
	<!-- https://www.bootdey.com/snippets/view/team-user-resume#html -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"
		<title CSC 299 - class of Summer 2022 Great Authors - Index Page</title>
	</head>

	<?php
		include('lib/csv_util.php');
	?>

	<body style="text-align:center;">
		<a href="auth/auth/signup.php">Signup</a>
		<?php
		if(!isset($_SESSION['username'])) {
			$_SESSION['msg'] = "Please log in to view this page";
			echo '<a href="auth/auth/signin.php">Sign in</a>';
		}
		if (isset($_SESSION['username'])){
			echo '<a href="auth/auth/signout.php">Sign out</a>';
		}
		?>
		<?php

			// Reads out all of the quotes and author pair.
			$quotes = readContentHeader('quotes.csv');
			
			for($i=0;$i<count($quotes);$i++){
		?>
			<h2><?= $quotes[$i]['Quote']?> </h2>
			<p> <?= $quotes[$i]['Author']?> </p>

			<a href="detail.php?index=<?= $i ?>">See Quote</a>
			<hr>
			<?php
		}?>

			<!-- Links the user to the create.php for the quotes file-->
		<form method="post"	action="quotes/create.php">
				<p>
				<input type="submit" name="create" value="Create New Quote">
				</p>
			</form>

			<!-- Links the user to the create.php for the author file-->
			<form method="post"	action="authors/create.php">
					<p>
					<input type="submit" name="create" value="Create New Author">
					</p>
				</form>
		<?php
			echo "<p>Copyright &copy; 2017-" . date("Y") . " Noah R Gestiehr</p>";
		?>

	</body>
</html>
