<html>
<head>
  <title>Anmelden</title>
  <?php
    print fread(fopen("view/head.html", "r"), filesize("view/head.html"));
  ?>
</head>
<body>
  <?php
    print fread(fopen("view/header.html", "r"), filesize("view/header.html"));
  ?>
  <div id="form_container">
  <img id="icon" src="view/static/images/login.png" alt="Anmelden"/>
    <h2>Anmelden</h2>
    <form id="login_form" action="user/login" method="post">
      <label for="username">Benutzername</label><br>
      <input id="username" class="form_elements" type="text" name="username" required tabindex="1"/><br>
      <label for="password">Passwort</label><br>
      <input id="password" class="form_elements" type="password" name="password" required tabindex="2"/><br>
      <input id="submit" type="submit" value="Anmelden">
    </form>
  </div>
</body>
</html>
