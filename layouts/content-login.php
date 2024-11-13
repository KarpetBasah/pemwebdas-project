<!-- Login here -->
<form name="loginform" method="post" action="../configs/login-check.php" onsubmit="return Validasi()">
  <div class="form-group">
    <label for="userId">Username</label>
    <input type="text" class="form-control" name="user" id="userID" placeholder="Masukkan Username">
    <span id="usr-error" class="error-message"></span>
  </div>
  <div class="form-group">
    <label for="passID">Password</label>
    <input type="password" class="form-control" name="pass" id="passID" placeholder="Masukkan password">
    <span id="pass-error" class="error-message"></span>
  </div>
  <button type="submit" class="btn btn-info" value="Login">Login</button>
</form>
<!-- End of login -->

<script type="text/javascript">
  function Validasi() {
    const user = document.getElementById("userID").value;
    const usererror = document.getElementById("usr-error");
    const pass = document.getElementById("passID").value;
    const passerror = document.getElementById("pass-error");

    usererror.textContent = "";
    passerror.textContent = "";

    let isValid = true;
    if (user === "") {
      usererror.textContent = "Username harus terisi";
      isValid = false;
    }
    if (pass === "") {
      passerror.textContent = "Password harus terisi";
      isValid = false;
    }
    return isValid;
  }
</script>