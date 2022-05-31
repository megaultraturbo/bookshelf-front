$('#loginform').submit(function(e) {
    e.preventDefault();
    var post_data = $('#loginform').serialize();
    $.post('php/login.php', post_data, function(uname) {
        console.log(uname);
        if (uname!=''){
            $('#username').show();
            $('#username').text('Hello, '+ uname);
            $('#loginform').hide();
            $('#unameError').hide();
        }
        else {
            $('#username').hide();
            $('#unameError').text('Invalid login credentials');
            $('#unameError').show();
        }
    });
  });