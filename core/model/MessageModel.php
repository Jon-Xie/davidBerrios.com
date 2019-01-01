<?php 
	class MessageModel extends Model {
		private $id;
		private $name;
		private $email;
		private $message;

		function __construct(){
			echo 'hello';
		}

		public function getId(){
			return $this->id;
		}
		public function setId($newId){
			$this->id = $newId;
		}

		public function getName() {
			return $this->name;
		}

		public function setName($newName) {
			$this->name = $newName;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setEmail($newEmail) {
			$this->email = $newEmail;
		}

		public function getMessage() {
			return $this->message;
		}

		public function setMessage($newMessage) {
			$this->message = $newMessage;
		}

		public function save(){
			global $conn;
			$sql = "INSERT INTO `messages` (`name`, `email`, `message`)VALUES('".$this->name."','".$this->email."','".$this->message."')";
			mysqli_query($conn,$sql);
		}

	}
?>
