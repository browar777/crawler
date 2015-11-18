<?PHP 



$x = file('allex.txt');



foreach ($x as $key => $value) 
{
	$value = trim($value);
	$value = trim($value,'�');
	$value = preg_replace('/\s+/', '\',\'', $value); 

	$pos = strpos($value, ',');
	if(!$pos)
	{
		$value = $value.'\',NULL';
		//echo '(\''.$value.'),';
	}
	else
	{
		//echo '(\''.$value.'\'),';
	}


	//echo '(\''.$value.'\'),';
		//echo '<pre>';
		//print_r($value);
		//echo '</pre>';
}

		echo '<pre>';
		//print_r($x);
		echo '</pre>';

		$x = 'Sprzedający';
		
		echo strtolower($x);

		$file_parts = pathinfo('kontakt@krolkrak.pl');
					print_r($file_parts);//$file_parts['extension'];
$text = 'http://localhost/wwwv2.0/mvcbeta/public/';
$ready = str_replace('http://', 'www.', $text);  
echo ' <iframe width="500" height="500" src="'.$ready.'">
        </iframe>';
echo '</br>';

$txt = 'ĄĘĆŁąćęLKJG';
echo mb_strtolower($txt, 'utf-8');  

?>
	
       
   