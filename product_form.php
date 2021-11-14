<?php include("base.php"); ?>
<div class="container my-3">
    <h3 class="border-bottom py-2">상품등록</h3>    
    <form method="post" action="product_crt.php" class="post-form">
        <div class="mb-2">
            <label for="name">상품명</label>
            <input type="text" class="form-control" name="name" id="name" maxlength="20" value="">
        </div>
        <div class="mb-2">
            <label for="price">가격</label>
            <input type="text" class="form-control" name="price" id="price" value="">
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
