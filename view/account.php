<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <title>SwissNotes - Account</title>
    <base href="/-K307/">
    <link rel="stylesheet" type="text/css" href="view/static/bootstrap.min.css">
    <link rel="icon" type="image/png" href="view/static/images/favicon.png">
    <link rel="stylesheet" type="text/css" href="view/static/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <script src="view/account.js"></script>
</head>
<body>
<header>
    <?php
    if(!isset($_SESSION)){
        session_start();
    }
    $_SESSION["userID"] = $this->userData["userID"];
    ?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-7"><h1 style="padding:0px">SwissNotes - Hello, <?php print $this->userData["username"]?></h1></div>
        <div class="col-md-1 padding20">
            <a href=""><button id="login">Log out</button></a>
        </div>
        <div class="col-md-2"></div>
    </div>
</header>
<div class="row">
    <div class="col-md-2"></div>
    <div id="account_nav" class="col-md-2">
        <ul class="ac_nav_li">
            <li id="0"> + New Note</li>
            <?php
            foreach($this->notes as $note) {
                print '<li id="'.$note["noteID"].'">' . $note['name'] .'</li>';
            }
            ?>
        </ul>
    </div>
    <div id="note_container" class="col-md-6">
        <div id="0">
            <h2>Neue Notiz erstellen</h2>
            <form action="note/save" method="post">
                <input id="note_title" name="note_title" class="note_title" type="text" placeholder="Title" required/>
                <textarea id="note_content" name="note_content" class="txtareasize"></textarea>
                <input id="submit" type="submit" value="Save">
            </form>
            <br>
        </div>
        <?php
        foreach($this->notes as $note) {
            print '
            <div id="'.$note["noteID"].'">
                <form action="note/save" method="post">
                    <input id="note_title" name="note_title" class="note_title" type="text" value="'.$note['name'].'" required/>
                    <p><i>' . $note['date'] . '</i></p>
                    <textarea style="height:500px;">' . $note['content'] . '
                    </textarea>
                    <input id="submit" type="submit" value="Save">
                </form>
            </div>
            ';
        }
        ?>
    </div>
    <div class="col-md-2"></div>
    </div>
</body>
</html>