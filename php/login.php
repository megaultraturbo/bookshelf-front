<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: ../index.php');
		exit();
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM user WHERE Username='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		 {
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
                $wiersz = $rezultat->fetch_assoc();

                if (password_verify($haslo, $wiersz['Password']))
				{
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['Username'] = $wiersz['Username'];
                    
                    unset($_SESSION['blad']);
                    $uname = $_SESSION['Username'];
                    $rezultat->free_result();
                    echo 'zalogowano';
                    header('Location: ../homepage.php');
                }
                else{
                    echo 'zle haslo';
                    $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					//header('Location: ../index.php');
                }

				header('Location: ../index.php');
			} 
            else {
				echo 'nie ma takiego usera';
				$_SESSION['blad'] = 'errorwua';
				header('Location: ../index.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>