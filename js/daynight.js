function night() {
  var element = document.body;
  $("body").addClass("dark-mode");
  $("#profileSB").addClass("dark-mode");
  $("#backbutton").addClass("dark-mode");
  $("#bookpage").addClass("bg-night");

  //$(this).find("body").addClass("dark-mode");
}

function day() {
  $("body").removeClass("dark-mode");
  $("#profileSB").removeClass("dark-mode");
  $("#backbutton").removeClass("dark-mode");
  $("#bookpage").removeClass("bg-night");
}
