function bookpage(id) {
  test = id;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("huj book");
      showBook(this, test);
    }
  };
  xhttp.open("GET", "book.xml", true);
  xhttp.send();
}
function showBook(xml, id) {
  console.log(id);
  var xmlDoc = xml.responseXML;
  console.log(xmlDoc);
  var x = xmlDoc.getElementsByTagName("book");

  var title, author, desc;

  console.log(x[0]);
  var gowno;

  // huj czekpoint fr
  for (var i = 0; i < id; i++) {
    gowno = x[i].getAttribute("bookId");
    console.log("pobralem " + gowno);
    if (id == gowno) {
      title = x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
      author = x[i].getElementsByTagName("author")[0].childNodes[0].nodeValue;
      desc = x[i].getElementsByTagName("desc")[0].childNodes[0].nodeValue;
    }
  }
  console.log(title);
  console.log(author);
  console.log(desc);

  document.getElementById("title").innerHTML = title;
  document.getElementById("author").innerHTML = author;
  document.getElementById("desc").innerHTML = desc;
}
