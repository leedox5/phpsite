<?php include("base.php"); ?>
<div class="container my-3">
    <h3 class="border-bottom py-2">상품등록</h3>    
    <form method="post" action="product_crt.php" class="post-form">
        <input type="hidden" name="id" id="id" value="<?= $id ?>">
        <div class="mb-2">
            <label for="name">상품명</label>
            <input type="text" class="form-control" name="name" id="name" maxlength="20" value="<?= $name ?>">
        </div>
        <div class="mb-2">
            <label for="price">가격</label>
            <input type="number" class="form-control" name="price" id="price" maxlength="5" value="<?= $price ?>">
        </div>
        <button type="submit" class="btn btn-primary">저장</button>
    </form>
    <?php if ($message) : ?>
    <div class="alert alert-danger mt-2" role="alert">
    <?= $message ?>
    </div>
    <?php endif; ?>    
</div>
<?php include("bottom.php"); ?>
