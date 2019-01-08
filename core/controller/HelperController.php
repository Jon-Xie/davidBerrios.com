<?php 
	class HelperController extends Controller{

		public static function redirect($dest){
			header('location: '.$dest);
			exit();
		}

		public static function generateSlugFromTitle($title){
			if(!empty($title)){
				$title = strtolower($title); //Lower case
				$slug = preg_replace('/\s/','-',$title);
			}
			return $slug;
		}
	}
?>