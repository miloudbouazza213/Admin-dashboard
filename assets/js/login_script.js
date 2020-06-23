var user_id;
$(function () {
  $("#login_form").submit(function (e) {
    e.preventDefault();
    var username = $(this).find("input[name=username]").val();
    var password = $(this).find("input[name=password]").val();
    if (username == "" && password == "") {
      PNotify.error({
        text: "Please complete the form",
        type: 'notice',
        delay: 2000,
        hide: true,
        remove: true
      });
    } else if (username != "" && password != "") {
      $.ajax({
        async: false,
        url: "connexion.php",
        method: "POST",
        data: {
          "username": username,
          "password": password
        },
        success: function (data) {
          user_id = data;
          // $('#login_form')[0].reset();
        }
      })
      if (user_id != "warning") {
        // $("#erreur").css({"display":"block"});
        window.location.href = "welcome.php";
      } else {
        PNotify.error({
          text: "Wrong username/password combinaison",
          type: 'notice',
          delay: 2000,
          hide: true,
          remove: true
        });
        $('#login_form')[0].reset();
      }
    }
  });

  $("#register_form").submit(function (e) {
    e.preventDefault();
    var username = $(this).find("input[name=usernamer]").val();
    var password = $(this).find("input[name=passwordr]").val();
    var pwd = $(this).find("input[name=pwdr]").val();
    var email = $(this).find("input[name=emailr]").val();
    if (username == "" && password == "" && pwd == "" && email == "") {
      PNotify.error({
        text: "Please complete the form",
        type: 'notice',
        delay: 2000,
        hide: true,
        remove: true
      });
    } else if (username != "" && password != "" && pwd != "" && email != "") {
      $.ajax({
        async: false,
        url: "script/register/register_script.php",
        method: "POST",
        data: {
          "usernamer": username,
          "passwordr": password,
          "pwdr": pwd,
          "emailr": email
        },
        success: function (data) {
          user_id = data;
          //$('#register_form')[0].reset();
          console.log(user_id);
        }
      })
      if (user_id == "warning") {
        PNotify.error({
          text: "The two passwords do not match!",
          type: 'notice',
          delay: 2000,
          hide: true,
          remove: true
        });
        //window.location="../include/login.php";
      } else if (user_id == "bad") {
        PNotify.error({
          text: " Username or email already exists!",
          type: 'notice',
          delay: 3000,
          hide: true,
          remove: true
        });
      } else if (user_id == "warning_lenght_usernamewarning") {
        PNotify.error({
          text: "Username must contain at least four characters!",
          type: 'notice',
          delay: 3000,
          hide: true,
          remove: true
        });
      } else if (user_id == "warning_lenght_passwordwarning") {
        PNotify.error({
          text: "Password must contain at least eight characters!",
          type: 'notice',
          delay: 3000,
          hide: true,
          remove: true
        });
      } else if (user_id == "warning_lenghtwarning") {
        PNotify.error({
          text: " Username must contain at least four characters! ",
          type: 'notice',
          delay: 5000,
          hide: true,
          remove: true
        });
        PNotify.error({
          text: " Password must contain at least eight characters! ",
          type: 'notice',
          delay: 5000,
          hide: true,
          remove: true
        });

      } else {
        PNotify.success({
          text: "You have been registered!",
          type: 'notice',
          delay: 2000,
          hide: true,
          remove: true
        });

        function redir() {
          self.location.href = "login.php";
        }
        setTimeout(redir, 3000)
      }
    }
  });
});