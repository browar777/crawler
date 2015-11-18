<?PHP

class Home extends Controller
{
	public function index($name = '')
	{
	//	$user = $this->model('User');
	//	$user->name = $name;
		
		if(empty($name))
		{
			$this->view('home/index');
		}
		else
		{
		$this->view('home/index',$name);
		}
	}

	


	
	
}