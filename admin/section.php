<?php 
	require_once('../includes/header.php');
	$SectionModel = new SectionModel();
	$SectionController = new SectionController();

	$SectionController->processForm();

	$act = '';
	if(!empty($_GET['act'])){
		$act = $_GET['act'];
	}

	if(!empty($_GET['id'])){
		$id = $_GET['id'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Section Management</title>

</head>
<body>
	<?php 
		if(empty($act)) :
	?>
			<form method="POST">
				<input type="hidden" name="form-type" value="add">
				<fieldset>
					<label for="name">Title</label>
					<input type="text" name="title" id="title">
				</fieldset>
				<fieldset>
					<label for="content">Content</label>
					<textarea name="content" id="content" class="tinymce"></textarea>
				</fieldset>
				<input type="submit" name='send' value="Send">
			</form>
				<table border="1">
					<tr>
						<th>id</th>
						<th>title</th>
						<th>content</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
					<?php 
						$sections = $SectionModel->getAll();
						if(count($sections) > 0):
							foreach($sections as $section):
					?>
								<tr>
									<td><?= $section->getId() ?></td>
									<td><?= $section->getTitle()?></td>
									<td><?= substr(strip_tags($section->getContent()),0,100) ?></td>
									<td><a href="section.php?act=edit&id=<?= $section->getId() ?>">Edit</a></td>
									<td><a href="section.php?act=delete&id=<?= $section->getId()?>">Delete</a></td>
								</tr>

					<?php	
							endforeach;
						endif;
					?>
				</table>
	<?php 
		elseif($act == 'edit') :
			$editObject = $SectionModel->getById($id);
	?>	
			<a href="section.php" class="btn">Back</a>
			<form method="POST">
				<input type="hidden" name="form-type" value="edit">
				<input type="hidden" name="id" value="<?=$editObject->getId()?>">
				<fieldset>
					<label for="name">Title</label>
					<input type="text" name="title" id="title" value="<?=$editObject->getTitle()?>">
				</fieldset>
				<fieldset>
					<label for="content">Content</label>
					<textarea name="content" id="content" rows="7" class="tinymce"><?=$editObject->getContent()?></textarea>
				</fieldset>
				<br>
				<input type="submit" name="update" value="Update">
			</form>
	<?php 
		endif; 
	?>
	<script src="../js/tinymce/tinymce.min.js"></script>
  	<script>tinymce.init({ 
  	selector:'.tinymce',
  	theme: 'modern',
	  plugins: 'print preview fullpage  searchreplace autolink directionality  fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern  code',
	  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat code',
         });</script>
</body>

<?php 
	require_once('../includes/footer.php');
?>
</html>