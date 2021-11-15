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
    $users = [];
    $sql = " SELECT * FROM Users WHERE IFNULL(use_yn,'Y') = 'Y' ";

    $result = $conn->query($sql);

    if($result) {
        while($user = $result->fetch_assoc()) {
            $users[] = $user;
        }
    }
    $result->free();    
    $cnt = 0;
    foreach($users as $user) {
        $users[$cnt]['no'] = $cnt + 1;
        $cnt ++;
    }    
?>

<div class="container my-2">
    <h3 class="border-bottom py-2">회원목록</h3>
    
    <div class="my-2">
        <table class="table">
            <thead class="text-center table-dark">
                <tr>
                    <td>NO</td>
                    <td>회원ID</td>
                    <td>이메일</td> 
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr class="text-center">
                    <td><?= $user['no'] ?></td>
                    <td class="text-start"><a href="signup_c.php?id=<?= $user['id'] ?>"><?= $user['user_id'] ?></a></td>
                    <td><?= $user['email'] ?></td>
                    <td class="text-end">
                        <a href="#" class="delete btn btn-sm btn-outline-secondary" data-uri="user_delete.php?id=<?= $user['id'] ?>">삭제</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div>
        <a href="signup_c.php" class="btn btn-primary">회원 등록하기</a>
    </div>    
</div>

<?php include("bottom.php"); ?>
