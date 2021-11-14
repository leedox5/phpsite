<?php 
session_start();
include("base.php"); 
?>

<?php

    $message = "";

    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    } else {
        $message = "권한이 없습니다.";
        require("error.php");
        exit;    
    }

    include_once 'dbinfo.php';
    $orders = [];
    $sql  = " SELECT A.*                  ". PHP_EOL;
    $sql .= "       ,B.user_id            ". PHP_EOL;
    $sql .= "   FROM Orders A             ". PHP_EOL;
    $sql .= "       LEFT OUTER JOIN       ". PHP_EOL;
    $sql .= "        Users B              ". PHP_EOL;
    $sql .= "       ON B.id = A.user_id   ". PHP_EOL;
    $sql .= "  WHERE stat >= '20'         ". PHP_EOL;

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
    <h3 class="border-bottom py-2">판매현황</h3>
    
    <div class="my-2">
        <table class="table">
            <thead class="text-center table-dark">
                <tr>
                    <td>NO</td>
                    <td>주문일</td>
                    <td>고객ID</td>  
                    <td>금액</td> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                <tr class="text-center">
                    <td><a href="sales_detail_list.php?id=<?= $order['id'] ?>"><?= $order['no'] ?></a></td>
                    <td><?= $order['order_date'] ?></td>
                    <td class="text-start"><?= $order['user_id'] ?></td>
                    <td><?= number_format($order['total_price']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("bottom.php"); ?>
