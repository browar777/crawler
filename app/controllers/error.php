<?PHP

class Error extends Controller
{
	public function index($name = '')
	{
	//	$user = $this->model('User');
	//	$user->name = $name;
		
		if(empty($name))
		{
			$this->view('error/index');
		}
		else
		{
		$this->view('error/index',$name);
		}
	}

	


	
	
}