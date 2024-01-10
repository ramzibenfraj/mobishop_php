<?php
// php account class
class Account extends Modele
{
    public function __construct() {
        parent::__construct();
    }
    public function getData($table = 'account')
    {
        $sql = "SELECT * FROM {$table}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultArray;
    }

    public function getAccount($id = null, $table = 'account')
    {
        if ($id != null) {
            $sql = "SELECT * FROM {$table} WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            $resultArray = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultArray;
        }
    }
    public function getAccountname($id = null, $table = 'account')
    {
        if ($id != null) {
            $sql = "SELECT username FROM {$table} WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            $resultArray = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultArray;
        }
    }

    public function login($username = null, $password = null)
    {
        if ($username != null && $password != null) {
            $sql = "SELECT * FROM account WHERE username=? AND password=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$username, $password]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $_SESSION['logged'] = true;
                setcookie('user_id', $result['id'], time() + (86400 * 1), "/"); // 86400 = 1 day
                setcookie('user_type', $result['privilege'], time() + (86400 * 1), "/"); // 86400 = 1 day
                if ($result['privilege']==0){
                    header('Location:index.php',true);
                }else {
                    header('Location:./admin/index.php',true );
                }
                return true;
            } else {
                echo "<script>alert('Login fail');</script>";
                return false;
            }
        }
    }

    public function logout()
    {
        if ($_SESSION['logged'] == true) {
            $_SESSION['logged'] = false;
            setcookie('user_id', '0', time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('user_type', '0', time() + (86400 * 30), "/"); // 86400 = 1 day
            header('Location:' ,true);
            return true;
        }
    }

// handle user registration
public function register(
    $fullname = null,
    $username = null,
    $password = null,
    $phone = null,
    $avatar = null,
    $city = null,
    $gender = null,
    $address = null
)
{
    if (
        $fullname != null
        && $username != null
        && $password != null
        && $phone != null
        // && $avatar != null
        && $city != null
        && $gender != null
        // && $address != null
    ) {
        if ($avatar == null) {
            $avatar = 'https://www.shareicon.net/data/128x128/2016/05/26/771187_man_512x512.png';
        }
        if ($address == null) {
            $address = null;
        }
        $sqlUser = "INSERT INTO user(fullname, phone, avatar, city, gender, address) VALUES (?, ?, ?, ?, ?, ?)";
        $sqlAccount = "INSERT INTO account(username, password) VALUES (?, ?)";
        $stmtAcc = $this->pdo->prepare($sqlAccount);
        $stmtUser = $this->pdo->prepare($sqlUser);
        $stmtAcc->bindParam(1, $username);
        $stmtAcc->bindParam(2, $password);
        $stmtUser->bindParam(1, $fullname);
        $stmtUser->bindParam(2, $phone);
        $stmtUser->bindParam(3, $avatar);
        $stmtUser->bindParam(4, $city);
        $stmtUser->bindParam(5, $gender);
        $stmtUser->bindParam(6, $address);
        $resultAcc = $stmtAcc->execute();
        $resultUser = $stmtUser->execute();
        if ($resultAcc && $resultUser) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
            return true;
        } else if ($resultUser) {
            echo "<script>alert('Register Account fail');</script>";
            $this->pdo->query("DELETE FROM account WHERE username = '{$username}'");
            return false;
        } else if ($resultAcc) {
            echo "<script>alert('Register User fail');</script>";
            $this->pdo->query("DELETE FROM user WHERE fullname = '{$fullname}'");
            return false;
        } else {
            echo "<script>alert('Register fail');</script>";
            return false;
        }
    }
}

}