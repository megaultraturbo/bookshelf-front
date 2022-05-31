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
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$gitara=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$gitara=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
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
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//Czy login$login jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT UserId FROM user WHERE Username ='$login'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_loginow = $rezultat->num_rows;
				if($ile_takich_loginow>0)
				{
					$gitara=false;
					$_SESSION['e_login']="Istnieje już gracz o takim loginu! Wybierz inny.";
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
						header('Location: ../index.php');
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
    </head>
    <body>
    <form id="registerform" method="post">
        <?php
            if (isset($_SESSION['e_login'])){
                echo '<a>'.$_SESSION['e_login'].'</a>';
                unset($_SESSION['e_login']);
            }
        ?>


        Login: <br /> <input type="text" name="login" /> <br />
        Email: <br /> <input type="text" name="email" /> <br />
        Hasło: <br /> <input type="password" name="haslo1" /> <br /><br />
        Potwierdź hasło: <br /> <input type="password" name="haslo2" /> <br /><br />
        
        <input type="submit" value="Register" /> 
    </form>

    </body>
</html>