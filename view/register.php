<html>
<head>
  <title>Registrieren</title>
  <base href="/-K307/">
  <link rel="icon" type="image/png" href="view/static/images/favicon.png">
  <link rel="stylesheet" type="text/css" href="view/static/styles.css">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
</head>
<body>
  <div id="register_container">
  <img id="icon" src="view/static/images/register.png" />
    <h2>Registrieren</h2>
    <form id="register_form" action="user/register" method="post">
      <label for="username">Benutzername </label><br>
      <input id="username" class="form_elements" type="text" name="username" required/><br>
      <label for="password">Passwort </label><br>
      <input id="password" class="form_elements" type="password" name="password" required/><br>
      <label for="cpassword">Passwort wiederholen</label><br>
      <input id="cpassword" class="form_elements" type="password" name="cpassword" required/><br>
      <input id="submit" type="submit" value="Registrieren">
    </form>
  </div>
</body>
</html>