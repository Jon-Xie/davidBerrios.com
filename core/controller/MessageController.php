<?php 
	class MessageController extends Controller{

		function processForm($act,$confirm,$id){
			if(!empty($_POST['form-type'])) {
				$formType = $_POST['form-type'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$message = $_POST['message'];
				if($formType=="add"){
					$MessageModel = new MessageModel(null, $name, $email, $message);
				}else if($formType=="edit"){
					$id = $_POST['id'];
					$MessageModel = new MessageModel($id, $name, $email, $message);
				}
				$MessageModel->save();
			}

			if($act =='delete' && $confirm=='1'){
				$MessageModel = new MessageModel();
				$deleteObject = $MessageModel->getById($id);
				$result = $deleteObject->delete();
				if($result==true){
					HelperController::redirect('message.php?success=true');
				}else{
					HelperController::redirect('message.php?success=false');
				}
			}
		}

	}
?>