function searchtitle(text) {
  text = text;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("huj book");
      showBook2(this, text);
    }
  };
  xhttp.open("GET", "book.xml", true);
  xhttp.send();
}

// to
function showBook2(xml, text) {
  console.log(text);
  var xmlDoc = xml.responseXML;

  console.log(xmlDoc);
  var x = xmlDoc.getElementsByTagName("book");

  var title, author, desc;

  console.log(x[0]);
  var y;

  // czekpoint fr
  for (var i = 0; i < 6; i++) {
    y = x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
    console.log("pobralem " + y);
    if (text == y) {
      title = x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
      author = x[i].getElementsByTagName("author")[0].childNodes[0].nodeValue;
      desc = x[i].getElementsByTagName("desc")[0].childNodes[0].nodeValue;
    }
  }
  console.log(title);
  console.log(author);
  console.log(desc);

  //$("#bookpage").html('<object data="html/bookpage.html">');

  //$("#page").load("html/bookpage.html #bookpage");
  $("#bookpage").show();
  const ciba = "html/bookpage.html";

  document.getElementById("title").innerHTML = title;
  document.getElementById("author").innerHTML = author;
  document.getElementById("desc").innerHTML = desc;
}
