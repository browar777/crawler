<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MVC</title>

    <!-- Bootstrap -->
    <link href="<?PHP echo URL; ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?PHP echo URL; ?>public/bootstrap/css/mycss.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <div class="container">
    <div class="pole">
      <ul>
        <li>
          <a href="http://localhost/wwwv2.0/mvcbeta/public">index</a>
            <div class="podmenu">
              <ul>
                <li>pierwsz pole</li>
                <li>pierwsz pole</li>
                <li>pierwsz pole</li>
              </ul>

              <ul>
                <li>pierwsz pole</li>
                <li>pierwsz pole</li>
                <li>pierwsz pole</li>
              </ul>
              
            </div>

        </li>
        <li>
          <a href="http://localhost/wwwv2.0/mvcbeta/public/help">help</a>

          <div class="podmenu">
             <ul>
                <li>drugie pole</li>
                <li>drugie pole</li>
                <li>drugie pole</li>
              </ul>
           </div>
           
        </li>
        <li>
          <a href="http://localhost/wwwv2.0/mvcbeta/public/login">login</a>

          <div class="podmenu">
             <ul>
                <li>trzecie pole</li>
                <li>trzecie pole</li>
                <li>trzecie pole</li>
            </ul>
          </div>
           
        </li>
      </ul>
      
    </div>
</div>