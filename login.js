function check_fields() {
  var un = check_username_pass("username");

  if (un) {
    window.location.href = "./booksLibrary.html";
     localStorage.setItem("Admin", document.forms['info_form']['state'].value);
  }
  else {
    alert("Incorrect username or password");
  }
}

function check_username_pass(ID) {
  var check = document.forms.login_form[ID].value;
  var bool = alpha_num_check(check) && ((check.charAt(0) == 'U' || check.charAt(0) == 'u') || check == "admin");
  var image = get_image(bool, ID);
  document.getElementById(ID + '_p').appendChild(image);

  if(check == "admin")
  {
    bool = document.forms.login_form.password.value == "admin";
    if(bool)
    {
      localStorage.setItem("Admin", bool);
    }
  }
  else
  {
    localStorage.setItem("Admin", false);
  }
    var image2 = get_image(bool, "password");
    document.getElementById("password_p").appendChild(image2);

  return bool;
}

function alpha_num_check(entry) {
  let regex = /^[a-z0-9\s]+$/i;
  if (entry != null && entry.match(regex)) {
    return true;
  } else {
    return false;
  }
}

function get_image(boolean, ID) {
  var image = document.getElementById("image" + ID);
  if (image == null) {
    image = new Image(20, 20);
    image.id = "image" + ID;
  }
  image.src = boolean ? './correct.png' : './wrong.png';
  return image;
}
