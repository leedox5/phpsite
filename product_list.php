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
    $products = [];
    $sql = " SELECT * FROM Products";

    $result = $conn->query($sql);

    if($result) {
        while($product = $result->fetch_assoc()) {
            $products[] = $product;
        }
    }
    $result->free();    
    $cnt = 0;
    foreach($products as $product) {
        $products[$cnt]['no'] = $cnt + 1;
        $cnt ++;
    }    
?>

<div class="container my-2">
    <h3 class="border-bottom py-2">상품목록</h3>
    
    <div class="my-2">
        <table class="table">
            <thead class="text-center table-dark">
                <tr>
                    <td>NO</td>
                    <td>품명</td>
                    <td>가격</td>  
                    <td></td> 
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product): ?>
                <tr class="text-center">
                    <td><?= $product['no'] ?></td>
                    <td class="text-start"><a href="product_modify.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></td>
                    <td><?= $product['price'] ?></td>
                    <td class="text-end">
                        <a href="#" class="delete btn btn-sm btn-outline-secondary" data-uri="product_delete.php?id=<?= $product['id'] ?>">삭제</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div>
</div>

<?php include("bottom.php"); ?>
