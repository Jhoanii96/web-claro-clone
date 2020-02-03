<?php 
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
	JHON ALVARADO ACHATA
	
*/

	class Model
	{
		protected $db;
		
		public function __construct()
		{
			$this->db = new mysqli(HOST, USER, PASS, DB);
			$this->db->set_charset('utf8');
		} 
	}

 ?>