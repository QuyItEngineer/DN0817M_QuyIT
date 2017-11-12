<?php include 'header.php'; ?>

<?php 
 	/**
 	 * summary
 	 */
 	class Database
 	{
 	    private $url = 'mysql:host=localhost;dbname=myshop';
	    private $userName = 'root';
	    private $password = 'root';

	    public function connect(){
	        try {
	            $conn = new PDO($this->url, $this->userName, $this->password);
	            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            if ($conn) {
	            	echo "Okay man.";
	            }
	            else
	            {
	            	echo "Connection failed: " . $e->getMessage();
	            }
	        }catch(PDOException $e){
	            echo "Connection failed: " . $e->getMessage();
	        }
	        echo "<br> GOOD BYE.";
	    }
    
    }

    $occho = new Database();
    $occho->connect();
    // if ($tuan) {
    // 	echo "okay";
    // }
 ?>
<hr>



<?php include 'footer.php'; ?>