<!DOCTYPE html>
<html>
<head>
    <title>SwissNotes</title>
    <?php
        print fread(fopen("view/head.html", "r"), filesize("view/head.html"));
    ?>
<body>
    <?php
        print fread(fopen("view/header.html", "r"), filesize("view/header.html"));
    ?>
<div id="error_container">
    <img id="error_icon" src="view/static/images/error.png" alt="Fehler" />
    <?php
    print $this->errorMsg;
    ?>
</div>
</body>

