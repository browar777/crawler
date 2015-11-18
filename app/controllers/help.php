<?PHP

class Help extends Controller
{
	public function index($name = '')
	{
	//	$user = $this->model('User');
	//	$user->name = $name;
		
		if(empty($name))
		{
			$this->view('help/index');
		}
		else
		{
		$this->view('help/index',$name);
		}
	}

	


	
	
}