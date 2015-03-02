<?php
class App {
	public $virtual_path = 'http://io.zachjohnson.name';
	public $physical_path = '/home/zajohnsoncom/io.zachjohnson.name/';
	public $db_host = 'dev.zachjohnson.name';
	public $db_user = 'zachjohnson_name';
	public $db_pass = 'Twenty1jun3Y@';
	public $db_name = 'zjdevspace';
    
	/** DO NOT EDIT BELOW THIS LINE */
	public $db;
	public $styles;

	public function start() {
		session_start();
		
		$this->db = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name) or die("MySQLi Error: " . $this->db->error);
		
		include "header.php";
	}
	
	public function end() {
		include "footer.php";
		
		$this->db->close();
	}
	
	public function styles() {
		return '<link rel="stylesheet" href="app/styles.css">' . PHP_EOL;
	}
	
	public function scripts() {
		return '<script src="scripts.js"></script>' . PHP_EOL;
	}
	
	public function link($link) {
		return $this->virtual_path . '?a=' . $link;
	}
}