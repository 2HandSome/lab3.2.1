<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
	<?php
		require_once"function.php";
		$req = getProducts(3);
	?>

</head>
<body>
<?php include "header.php";?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<button id="myBtn" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus"></i></button>

		</div>
	</div>
</div>

<!-- Modal -->
<?php require_once"products_crud.php"; ?>
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new products</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="" method="POST" id="add_form">
      <div class="modal-body">
        	<div class="mb-3">
				  <label for="formControlInputTitle" class="form-label">Add new title</label>
				  <input type="title" class="form-control" id="formControlInputTitle" placeholder="add title" name='title'>
			</div>
			<div class="mb-3">
				  <label for="formControlTextarea" class="form-label">Add text</label>
				  <textarea class="form-control" id="formControlTextarea" rows="3" placeholder="add text" name='text'></textarea>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name='submit'>Sand</button>
      </div>
  </form>
    </div>
  </div>
</div>

<div class="content">
	<?php foreach ($req as $key => $value) { ?>
  			<div class="text">
  					<a class="btn btn-success"  id="edit<?php echo $value[id] ?>" data-bs-toggle="modal" data-bs-target="#update<?php echo $value[id] ?>"><i class="fa fa-edit"></i></a>
  					<a type="submit" name="delete_submit" class="btn delete btn-success" id="delete<?php echo $value[id]?>" data-bs-toggle="modal" data-bs-target="#remove<?php echo $value[id] ?>"><i class="fa fa-trash-alt"></i></a>
					<h2><?php echo $value[title] ?></h2>
					<p><?php echo $value[text] ?></p>
			 </div>

			 <!-- Modal  Update-->
				<div class="modal fade" id="update<?php echo $value[id] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Update products</h5>
				                <button type="button" class="close" data-dismiss="modal">&times;</button>
				      </div>
				      <form action="?id=<?php echo $value[id] ?>" method="POST" id="updare_form">
				      <div class="modal-body">
				        	<div class="mb-3">
								  <label for="formControlInputTitle" class="form-label">Update title</label>
								  <input type="title" class="form-control" id="formControlInputTitle" placeholder="add title" name='title' value="<?php echo $value[title] ?>">
							</div>
							<div class="mb-3">
								  <label for="formControlTextarea" class="form-label">Update text</label>
								  <textarea class="form-control" id="formControlTextarea" rows="3" placeholder="<?php echo $value[text] ?>" name='text' value="<?php echo $value[text] ?>"></textarea>
							</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary" name='edit_submit'>Sand</button>
				      </div>
				  </form>
				    </div>
				  </div>
				</div>
			<!-- Delete Modal -->

				<div class="modal fade" id="remove<?php echo $value[id] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Delete products</h5>
				                <button type="button" class="close" data-dismiss="modal">&times;</button>
				      </div>
				      <form action="?id=<?php echo $value[id] ?>" method="POST" id="updare_form">
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary" name='delete_submit'>Delete</button>
				      </div>
				  </form>
				    </div>
				  </div>
				</div>

					<script>
			$(document).ready(function(){
			    $("#edit<?php echo $value[id] ?>").click(function(){
			        $("#update<?php echo $value[id] ?>").modal();
			    });
			      $("#delete<?php echo $value[id] ?>").click(function(){
			        $("#remove<?php echo $value[id] ?>").modal();
			    });

			});


		</script>
					
						<?php }?>

</div>


	  	<script>
			$(document).ready(function(){
			    $("#myBtn").click(function(){
			        $("#create").modal();
			    });

			});

		</script>

</body>
</html>