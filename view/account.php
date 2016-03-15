<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <title>SwissNotes - Account</title>
    <?php
        print fread(fopen("view/head.html", "r"), filesize("view/head.html"));
    ?>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ language_url : 'view/de.js', language: 'de', selector:'textarea'});</script>
    <script src="view/account.js"></script>
</head>
<body>
<header>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-7"><h1 style="padding:0px">SwissNotes</h1></div>
        <div class="col-md-1 padding20">
            <a href="user/logout"><button class="login">Abmelden</button></a>
        </div>
        <div class="col-md-2"></div>
    </div>
</header>
<div class="row">
    <div class="col-md-2"></div>
    <div id="account_nav" class="col-md-2">
        <ul class="ac_nav_li">
            <li id="0"> + Neue Notiz</li>
            <?php
            foreach($_SESSION["notes"] as $note) {
                print '<li id="'.$note["noteID"].'">' . htmlspecialchars($note['name']) .'</li>';
            }
            ?>
        </ul>
    </div>
    <div id="note_container" class="col-md-6">
        <div id="0">
            <h2>Neue Notiz erstellen</h2>
            <form action="note/save" method="post">
                <input id="note_title" name="note_title" class="note_title" type="text" placeholder="Titel" required/>
                <textarea id="note_content" name="note_content" class="txtareasize"></textarea>
                <input id="submit" style="margin-right:0px;" type="submit" value="Speichern">
            </form>
            <br>
        </div>
        <?php
            foreach($_SESSION["notes"] as $note) {
                print '
                <div id="'.$note["noteID"].'">
                    <form action="note/edit" method="post">
                        <input name="noteID" value="'.$note["noteID"].'" type="hidden"/>
                        <input id="note_title" name="note_title" class="note_title" type="text" value="'.htmlspecialchars($note['name']).'" required/>
                        <textarea name="note_content" style="height:500px;">' . htmlspecialchars($note['content']) . '
                        </textarea>
                        <input id="submit" style="margin-right:0px;" type="submit" value="Speichern">
                    </form>
                    <form action="note/delete" method="post">
                        <input id="noteID" name="noteID" value="'.$note["noteID"].'" type="hidden"/>
                        <input id="submit" style="float:left;display:inline;" type="submit" value="Löschen">
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