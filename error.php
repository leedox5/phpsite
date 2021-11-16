<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="static/bootstrap.min.css">
    <link rel="stylesheet" href="static/style.css">

    <title>Error</title>
</head>
<body>
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="alert alert-danger" role="alert">
                <?= $message ?>
            </div>
            <a href="main.php" class="btn btn-link">홈으로 돌아가기</a>
        </div>
    </div>
</div>
</body>
</html>
