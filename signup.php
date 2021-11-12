<?php include("base.php"); ?>
<?php include("signup_ok.php"); ?>
<div class="container my-3">
    <form method="post" class="post-form">
        <div class="mb-2">
            <label for="username">사용자 ID</label>
            <input type="text" class="form-control" name="userid" id="userid" value="">
        </div>
        <div class="mb-2">
            <label for="password1">비밀번호</label>
            <input type="password" class="form-control" name="password1" id="password1" value="">
        </div>
        <div class="mb-2">
            <label for="password2">비밀번호 확인</label>
            <input type="password" class="form-control" name="password2" id="password2" value="">
        </div>
        <div class="mb-2">
            <label for="email">이메일</label>
            <input type="text" class="form-control" name="email" id="email" value="">
        </div>
        <button type="submit" class="btn btn-primary">생성하기</button>
    </form>
</div>
<?php include("bottom.php"); ?>
