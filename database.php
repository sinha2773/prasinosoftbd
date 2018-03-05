<?php
	class Database{	
		public $host    =DB_HOST;
		public $user  	=DB_USER;
		public $pass  	=DB_PASS;
		public $dbname  =DB_NAME;
		
		
		public $link;
		public $error;
		
	public function __construct(){
		$this->connectDB();
	}
		
		private function connectDB(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->link){
			$this->error="connection fail".$this->link->connect_error;
			return false;
			
		}
		}
		// Select Data
		public function select($query){
			$result = $this->link->query($query) or die ($this->link->error.__LINK__);
			if($result->num_rows > 0){
				return $result;
			}
			else{
				return false;
			}
		}
		
		// Insert Data
		
		
		public function insert($insert_data){
			$insert_row = $this->link->query($insert_data) or die ($this->link->error.__LINK__);
			if($insert_row){
				header("Location: insert.php?msg=".urlencode('Data Inserted Successfully.'));
				exit();
			}
			else{
				die("Error :(".$this->link->errno.")".$this->link-error);
			}
		}

		
}

?>