function update() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("huj");
      showUser(this);
    }
  };
  xhttp.open("GET", "user1.xml", true);
  xhttp.send();
}
function showUser(xml) {
  var xmlDoc = xml.responseXML;
  var x = xmlDoc.getElementsByTagName("user");

  console.log(x[0]);
  // huj czekpoint fr
  var uname = x[0].getAttribute("uname");
  var bio = x[0].getAttribute("bio");

  console.log(uname);
  console.log(bio);

  document.getElementById("username").innerHTML = uname;
  document.getElementById("bio").innerHTML = bio;
}
