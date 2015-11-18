<?PHP

class Insert extends Controller
{
	public function index($name = '')
	{
	//	$user = $this->model('User');
	//	$user->name = $name;
		
		if(empty($name))
		{
			echo 'sex';//$this->view('help/index');

			print_r($_POST);
		}
		else
		{

			require_once '../app/models/user.php';
			$db = new user;
		

			
			

			//print_r($_POST);

			foreach ($_POST as $key => $value) 
			{
				$dane = explode(' ', $value);
				//print_r($dane);
				if($dane[1] == 'NULL') $dane[1] = NULL;

				$db->insert("INSERT INTO klienci (name,email,system) VALUES ('".$dane[0]."','".$dane[1]."','".$dane[2]."')");
			}
			header('Location: http://localhost/wwwv2.0/mvcbeta/public/');
			
		//$this->view('help/index',$name);
		}
	}

	


	
	
}