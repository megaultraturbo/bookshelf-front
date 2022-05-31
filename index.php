<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: homepage.php');
		exit();
	}

?>

<!doctype html>
  <html>
    <head>
      <title>Bookshelf - home</title>
      <link rel="stylesheet" href="css\style.css" />
      <link rel="stylesheet" href="css\palette.css" />
      <link rel="stylesheet" href="css\profile-sidebar.css" />
      <link rel="stylesheet" href="css\bookpage.css" />
    </head>
    <body>
      
      <div id="bookpage" class="grid bg-day color-grey">
        <img class="bigpic round"
        src="https://images.unsplash.com/photo-1617801003287-1a71d7792fdc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80" alt="">
        <a id="desc" class="constantina20">desc</a>
        <a id="title" class="constantina30">title</a>
        <a id="author" class="constantina20">author</a>
        <a id="close" onclick="$('#bookpage').hide()" class="noselect">CLOSE</a>
    </div>

      <div id="container">
        <div class="section-multiple">
          <a class="title constantina30 color-grey">New arrivals</a>
          <div class="images-multiple flex">
            <img
              id="01"
              onclick="bookpage('01')"
              class="image-small round shadow"
              src="https://images.unsplash.com/photo-1617801003287-1a71d7792fdc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80"
            />
            <img
            id="02"
            onclick="bookpage('02')"
              class="image-small round shadow"
              src="https://images.unsplash.com/photo-1617801003287-1a71d7792fdc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80"
            />
            <img
              id="03"
              onclick="bookpage('03')"
              class="image-small round shadow"
              src="https://images.unsplash.com/photo-1617801003287-1a71d7792fdc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80"
            />
            <img
              id="04"
              onclick="bookpage('04')"
              class="image-small round shadow"
              src="https://images.unsplash.com/photo-1617801003287-1a71d7792fdc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80"
            />
            <img
              id="05"
              onclick="bookpage('05')"
              class="image-small round shadow"
              src="https://images.unsplash.com/photo-1617801003287-1a71d7792fdc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80"
            />
          </div>
          <a href="html/catalogue.html" class="see-all round shadow constantina20 color-grey bg-ivory">
            see all
          </a>
        </div>
        <div class="section-single">
          <a class="title constantina30 color-grey">Book of the day</a>
          <!--a href="html/sample-book.html"-->
          <img
            id="06"
            onclick="bookpage('06')"
            class="image-single round shadow"
            src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80"
          />
          </!--a>
        </div>
        <div class="section-multiple">
          <a class="title constantina30 color-grey">Picks for you</a>
          <div class="images-multiple flex">
            <img
              class="image-small round shadow"
              src="https://images-na.ssl-images-amazon.com/images/I/81jAxPkzJHL.jpg"
            />
            <img
              class="image-small round shadow"
              src="https://images-na.ssl-images-amazon.com/images/I/81jAxPkzJHL.jpg"
            />
            <img
              class="image-small round shadow"
              src="https://images-na.ssl-images-amazon.com/images/I/81jAxPkzJHL.jpg"
            />
            <img
              class="image-small round shadow"
              src="https://images-na.ssl-images-amazon.com/images/I/81jAxPkzJHL.jpg"
            />
            <img
              class="image-small round shadow"
              src="https://images-na.ssl-images-amazon.com/images/I/81jAxPkzJHL.jpg"
            />
          </div>
          <a href="html/catalogue.html" class="see-all round shadow constantina20 color-grey bg-ivory">
            see all
          </a>
        </div>
        <div class="section-multiple">
          <a class="title constantina30 color-grey">New on Bookshelf</a>
          <div class="images-multiple flex">
            <img
              class="image-small round shadow"
              src="https://images-na.ssl-images-amazon.com/images/I/81jAxPkzJHL.jpg"
            />
            <img
              class="image-small round shadow"
              src="https://images-na.ssl-images-amazon.com/images/I/81jAxPkzJHL.jpg"
            />
            <img
              class="image-small round shadow"
              src="https://images-na.ssl-images-amazon.com/images/I/81jAxPkzJHL.jpg"
            />
            <img
              class="image-small round shadow"
              src="https://images-na.ssl-images-amazon.com/images/I/81jAxPkzJHL.jpg"
            />
            <img
              class="image-small round shadow"
              src="https://images-na.ssl-images-amazon.com/images/I/81jAxPkzJHL.jpg"
            />
          </div>
          <a href="html/catalogue.html" class="see-all round shadow constantina20 color-grey bg-ivory">
            see all
          </a>
        </div>
      </div>
      <nav>
        <!-- profil - pokazanie menu, zasysanie danych z xml -->
        <a id="profileButton" onclick="profileSB.style.visibility='visible'; /* update('user1.xml'); */">
        <div class="navbutton round shadow constantina20 color-grey bg-ivory">
          <img class="navicon" src="resources\icons\profile.png"></img>
          profile
        </div>
        </a>
        <a>
        <div class="navbutton round shadow constantina20  color-grey bg-ivory">
          <img class="navicon" src="resources\icons\shelf.png"></img>
          your shelf
        </div>
        </a>
        <a>
        <div class="navbutton round shadow constantina20  color-grey bg-ivory">
          <img class="navicon"
          src="resources\icons\search.png"></img>
          <!--<a>search</a>-->
          <form onsubmit="searchtitle(document.getElementById('search').value);return false;">
            <input type="text" id="search" 
          class="round constantina20 color-grey bg-ivory"
          placeholder="search"
          >
          <input type="submit" hidden />
          </form>
        </div>
        </a>
        <a>
        <div onclick="day()"
        class="navbutton round shadow constantina20  color-grey bg-ivory">
        <ion-icon name="sunny-outline" class="navicon color-grey"></ion-icon>
          <a>day</a>
        </div>
        <div onclick="night()"
        class="navbutton round shadow constantina20  color-grey bg-ivory">
        <ion-icon name="moon-outline" class="navicon color-grey"></ion-icon>
          <a>night</a>
        </div>
        </a>

      </nav>
      <!-- profil - wstecz -->
      <div id="profileSB">
        <button id="backbutton" class="back bg-white" onclick="profileSB.style.visibility='hidden';">
          
          <span class="backicon color-grey">
            <ion-icon name="arrow-back-outline"></ion-icon></span>
            <span class="backtext constantina30 color-grey">Back</span>
        </button>
        <div class="details">
          <img src="resources/icons/profile.png" id="pfp" />
          <br>
          <a id="username"></a>
          <a id="unameError"></a>

          <!--
          <br>
          <a id="bio"
            >user bio
          </a> -->
          <form id="loginform" action="php/login.php" method="post">
          Login: <br /> <input type="text" name="login" /> <br />
		      Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
		      <input type="submit" value="Zaloguj się" /> 

          </form>
          <a href=php/register.php>
            <button>Register</button>
          </a>



        </div>
      </div>
      <!-- szczegoly ksaizki i tlo -->


      <header class="flex bg-lbrown shadow">
        <logo class="logo-text color-grey">
          <a class="button">Bookshelf</a>
        </logo>
      </header>
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

      <footer class="bg-lbrown">
        <div class="footer-text constantina16 color-grey">
          <a class="title" href="/html/about.html">About Bookshelf</a>
          <br>
          <a>
            copyright jakub wanat 101471. fajowa stronka fajowe książki 💯🥶
          </a>
        </div>
      </footer>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      
      
      <script src="js/profile.js" type="text/javascript"></script>
      <!-- załadowanie szczegółów dot książki -->
      <script src="js/book.js" type="text/javascript"></script>
      <script>$("#bookpage").hide();</script>
      <!-- ciemny motyw -->
      <script src="js/daynight.js" type="text/javascript"></script>
      <script src="js/search.js" type="text/javascript"></script>
      <script src="js/outside.js" type="text/javascript"></script>
      
    </body>
  </html></d<!doctype
>
