<?php include("base.php"); ?>
<div class="container my-3">
    <form method="post" action="signup_c.php" class="post-form">
        <div class="mb-2">
            <label for="username">사용자 ID</label>
            <input type="text" required pattern="^[a-zA-Z0-9]+$" class="form-control" name="userid" id="userid" value="<?= $userid ?>" minlength="6" maxlength="10">
        </div>
        <div class="mb-2">
            <label for="password1">비밀번호</label>
            <input type="password" required minlength="8" maxlength="15" class="form-control" name="password1" id="password1" value="">
        </div>
        <div class="mb-2">
            <label for="password2">비밀번호 확인</label>
            <input type="password" required minlength="8" maxlength="15" class="form-control" name="password2" id="password2" value="">
        </div>
        <div class="mb-2">
            <label for="email">이메일</label>
            <input type="email" required class="form-control" maxlength="50" name="email" id="email" value="<?= $email ?>">
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
