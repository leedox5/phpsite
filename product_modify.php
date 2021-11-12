<?php include("base.php"); ?>
<?php
    include_once 'dbinfo.php';
    $message = "";
    $id = $_GET['id'];

    $sql = sprintf("SELECT * FROM Products WHERE id = %u", $id);
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();

    $conn->close();
?>
<div class="container my-3">
    <h3 class="border-bottom py-2">상품수정</h3>    
    <form method="post" action="product_save.php" class="post-form">
        <input type="hidden" name="id" id="id" value="<?= $product['id'] ?>">
        <div class="mb-2">
            <label for="name">상품명</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $product['name'] ?>">
        </div>
        <div class="mb-2">
            <label for="price">가격</label>
            <input type="text" class="form-control" name="price" id="price" value="<?= $product['price'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">저장</button>
    </form>
    <?php if ($message) : ?>
    <div class="alert alert-danger" role="alert">
    <?= $message ?>
    </div>
    <?php endif; ?>    
</div>
<?php include("bottom.php"); ?>
