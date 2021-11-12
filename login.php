<?php include("base.php"); ?>
<div class="container my-3">
    <form method="post" class="post-form">
        <div class="mb-2">
            <label for="username">사용자 ID</label>
            <input type="text" class="form-control" name="userid" id="userid" value="">
        </div>
        <div class="mb-2">
            <label for="password">비밀번호</label>
            <input type="password" class="form-control" name="password" id="password" value="">
        </div>
        <button type="submit" class="btn btn-primary">로그인</button>
    </form>
    <?php if ($message) : ?>
    <div class="alert alert-danger" role="alert">
    <?= $message ?>
    </div>
    <?php endif; ?>    
</div>
<?php include("bottom.php"); ?>
