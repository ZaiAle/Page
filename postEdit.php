<?php
	require_once('connection.php');
	session_start(); 
	
	$query = "SELECT tytul, tresc, post_id FROM posts";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="styles/style.css">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>

<body>
	<div class="container-fluid" id="point_of_no_return">
		<form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>' method="post" id="edytor_tekstu">
		<table class="table" id="chck_post">
			<thead>
			<tr>
				<th class="col-md-1" scope="col"><span class="glyphicon glyphicon-edit"></span></th>
      				<th class="col-md-11" scope="col">Tytuł postu</th>
			</tr>
  			</thead>
			<?php	
				while ($titles = mysqli_fetch_assoc($result))
				{
					$tytul = $titles['tytul'];
					$post_id = $titles['post_id'];
					$tresc = $titles['tresc']; 
			?> 
			<tbody>
			<tr>
				<td scope="row">
				<input type="checkbox" value='<?= $post_id?>' class="btn-check" name = "btn-check" id="btn-check" data-toggle="modal" data-target="#edit_window">
				</td>
				<td>
					<?php
						echo $tytul;
					} ?>	
				</td>
			</tr>
  		</tbody>
		</table>
		<div class="modal" id="edit_window" tabindex="-1" role="dialog">
		<div class="modal-dialog"  role="document">
			<div class="modal-content">
				<div class="modal-body">
				<div class="form-group" id="post_edytor">
					<label for="tytul"><b>Tytuł:</b></label>
					<textarea id="tytul" rows="1" name="tytul_ed" class="form-control" style="resize:none;"></textarea>

					<label for="tresc"><b>Treść postu:</b></label>
					<textarea class="form-control" name="tresc_ed" rows="8" id="tresc"></textarea>
				</div>
					</div>
					<div class="modal-footer edit">
						<button type="button" class="btn btn-secondary anuluj" data-dismiss="modal">Anuluj</button>
						<button  class="btn btn-primary przycisk_zapisz" type="submit">Zapisz</button>
						
					</div>
				</div>
			</div>
		</div>	
		</form>
	</div>

	<?php
	if(isset($_POST['btn-check']))
	{
		$post_id = $_POST['btn-check'];
		
		$stmt = $conn->prepare("UPDATE posts SET tytul=?, tresc=? WHERE post_id = ?");
		$stmt->bind_param("sss", $post_title, $post_cont, $post_id);

		$qrr = "SELECT tytul, tresc FROM posts WHERE post_id = '$post_id'";
		$res = mysqli_query($conn, $qrr);
		$row = $res -> fetch_assoc();

		$post_title = $row['tytul'];
		$post_cont = $row['tresc'];
		
		if(isset($_POST['tytul_ed']) && !empty(trim($_POST['tytul_ed'])))
		{
			$post_title = $_POST['tytul_ed'];
		};
		if(isset($_POST['tresc_ed']) && !empty(trim($_POST['tresc_ed'])))
		{
			$post_cont = $_POST['tresc_ed'];
		};

	$stmt->execute();
	$stmt->close();
	
	$_SESSION['loggedIn'] = "True";
	header("Location: admin.php");
	exit();
	}
	$_SESSION['loggedIn'] = "True";	
	?>

	
</body>
<script src="scripts/main.js"></script>
</html>