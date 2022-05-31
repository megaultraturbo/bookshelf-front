<?php

    session_start();
        
if (isset($_POST['name']))
{
    //udana walidaxcja
    $gitara=true;
    

    $name = $_POST['name'];
    $email1= $_POST['email1'];
    $email1B= filter_var($email1, FILTER_SANITIZE_EMAIL);
    $email2 = $_POST['email2'];
    $email2B = filter_var($email2, FILTER_SANITIZE_EMAIL);

    if ((filter_var($email1B, FILTER_VALIDATE_EMAIL)==false) || ($email1B!=$email1))
		{
			$gitara=false;
			$_SESSION['e_email']="Passwords do not match or email address is invalid";
		}

    if ((filter_var($email2B, FILTER_VALIDATE_EMAIL)==false) || ($email2B!=$email2))
		{
			$gitara=false;
			$_SESSION['e_email']="Passwords do not match or email address is invalid";
		}

    $_SESSION['c_name'] = $name;
    $_SESSION['c_email'] = $email1;

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);


    try{
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
                if ($gitara==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					 if ($polaczenie->query("INSERT INTO contact VALUES (NULL, '$name', '$email1')"))
					{
						$_SESSION['udanarejestracja']=true;
						
					}
					else
					{
						throw new Exception($polaczenie->error);
                        header('Location: ../cipa.php');
					} 
					
				}
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

	
    <div class="center round shadow bg-lbrown">
        <a class="infotext constantina20 color-grey">Let us contact you!</a>
        <form id="registerform" class="flexitems" method="post">
            <input type="text" name="name" placeholder="your name"/>
            <input type="text" name="email1" placeholder="email"/>
            <input type="text" name="email2" placeholder="confirm email"/>
            <input type="submit" value="Confirm"/> 
            
        </form>
        <?php
/* 	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
echo '<a>zalogowano</a>';
	} */
?>
    </div> 

		<?php
			if (isset($_SESSION['e_email'])){
				echo '<a class="constantina20">🛈 '.$_SESSION['e_email'].'</a>';
				unset($_SESSION['e_email']);
			}if (isset($_SESSION['udanarejestracja'])){
				unset($_SESSION['udanarejestracja']);
				echo '<a clas="button" href="../index.php">Success! You can log in now</a>';
			}
		?>
	</div>

    </body>
    <header class="flex bg-lbrown shadow">
        <logo class="logo-text color-grey">
          <a class="button" href="../index.php">Bookshelf</a>
        </logo>
      </header>
</html>