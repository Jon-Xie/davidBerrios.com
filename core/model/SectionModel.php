<?php 
	class SectionModel extends Model {
		private $conn;
		private $id;
		private $title;
		private $content;

		function __construct($id=null, $title='', $content=''){
			global $conn;

			$this->conn = $conn;
			$this->id = $id;
			$this->title = $title;
			$this->content = $content;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($newId){
			$this->id = $newId;
		}

		public function getTitle(){
			return $this->title;
		}

		public function setTitle($newTitle){
			$this->title = $newTitle;
		}

		public function getContent(){
			return $this->content;
		}

		public function setContent($newContent){
			$this->content = $newContent;
		}

		public function save() {
			if($this->id == null){
				$sql = "INSERT INTO `sections`(`title`,`content`) VALUES ('$this->title', '$this->content')";
			} else {
				$sql = "UPDATE `sections` SET `title` = '".$this->title."', `content` = '".$this->content."' WHERE `id` = ".$this->id;    
			}
			mysqli_query($this->conn, $sql);
		}

		public function getAll(){
			$sql = "SELECT * FROM `sections`";
			$res = mysqli_query($this->conn, $sql);	
			$Sections = array();
			while($row = mysqli_fetch_object($res)){
				$Section = new SectionModel($row->id, $row->title, $row->content);
				$Sections[] = $Section; 
			}
			return $Sections; // why can't i return $sections[];
		}

		public function getById($selectedID){
			$sql = "SELECT * FROM `sections` WHERE `id` = $selectedID";
			$res = mysqli_query($this->conn, $sql);
			$row = mysqli_fetch_object($res);

			$selectedSection = new SectionModel($row->id, $row->title, $row->content);
			return $selectedSection;
		}
	}
?>