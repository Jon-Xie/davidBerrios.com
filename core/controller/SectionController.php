<?php 
	class SectionController extends Controller {

		function processForm() {
			if(count($_POST) > 0){
				$formType = $_POST['form-type'];
				$title = $_POST['title'];
				$content = $_POST['content'];
				if($formType == 'add'){
					$SectionModel = new SectionModel(null, $title, $content);
				} else if ($formType == 'edit'){
					$id = $_POST['id'];
					$SectionModel = new SectionModel($id, $title, $content);
				}
				$SectionModel->save();
			}
		}


	}	
?>