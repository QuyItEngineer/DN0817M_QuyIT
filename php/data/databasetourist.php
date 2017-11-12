<?php 

	/**
	 * Create by Bee It engineer
	 * Date: 02/11/2017
	 */
	class DatabaseMyShop
	{
	    
		private $url = 'mysql:host=localhost;dbname=tourist';
		private $userName = 'root';
		private $password = 'root';

	    public function connect()
	    {
	        return new PDO($this->url, $this->userName, $this->password);
	    }
	}
 ?>