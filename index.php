<?php 
	require_once('includes/header.php');
	$MessageModel = new MessageModel();

	if(count($_POST) > 0) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$MessageModel->setName($name);
		$MessageModel->setEmail($email);
		$MessageModel->setMessage($message);
		$MessageModel->save();
	}
?>

<div class='band intro-band'>
</div>

<div class="band about-band"></div>
<div class="band projects-band">
	
</div>
<div class="band contact-band">
	<form method="POST">
		<fieldset>
			<label for="name">Name</label>
			<input type="text" name="name" id="name">
		</fieldset>
		<fieldset>
			<label for="email">E-mail</label>
			<input type="email" name="email" id="email">
		</fieldset>
		<fieldset>
			<label for="message">Message</label>
			<textarea name="message" id="message" rows="7"></textarea>
		</fieldset>
		<br>
		<input type="submit" name="send" value="Send">
	</form>
</div>

<?php 
	require_once('includes/footer.php');
?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     