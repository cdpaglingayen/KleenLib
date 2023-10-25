function showPassword() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}

function Forgotpass() {
    alert("Forgot Password? Kindly contact the ADMIN to reset password");
}
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }