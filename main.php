<?php
    include_once 'dbinfo.php';

    if($conn->connect_error) {
        die('Could not connect: ' . $conn->connect_error);
    }

    $prods = [];
    $sql = "SELECT * FROM Products";
    $result = $conn->query($sql);

    if($result) {
        while($prod = $result->fetch_assoc()) {
            $prods[] = $prod;
        }
    }

    $sql = " SELECT * FROM Orders WHERE user_id = 1 AND stat = '10' ";

    $result = $conn->query($sql);

    $sum = 0;
    $orders = [];
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $order_id = $row['id'];
        $sql  = "SELECT A.id, B.name, A.order_quantity,  A.order_quantity * B.price AS amt" . PHP_EOL;
        $sql .= "  FROM Orders_Detail A                " . PHP_EOL;
        $sql .= "      INNER JOIN                      " . PHP_EOL;
        $sql .= "       Products B                     " . PHP_EOL;
        $sql .= "      ON B.id = A.product_id          " . PHP_EOL;
        $sql .= sprintf(" WHERE order_id = %u                   ", $row['id']) ;
        $sql .= " ORDER BY A.id ";
        $result = $conn->query($sql);
        if($result) {
            while($order = $result->fetch_assoc()) {
                $orders[] = $order;
            }
        }
        $result->free();

        $cnt = 0;
        foreach($orders as $order) {
            $sum += $order['amt'];    
            $orders[$cnt]['rn'] = $cnt + 1;
            $cnt ++;
        }
    }

    $conn->close();

    require "./order.php";    
?>
