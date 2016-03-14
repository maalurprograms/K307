<html>
<head>
    <title>SwissNotes</title>
    <base href="/-K307/">
    <link rel="icon" type="image/png" href="view/static/images/favicon.png">
    <link rel="stylesheet" href="view/static/style.css"> <!-- Resource style -->

    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="view/static/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="view/static/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7"><h1><b>SwissNotes</b></h1></div>
        <div class="col-md-3 padding20">
            <a href="default/login"><button class="login">Log in</button></a>
            <a href="default/register"><button class="login">Register</button></a>
        </div>
        <div class="col-md-1"></div>
    </div>
</header>

<div id="error_container">
    <img id="error_icon" src="view/static/images/error.png" />
    <?php
    print $this->errorMsg;
    ?>
</div>
</body>

