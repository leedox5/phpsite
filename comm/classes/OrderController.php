<?php 
class OrderController {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function list() {
        include "main.php";
    }
    
    public function login() {
        $method = $_SERVER["REQUEST_METHOD"];
        include_once('dbinfo.php');
        $userid = "";
        $password = "";
        $message = "";
        if($method === "POST") {
            $userid = $_POST["userid"];
            $password = $_POST["password"];
            
            $sql = sprintf(" SELECT * FROM Users WHERE user_id = '%s' AND IFNULL(use_yn, 'Y') = 'Y' ", $userid);
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();
            if($user) {
                $hash_pw = $user['pwd'];
                if(password_verify($password, $hash_pw)) {
                    if(!session_id()) {
                        session_start();
                    }
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['admin_yn'] = $user['admin_yn'];
                    header('Location: main.php');        
                } else {
                    $message = "아이디 또는 비밀번호를 확인하세요";
                    include("login.php");
                }
            } else {
                $message = "아이디 또는 비밀번호를 확인하세요";
                include("login.php");
            }
            $conn->close();
        } else {
            include("login.php");
        }
    }
    
    public function logout() {
        session_start();        
        session_destroy();
        header('Location: main.php');
    }
}
?>