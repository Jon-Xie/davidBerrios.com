<?php 
	class MessageModel extends Model {
		private $conn;

		private $id;
		private $name;
		private $email;
		private $message;

		function __construct($id = null, $name = '', $email = '', $message = ''){
			global $conn;
			$this->conn = $conn;
			$this->id = $id;
			$this->name = $name;
			$this->email = $email;
			$this->message = $message;
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
			if($this->id == null) {
				$sql = "INSERT INTO `messages` (`name`, `email`, `message`)VALUES('".$this->name."','".$this->email."','".$this->message."')";
			} else {
				$sql = "UPDATE `messages` SET `name` = '".$this->name."', `email` = '".$this->email."', `message` = '".$this->message."' WHERE `id` = ".$this->id;
			}
			mysqli_query($this->conn,$sql);
		}

		public function delete(){
			if($this->id!==null){
				$sql = "DELETE FROM `messages` WHERE `id`=".$this->id;
				mysqli_query($this->conn,$sql);
				return true;
			}else{
				return false;
			}
		}

		public function getAll(){
			$sql = "SELECT * FROM `messages`";
			$res = mysqli_query($this->conn,$sql);
			$Messages = array();
			while($row = mysqli_fetch_object($res)){
				// $Message = new MessageModel();
				// $Message->setName($row->name);
				// $Message->setEmail($row->email);
				// $Message->setMessage($row->message);
				$Message = new MessageModel($row->id,$row->name,$row->email,$row->message);
				$Messages[] = $Message; //Append this message object to the end of messages array
			}
			return $Messages;
		}

		public function getById($conditionID){
			$Message = false;
			$sql = "SELECT * FROM `messages` WHERE `id` = ".$conditionID;
			$res = mysqli_query($this->conn,$sql);
			$row = mysqli_fetch_object($res); //returns A MYSQL object not YOUR object

			// $Message = new MessageModel();
			// $Message->setName($row->name);
			// $Message->setEmail($row->email);
			// $Message->setMessage($row->message);
			$Message = new MessageModel($row->id,$row->name,$row->email,$row->message);
			return $Message;
		}

	}
?>
