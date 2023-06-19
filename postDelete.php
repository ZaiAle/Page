<?php
	require_once('connection.php');
	session_start(); 
	
	$query = "SELECT tytul, post_id FROM posts";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="scripts/main.js"></script>
	<link rel="stylesheet" href="styles/style.css">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>

<body>
	<div class="container-fluid" id="point_of_no_return">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="edytor_tekstu">
		<table class="table" id="chck_post">
			<thead>
			<tr>
				<th class="col-md-1" scope="col"><span class="glyphicon glyphicon-trash"></span></th>
      				<th class="col-md-11" scope="col">Tytuł postu</th>
			</tr>
  			</thead>
			<?php	
				while ($titles = mysqli_fetch_assoc($result))
				{
					$tytul = $titles['tytul'];
					$post_id = $titles['post_id'];
			?> 
			<tbody>
			<tr>
				<td scope="row">
					<input name="numer[]" value='<?= $post_id ?>' id="numer" type="checkbox">
				</td>
				<td>
					<?php
							echo $tytul;
						}
					?>	
				</td>
			</tr>
  		</tbody>
		</table>
		<button type="button" class="btn btn-primary przycisk_delete" data-toggle="modal" data-target="#alert">Usuń</button>
		<div class="modal" id="alert" tabindex="-1" role="dialog">
		<div class="modal-dialog"  role="document">
			<div class="modal-content">
				<div class="modal-body">
					<p>Czy na pewno chcesz usunąć zaznaczone posty?</p>
					</div>
					<div class="modal-footer">
						<button  class="btn btn-primary przycisk_delete" type="submit">Usuń</button>
						<button type="button" class="btn btn-secondary anuluj" data-dismiss="modal">Anuluj</button>
					</div>
				</div>
			</div>
		</div>	
		</form>
	</div>

	<?php
	if(isset($_POST['numer']))
	{
		$query = "SELECT post_id FROM posts";
		$arr = $_POST['numer'];
		foreach ($arr as $id) 
		{
		$result_to_delete = "DELETE FROM posts WHERE post_id=" . $id;
		mysqli_query($conn, $result_to_delete);
		}
	$_SESSION['loggedIn'] = "True";
	header("Location: admin.php");
	exit();
	}
	$_SESSION['loggedIn'] = "True";	
	?>

</body>
</html>