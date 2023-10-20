<?php
    include '../db.php';
    $db = new Database("test-mysql" , "note_db" , "root","admin");
    $db = $db->connect();

    $stmt = $db->query("SELECT * FROM profi");
    $urls = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP URL SHORTENER</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1 style="">PHP Shortener</h1>
    </header>
    <main>
        <form action="/add/index.php" method="post">
        <div class="input-group mb-3" style="width: 300px">
            <input type="text" class="form-control" name="long_url" id="long_url" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            <input class="btn btn-outline-secondary" type="submit" value="CUT" id="button-addon1">
        </div>
        </form>
        
        <div class="urls" style="overflow: hidden;" >
        <?php foreach ($urls as $url) : ?>
            <div>
                <div style="float: left;width: 18px">
                <?= $url['id']; ?>
                </div>
                <div style="float: left;width: 170px">
                <a href="http://localhost/r?c=<?= $url['id']; ?>" target="_blank">
                    http://localhost/r?c=<?= $url['id'];?>
                </a>
                </div>
                <div>
                <a href="<?= $url['long_url']; ?>" target="_blank"><?= $url['long_url'];?></a>
                </div>
        <?endforeach;?>
        </div>
    </main>

</body>
</html>
