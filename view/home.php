<html>
<head>
    <title>SwissNotes</title>
    <base href="/-K307/">
    <link rel="icon" type="image/png" href="view/static/images/favicon.png">
    <link rel="stylesheet" href="view/static/style.css"> <!-- Resource style -->

    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="view/static/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="view/static/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
    <?php
        echo $this->userData;
    ?>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7"><h1><b>SwissNotes</b></h1></div>
        <div class="col-md-3 padding20">
            <a href="default/login"><button id="login">Log in</button></a>
            <a href="default/register"><button id="login">Register</button></a>
        </div>
        <div class="col-md-1"></div>
    </div>
</header>
<div class="row fixed">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-2 nopadding">
                <img class="icon_h2" src="view/static/images/about.png" />
            </div>
            <div class="col-md-8">
                <h2 class="txt_center">About</h2>
            </div>
            <div class="col-md-2"></div>
        </div>
        <p>Beschreibung Hier</p>
    </div>
    <div class="col-md-2"></div>
</div>
</body>
</html>