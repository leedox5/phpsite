<?php 
session_start();
include("base.php"); 
?>

<?php

    $message = "";

    if(isset($_SESSION['id'])) {
        $s_id = $_SESSION['id'];
    } else {
        $message = "권한이 없습니다.";
        require("error.php");
        exit;    
    }

    $id = $_GET['id'];

    include_once 'dbinfo.php';
    $orders = [];
    $sql  = " SELECT A.order_id                   ". PHP_EOL;
    $sql .= "       ,B.user_id   ord_user_id      ". PHP_EOL;
    $sql .= "       ,D.user_id                    ". PHP_EOL;
    $sql .= "       ,A.product_id                 ". PHP_EOL;
    $sql .= "       ,C.name                       ". PHP_EOL;
    $sql .= "       ,A.order_quantity             ". PHP_EOL;
    $sql .= "       ,B.total_price                ". PHP_EOL;
    $sql .= "   FROM Orders_Detail A              ". PHP_EOL;
    $sql .= "       LEFT OUTER JOIN               ". PHP_EOL;
    $sql .= "        Orders B                     ". PHP_EOL;
    $sql .= " 	  ON B.id = A.order_id            ". PHP_EOL;
    $sql .= "       LEFT OUTER JOIN               ". PHP_EOL;
    $sql .= "        Products C                   ". PHP_EOL;
    $sql .= " 	  ON C.id = A.product_id          ". PHP_EOL;
    $sql .= "       LEFT OUTER JOIN               ". PHP_EOL;
    $sql .= "        Users D                      ". PHP_EOL;
    $sql .= " 	  ON D.id = B.user_id             ". PHP_EOL;
    $sql .= "  WHERE order_id = $id ;             ". PHP_EOL;

    $result = $conn->query($sql);

    if($result) {
        while($order = $result->fetch_assoc()) {
            $orders[] = $order;
        }
        $result->free();    
    }
    $cnt = 0;
    foreach($orders as $order) {
        $orders[$cnt]['no'] = $cnt + 1;
        $cnt ++;
    }    
?>

<div class="container my-2">
    <h3 class="border-bottom py-2">판매현황상세</h3>
    
    <div class="my-2">
        <table class="table">
            <thead class="text-center table-dark">
                <tr>
                    <td>NO</td>
                    <td>고객ID</td>
                    <td>품명</td>  
                    <td>수량</td>  
                    <td>금액</td> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                <tr class="text-center">
                    <td><?= $order['no'] ?></td>
                    <td><?= $order['user_id'] ?></td>
                    <td class="text-start"><?= $order['name'] ?></td>
                    <td class="text-end"><?= $order['order_quantity'] ?></td>
                    <td><?= number_format($order['total_price']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("bottom.php"); ?>
