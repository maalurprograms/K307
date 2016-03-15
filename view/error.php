<html>
<head>
    <title>SwissNotes</title>
    <?php
        print fread(fopen("view/header.html", "r"), filesize("view/header.html"));
    ?>
<body>
<header>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7"><h1><b>SwissNotes</b></h1></div>
        <div class="col-md-3 padding20">
            <a href="default/login"><button class="login">Anmelden</button></a>
            <a href="default/register"><button class="login">Registrieren</button></a>
        </div>
        <div class="col-md-1"></div>
    </div>
</header>

<div id="error_container">
    <img id="error_icon" src="view/static/images/error.png" alt="Fehler" />
    <?php
    print $this->errorMsg;
    ?>
</div>
</body>

