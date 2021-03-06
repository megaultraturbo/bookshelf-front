<?php

    session_start();
        
if (isset($_POST['email']))
{
    //udana walidaxcja
    $gitara=true;

    //poprawnosc uname
    $login = $_POST['login'];
        if(strlen($login)<6 || (strlen($login)>20)){
        $gitara=false;
        $_SESSION['e_login']="login must be 6-20 characters long";
        }
        if (ctype_alnum($login)==false)
		{
			$gitara=false;
			$_SESSION['e_login']="login może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$gitara=false;
			$_SESSION['e_email']="Invalid email address";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$gitara=false;
			$_SESSION['e_password']="Password must be 8 to 20 characters long";
		}
		
		if ($haslo1!=$haslo2)
		{
			$gitara=false;
			$_SESSION['e_password']="Paswords do not match";
		}	

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
/* 		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$gitara=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}				
		 */
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_login'] = $login;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		//if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT UserId FROM user WHERE Email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$gitara=false;
					$_SESSION['e_email']="Email has already been used to register";
				}		

				//Czy login$login jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT UserId FROM user WHERE Username ='$login'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_loginow = $rezultat->num_rows;
				if($ile_takich_loginow>0)
				{
					$gitara=false;
					$_SESSION['e_login']="Username already exists";
				}

                echo $login;
                echo $email;
                echo $haslo1;
                echo $haslo2;
                
				
				if ($gitara==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					 if ($polaczenie->query("INSERT INTO user VALUES (NULL, '$login', '$email', '$haslo_hash')"))
					{
						$_SESSION['udanarejestracja']=true;
						
					}
					else
					{
						throw new Exception($polaczenie->error);
                        header('Location: ../cipa.php');
					} 
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	
	
	

}

?>

<!doctype html>
  <html>
    <head>
      <title>Bookshelf - register</title>
      <link rel="stylesheet" href="../css/style.css" />
      <link rel="stylesheet" href="../css/palette.css" />
      <link rel="stylesheet" href="../css/register.css" />
    </head>
    <body>

	<?php
		if (!isset($_SESSION['udanarejestracja'])){
			echo '<div class="center round shadow bg-lbrown">';
			echo '<a class="infotext constantina20 color-grey">Join Bookshelf! 📚</a>';
			echo '<form id="registerform" class="flexitems" method="post">';
			echo '<input type="text" name="login" placeholder="uesrname"/>';
			echo '<input type="text" name="email" placeholder="email"/>';
			echo '<input type="password" name="haslo1" placeholder="password"/>';
			echo '<input type="password" name="haslo2" placeholder="confirm password"/>';
			echo '<input type="submit" value="Sign up"/> ';
			echo '</form>';
			echo '</div>';
		}
	?><!-- 
    <div class="center round shadow bg-lbrown">
        <form id="registerform" class="flexitems" method="post">
            <input type="text" name="login" placeholder="uesrname"/>
            <input type="text" name="email" placeholder="email"/>
            <input type="password" name="haslo1" placeholder="password"/>
            <input type="password" name="haslo2" placeholder="confirm password"/>
            <input type="submit" value="Register"/> 
        </form>
    </div> -->

		<?php
		if (isset($_SESSION['e_login']) || (isset($_SESSION['e_email'])) || (isset($_SESSION['e_password'])) || (isset($_SESSION['udanarejestracja']))){
			echo'<div class="center flexitems round bg-lbrown shadow">';
		}
			

			if (isset($_SESSION['e_login'])){
				echo '<a class="constantina20">🛈 '.$_SESSION['e_login'].'</a>';
				unset($_SESSION['e_login']);
			}
			if (isset($_SESSION['e_email'])){
				echo '<a class="constantina20">🛈 '.$_SESSION['e_email'].'</a>';
				unset($_SESSION['e_email']);
			}
			if (isset($_SESSION['e_password'])){
				echo '<a class="constantina20">🛈 '.$_SESSION['e_password'].'</a>';
				unset($_SESSION['e_password']);
			}
			if (isset($_SESSION['udanarejestracja'])){
				unset($_SESSION['udanarejestracja']);
				echo '<a clas="button" href="../index.php">Success! You can log in now</a>';
			}
			echo '</div>';
		?>
	

    </body>
    <header class="flex bg-lbrown shadow">
        <logo class="logo-text color-grey">
          <a class="button" href="../index.php">Bookshelf</a>
        </logo>
      </header>
</html>