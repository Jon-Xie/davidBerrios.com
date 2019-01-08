<?php 
	require_once('../includes/header.php');
	$MessageModel = new MessageModel();
	$MessageController = new MessageController();

	$act = '';
	if(!empty($_GET['act'])){
		$act = $_GET['act'];
	}

	$confirm = '';
	if(!empty($_GET['confirm'])){
		$confirm = $_GET['confirm'];
	}

	$id = null;
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
	}

	$MessageController->processForm($act,$confirm,$id);



?>
<!DOCTYPE html>
<html>
<head>
	<title>Message Management</title>
</head>
<body>
	<?php 
		if(empty($act)):
	?>
			<table border="1">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Message</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php 
					$messages = $MessageModel->getAll();
					if(count($messages) > 0):
						//Foreach loop is built mainly for traversing arrays.
						// foreach($messages as  $message)
						foreach ($messages as $message):
				?>
							<tr>
								<td><?=$message->getName()?></td>
								<td><?=$message->getEmail() ?></td>
								<td><?=$message->getMessage()?></td>
								<td><a href="message.php?act=edit&id=<?=$message->getId()?>">Edit</a></td>
								<td><a href="message.php?act=delete&confirm=yes&id=<?=$message->getId()?>">Delete</a></td>
							</tr>
				<?php 
						endforeach;
					endif;
				?>	
			</table>
	<?php 
		elseif($act == 'edit'):
			$editObject = $MessageModel->getById($id);
	?>
			<form method="POST">
				<input type="hidden" name="form-type" value="edit">
				<input type="hidden" name="id" value="<?=$editObject->getId()?>">
				<fieldset>
					<label for="name">Name</label>
					<input type="text" name="name" id="name" value="<?=$editObject->getName()?>">
				</fieldset>
				<fieldset>
					<label for="email">E-mail</label>
					<input type="email" name="email" id="email" value="<?=$editObject->getEmail()?>">
				</fieldset>
				<fieldset>
					<label for="message">Message</label>
					<textarea name="message" id="message" rows="7"><?=$editObject->getMessage()?></textarea>
				</fieldset>
				<br>
				<input type="submit" name="update" value="Update">
			</form>
	<?php 
		elseif($act == 'delete'):
	?>
		<div class="delete-confirmation">
			Are you sure you want to delete this?<br>
			<a href="message.php?act=delete&confirm=1&id=<?=$id?>">Yes</a> &nbsp;&nbsp; <a href="message.php">No</a>
		</div>

	<?php 
		endif;
	?>
</body>
</html>