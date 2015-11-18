<?PHP

class Login extends Controller
{
	public $client = array();

	public function index($name = '')
	{
	//	$user = $this->model('User');
	//	$user->name = $name;
		
		if(empty($name))
		{
			$this->view('login/index');
		}
		else
		{
		$this->view('login/index',$name);
		}
	}

	public function post()
	{
		//zwiekszenie limitu czasu na przeszukanie adresuw
		ini_set('max_execution_time', 350);

			//POBIERANIE LINKUW Z OFETAMI//
			$url = $this->getUrl();



			echo '<pre>';
			//print_r($url);
			echo '</pre>';
		
//$url = array('http://allegro.pl/domena-portal-taniedoladowanie24-pl-i5798853102.html');
			
echo '
			<form action="insert" method="POST">';
		//PRZESZUKIWANIE POBRANYCH WCZESNIEJ LINKUW//
		$this->getUsers($url);

 echo ' </br>
  <input type="submit" value="Submit">
</form>';
			
		

	
	}


	public function getUsers($url)
	{
		// dodaje tymczasowo uzytkowinkuw

		require_once '../app/models/user.php';
		$db = new user;
		

		$userTab = $db->sql("SELECT name FROM klienci");
		$licznik = 0;

		foreach ($url as $urlkey => $urlvalue) 
			{
				
				$licznik++;

				 $text = file_get_contents($urlvalue);
				//skrucenie pobranego textu (tymczasowo wyaączone) 
				// $text = substr($text,0,60000);


				 	//zastapienie pustych przestrzeni przecinkami
					$text = preg_replace('/\s+/', ',', $text); 

					//zastapienie ponizszych znakuw przecinkami i rozbicie tekstu na tablice
					$delimiters = array('|',':','[',']','(',')','+','=','<','>','?','!','"','\'','/','~');
					$ready = str_replace($delimiters, ',', $text);  
					$launch = explode(',', $ready);

					//ograniczenie obszaru poszukiwania uzytkownika  (tymczasowo wyaączone) 
					//$launch = array_slice($launch, 8000, 4000); 

					//przeszukiwanie calej tablicy w poszukiwani uzytkownika
					foreach ($launch as $key => $value) 
					{
						//$value = strtolower($value); //
						//echo '</br>'.$value;
						if($value == 'sprzedający' || $value == 'Sprzedający')
						{
							if($launch[$key+1] == 'nie')
							{
								continue;
							}

							if($launch[$key+3] == 'href')
							{
								$username = $launch[$key+17];
							}
							else
							{
								$username = $launch[$key+4];
							}

							
							if (!in_array($username , $userTab))
							{
								//dodaje znalezionego sprzedawce do tablcy by nie przeszukiwac jego oferty kilku krotnie
								$userTab[] = $username;
								echo '<hr>New  user name is :'.$username.' | email faund :  ';
								//po znalezieniu user ,szuka  maila na stronie oferty
								$email = $this->getEmail($text); 
									if(empty($email))
									{
										//jezeli na stronie oferty nie znajdzie usera,szuka w mypage
										$mypage = $this->getMypage($text);
											if(!empty($mypage))
											{
												$mypagecontent = file_get_contents($mypage);
												$email = $this->getEmail($mypagecontent);
												echo $email;
											}
											else
											{
												echo ' nie znaleziono maila na stonie oferty , sprzedający nie posiada własnej strony';
												$email = 'NULL';
											}
									}
									else
									{
										echo $email;
									}

									if($licznik <= $this->client['automater.pl'])
									{
										echo '   klient automater.pl';
										$system = 'automater.pl';
									}
									else
									{
										echo '    klient allex';
										$system = 'allex';
									}

							//dodatki		
								echo '</br>';
								echo '<a href="'.$urlvalue.'" target="_blank" >'.$urlvalue.'</a>';

								echo '</br><strong>Insert user and email do DB </strong><input type="checkbox" name="data'.$licznik.'" value="'.$username.' '.$email.' '.$system.'">';
								

							}	
							break;
						}					


					}
				
			}
	}




public function getMypage($text)
{
	$launch = explode('"', $text);

	echo '<pre>';
	//print_r($launch);
	echo '</pre>';
	
	$url = array_filter($launch,function($i) {return filter_var($i, FILTER_VALIDATE_URL); });
	
	//pofiltrowana strone na url sprwadza w kturym adresie znajduje sie mypage
	foreach ($url as $key => $value)
	{
		if(preg_match('/mypage/', $value))
		{
			return $value; 
		}
	}

//jezeli powyzsza metoda zawiedzie przeszukuje cala strone 
	foreach ($launch as $key => $value)
	{
		if(preg_match('/my_page.php/', $value))
		{
			return 'http://allegro.pl'.$value; 
		}
	}




}





	public function getUrl()
	{

			if(!empty($_POST['file']))
			{
				//pobieranie zawartosci pliku
				$text = file_get_contents($_POST['file']); 
			}
			else if (strlen(trim($_POST['code'])))
			{
				$text = $_POST['code']; 
			}
			else
			{
				echo 'ERROR puste pola musisz cos wbrać';
				return 0;
			}

		
		$this->countApp($text); //podliczabnie ofert od automater i allexa

		//rozbijanie pliku na tablize
		$launch = explode('"', $text);


		//filtrowanie tablicy za pomoca adreuw url
		$url = array_filter($launch,function($i) {return filter_var($i, FILTER_VALIDATE_URL); });


		// filtrowanie adreuw za pomoca rozszerzen html
			$url = array_filter($url,function($i) 
				{
					$file_parts = pathinfo($i);
					if(isset($file_parts['extension']))
					{		
						if($file_parts['extension'] == 'html') 
						return $i; 
					}
				});

//!!!!!!!!!!!!!testowe ograniczenie do 20 adreuw
			//$url = array_slice($url, 0, 10); 


		return $url;
	}






	public function getEmail($text)    //Funkcja tworzy tablice z textu
	{
		
		$text = preg_replace('/\s+/', ',', $text);  //zast뱵je wszystkie odst뱹 przecinkami
		
		$delimiters = array('|',':','[',']','(',')','+','<','>','?','!','"','\'','/','~');
		$ready = str_replace($delimiters, ',', $text);  //zast뱵je powyrzsze znaki przecij
		$launch = explode(',', $ready);

		$email = array_filter($launch,function($i) 
		{
			return filter_var($i, FILTER_VALIDATE_EMAIL); 
		});

		$email = array_filter($email,function($i) 
		{
					$file_parts = pathinfo($i);
					if(($file_parts['extension'] != 'png') && ($file_parts['extension'] != 'jpg') && ($file_parts['extension'] != 'jpeg'))
					{
						return $i;
					}
		});

	

		return reset($email);
		
	}







	public function countApp($text)  //zapisuje do zmiennej globalnej obektu tablice ofert nalezacych do automatera i allexa
	{
		$delimiters = array('|',':','[',']','(',')','+','<','>','?','!','"','\'','/','~');
		$test = preg_replace('/\s+/', ',', $text); 
		$test = str_replace($delimiters, ',', $test); 
		$test = explode(',', $test);
		//print_r($test);


		$key = array_search('automater.pl', $test);
		$this->client['automater.pl'] = $test[$key+10];
		
		$key = array_search('allex', $test);
		$this->client['allex'] = $test[$key+10];

		


	}


	

	


	
	
}