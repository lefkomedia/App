<?php
class App {
	public $physical_path = '/home/zajohnsoncom/io.zachjohnson.name/';
	public $virtual_path = 'http://io.zachjohnson.name/';
	public $website_title = 'i/o';
	public $db_host = 'dev.zachjohnson.name';
	public $db_user = 'zachjohnson_name';
	public $db_pass = 'Twenty1jun3Y@';
	public $db_name = 'zjdevspace';
	public $db_prefix = 'io_';
	public $app_folder = 'app/';
    
	/** DO NOT EDIT BELOW THIS LINE */
	public $db;
	public $styles;

	function __construct() {
		$this->db = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name) or die("MySQLi Error: " . $this->db->error);
	}
	
	public function start() {
		session_start();
		
		ob_start();
		include "header.php";
	}
	
	public function page() {
		if( ! isset($_GET['*']) ) return;
		
		$page = $_GET['*'];
		$file = $this->physical_path . $page . '.php';
		
		if( file_exists($file) )
			include $file;
		else
			include $this->physical_path . $this->app_folder . '404.php';
	}
	
	public function end() {
		include "footer.php";
		ob_get_contents();
		
		$this->db->close();
	}
	
	public function styles() {
		return '<link rel="stylesheet" href="app/styles.css">' . PHP_EOL;
	}
	
	public function scripts() {
		return '<script>var app_table = {table: "' . $this->table . '", primary_key: "' . $this->primary_key . '"};</script>' . PHP_EOL . '<script src="app/scripts.js"></script>' . PHP_EOL;
	}
	
	public function link($link) {
		return $this->virtual_path . '?*=' . $link;
	}
	
	public function title($suffix = '') {
		if( ! isset($this->title) )
			return $this->website_title;
		else
			return $this->title . $suffix;
	}
}