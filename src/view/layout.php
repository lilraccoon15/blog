<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Camille</title>
</head>
<body>
    <header>
        <?php require(ROOT."/src/view/shared/_header.php") ?>
    </header>

    <main>
        <?php
        echo $content;
        ?>
    </main>

    <footer>
        <?php require(ROOT."/src/view/shared/_footer.php") ?>
    </footer>
    
</body>
</html>