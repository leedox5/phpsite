<?php 
    session_start();
    include("base.php"); 
?>

<?php
    include_once 'dbinfo.php';
    $id = -1;
    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    }
    $orders = [];
    // 주문상태가 10이상인것(주문대기 이후)
    $sql  = " SELECT CASE stat WHEN '20' THEN '주문완료' END stat_desc, A.*, B.*, C.* ";
    $sql .= "   FROM Orders A                                             ";
    $sql .= "       LEFT OUTER JOIN                                       ";
    $sql .= "       (                                                                        ";
    $sql .= "         SELECT order_id, max(product_id) product_id, SUM(order_quantity) cnt   ";
    $sql .= "          FROM Orders_Detail GROUP BY order_id                                  ";
    $sql .= "       )B                                                                       ";
    $sql .= " 	     ON B.order_id = A.id                                 ";
    $sql .= " 	    LEFT OUTER JOIN                                       ";
    $sql .= "        Products C                                           ";
    $sql .= " 	    ON C.id = B.product_id                                ";
    $sql .= "  WHERE A.user_id = $id                                      ";
    $sql .= "    AND A.stat    >= '20'                                    ";
    
    $result = $conn->query($sql);

    if($result) {
        while($order = $result->fetch_assoc()) {
            $orders[] = $order;
        }
    }
    $result->free();    
    $cnt = 0;
    foreach($orders as $order) {
        $orders[$cnt]['no'] = $cnt + 1;
        if($order["cnt"] > 1) {
            $orders[$cnt]['name'] .= ' 외';
        }
        $cnt ++;
    }    
?>

<div class="container my-2">
    <h3 class="border-bottom py-2">주문내역</h3>

    <div class="my-2">
        <table class="table">
            <thead class="text-center table-dark">
                <tr>
                    <td>NO</td>
                    <td>품명</td>
                    <td>수량</td>  
                    <td>금액</td>
                    <td>상태</td> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                <tr class="text-center">
                    <td><?= $order['no'] ?></td>
                    <td class="text-start"><?= $order['name']?></td>
                    <td><?= $order['cnt'] ?></td>
                    <td><?= number_format($order['total_price']) ?></td>
                    <td><?= $order['stat_desc'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div>
</div>

<?php include("bottom.php"); ?>
