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
                <li>
                    <a class="nav-link" href="#">로그인</a>
                </li>
            </ul>
            
        </div>
    </div>
</nav>

<div class="container my-2">
    <h3 class="border-bottom py-2">주문하기</h3>

    <?php foreach($prods as $prod):?>
    <div class="card my-2">
        <div class="card-body">
            <div class="card-text" style="white-space: pre-line;"><?= $prod['name'] ?></div>
        </div>
    </div>
    <form action="crt_order.php" method="post">
        <div class="input-group input-group-sm justify-content-end">
            <span class="input-group-text">수량</span>
            <input type="hidden" name="product_id" id="product_id" value="<?= $prod['id'] ?>">
            <input type="number" class="form-control" name="qty" id="qty">
            <button type="submit" class="btn btn-outline-secondary">담기</button>
        </div>
    </form>
    <?php endforeach; ?>
    
    <div class="my-2">
        <table class="table">
            <thead class="text-center table-dark">
                <tr>
                    <td>NO</td>
                    <td>품명</td>
                    <td>수량</td>  
                    <td>금액</td>
                    <td></td> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                <tr class="text-center">
                    <td><?= $order['rn'] ?></td>
                    <td class="text-start"><?= $order['name'] ?></td>
                    <td><?= $order['order_quantity'] ?></td>
                    <td><?= $order['amt'] ?></td>
                    <td class="text-end"><a href="#" class="delete btn btn-sm btn-outline-secondary" data-uri="delete_order.php?id=<?= $order['id'] ?>">삭제</a></td>
                </tr>
                <?php endforeach; ?>
                <tr class="text-center">
                    <td>계</td>
                    <td></td>
                    <td></td>
                    <td><?= $sum ?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
    <div class="btn-toolbar justify-content-end">
        <div class="btn-group btn-group-sm">
            <a href="order_complete.php?id=<?= $order_id ?>&total=<?= $sum ?>" class="btn btn-outline-secondary">주문하기</a>
        </div>
    </div>
</div>

<script src="static/jquery-3.6.0.min.js"></script>
<script src="static/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $(".delete").on("click", function() {
        if(confirm("정말로 삭제하시겠습니까?")) {
            location.href = $(this).data("uri");
        }
    });
});
</script>

</body>
</html>