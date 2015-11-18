<?PHP

class DB
{
	public $pdo;

	public function __construct()
	{
		$DNS         	= 'mysql:host=127.0.0.1;dbname=customers';
		$USER 	    	= 'root';
		$PASSWORD 		= '';


		try
		{
			$this->pdo = new PDO($DNS , $USER , $PASSWORD);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$this->pdo->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}


	}

}