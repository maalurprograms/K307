<html>
<head>
  <title>Anmelden</title>
  <base href="/-K307/">
  <link rel="icon" type="image/png" href="view/static/images/favicon.png">
  <link rel="stylesheet" type="text/css" href="view/static/styles.css">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
</head>
<body>
  <div id="form_container">
  <img id="icon" src="view/static/images/icon.png" />
    <h2>Anmelden</h2>
    <form id="login_form" action="user/login" method="post">
      <label for="username">Benutzername</label><br>
      <input id="username" class="form_elements" type="text" name="username" required/><br>
      <label for="password">Passwort</label><br>
      <input id="password" class="form_elements" type="password" name="password" required/><br>
      <input id="submit" type="submit" value="Anmelden">
    </form>
  </div>
</body>
</html>
