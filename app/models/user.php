<?PHP

class User extends DB
{
	public function __construct()
	{

		parent::__construct();
	}


	public function sql($sql)
	{
		
				
		try
			{
			$query = $this->pdo->prepare($sql);
			$query->execute();
			$count = $query->rowCount();
			}
			catch(Exception $e)
			{
				echo '<pre>';
				echo 'ERROR:  '.$sql;
				echo '</pre>';			
				echo $e->getMessage();
				die;
			}	
		
		$dane = $query->fetchAll(PDO::FETCH_COLUMN);
		
		//echo '<pre>';
		//print_r($dane);
		//echo '</pre>';

		return $dane;

	}


	public function insert($sql)
	{
		
				
		try
			{
			$query = $this->pdo->prepare($sql);
			$query->execute();
			$count = $query->rowCount();
			}
			catch(Exception $e)
			{
				echo '<pre>';
				echo 'ERROR:  '.$sql;
				echo '</pre>';			
				echo $e->getMessage();
				die;
			}	
		
		

	}



}

