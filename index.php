<?php 
	require_once('includes/header.php');
	$MessageController = new MessageController();
	$SectionModel = new SectionModel();
	$MessageController->processForm(null,null,null);
	
?>

<div class="home-bands">
	<?php 
		$sections = $SectionModel->getAll();
		if(count($sections)>0){
			foreach ($sections as $section) {
				echo '<div class="band band-'.HelperController::generateSlugFromTitle($section->getTitle()).'"><div class="band-inner">'.$section->getContent().'</div></div>';
			}
		}
	?>
	<div class="band band-contact">
		<div class="band-inner">
			<form method="POST">
				<input type="hidden" name="form-type" value="add">
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
	</div>
</div>
<?php 
	require_once('includes/footer.php');
?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     