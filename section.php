<?php 
	require_once('../includes/header.php');
	$SectionModel = new SectionModel();
	if(count($_POST) > 0){
		$title = $_POST['title'];
		$content = $_POST['content'];
		$SectionModel->setTitle($title);
		$SectionModel->setContent($content);
		$SectionModel->save();
	}

	if(!empty($_POST['act'])){
		$act = $_POST['act'];
	}

	if(!empty($_POST['id'])){
		$act = $_POST['id'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Section Management</title>
</head>
<body>
	<form method="POST">
		<fieldset>
			<label for="name">Title</label>
			<input type="text" name="title" id="title">
		</fieldset>
		<fieldset>
			<label for="content">Content</label>
			<textarea name="content" id="content"></textarea>
		</fieldset>
		<input type="submit" name='send' value="Send">
	</form>
</body>

<?php 
	require_once('includes/footer.php');
?>
</html>