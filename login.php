<?php include("base.php"); ?>
<div class="container my-3">
    <form method="post" class="post-form">
        <div class="mb-2">
            <label for="username">사용자 ID</label>
            <input type="text" required class="form-control" name="userid" id="userid" value="<?= $userid ?>" minlength="5" maxlength="10">
        </div>
        <div class="mb-2">
            <label for="password">비밀번호</label>
            <input type="password" required class="form-control" maxlength="20" name="password" id="password" value="<?= $password ?>">
        </div>
        <button type="submit" class="btn btn-primary">로그인</button>
    </form>
    <?php if ($message) : ?>
    <div class="alert alert-danger mt-2" role="alert">
    <?= $message ?>
    </div>
    <?php endif; ?>    
</div>
<?php include("bottom.php"); ?>
