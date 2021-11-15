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
<nav class="navbar navbar-expand-md navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="main.php">Beta coffee</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <ul class="navbar-nav">
            <?php if(isset($_SESSION['user_id'])) { ?>
                <?php if($_SESSION['admin_yn'] == 'Y') { ?>
                <li>
                    <a class="nav-link" href="product_list.php">상품관리</a>
                </li>
                <li>
                    <a class="nav-link" href="sales_list.php">판매현황</a>
                </li>
                <li>
                    <a class="nav-link" href="user_list.php">회원관리</a>
                </li>
                <?php } ?>
                <li>
                    <a class="nav-link" href="order_list.php">주문내역</a>
                </li>
                <li>
                    <a class="nav-link" href="logout_c.php"><?= $_SESSION['user_id'] ?> (로그아웃)</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="signup_c.php">회원가입</a>
                </li>            
                <li>
                    <a class="nav-link" href="login_c.php">로그인</a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
</nav>

