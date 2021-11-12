<?php include_once(__DIR__.'/comm/lib/autoload.php'); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="static/bootstrap.min.css">
    <link rel="stylesheet" href="static/style.css">

    <title>Beta coffee</title>
</head>
<body>
<?php
$apple = new Apple("Apple");
echo($apple->getName());
?>
</body>
</html>
