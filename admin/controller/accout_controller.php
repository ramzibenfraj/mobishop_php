<?php

include_once('./model.php');
class Account extends Modele {
    public function __construct() {
        parent::__construct();
    }
    // fetch account data using getData Method
    public function getData($table = 'account')
    {
        $sql = "SELECT * FROM {$table}";
        $result = $this->pdo->query($sql);

        $resultArray = array();

        // fetch account data one by one
        if ($result->rowCount() > 0) {
            while ($item = $result->fetch(PDO::FETCH_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    // get account using id
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
    // handle user logout
    public function logout()
    {
        if ($_SESSION['logged'] == true) {
            $_SESSION['logged'] = false;
            setcookie('user_id', '0', time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('user_type', '0', time() + (86400 * 30), "/"); // 86400 = 1 day
            header('Location: http://localhost/ramzi/mobile%20shop/login.php');
            return true;
        }
    }
    // delete account item using account id
/*public function deleteAcc($id = null)
{
    if ($id != null) {
        $sql = "DELETE FROM account WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute([$id]);
        if ($result) {
            // Reload Page
            header('Location:'. $_SERVER['REQUEST_URI']);
        } else {
            echo '<script>alert("Error")</script>';
        }
        return $result;
    }
}*/  
public function deleteAcc($id = null)
{
    if ($id != null) {
        $sql = "DELETE FROM account WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute([$id]);
        if ($result) {
            // Reload Page
            header('Location:'. $_SERVER['REQUEST_URI']);
        } else {
            echo '<script>alert("Error")</script>';
        }
        return $result;
    }
}


    // update account item using account id
    public function updateAcc($newUser = null)
    {
        if ($newUser != null && $newUser->getId() != null) {
            $sql = "UPDATE account SET username=?, password=?, privilege=? WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([
                $newUser->getUsername(),
                $newUser->getPassword(),
                $newUser->getPrivilege(),
                $newUser->getId()
            ]);
            if ($result) {
                // Reload Page
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
            return $result;
        }
    }    
    // insert account item using account id
   /* public function insertAcc($username = null, $password = null, $privilege = null)
    {
        if ($username != null && $password != null && $privilege != null) {
            $sql = "INSERT INTO account(username, password, privilege) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$username, $password, $privilege]);
            if ($result) {
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
            return $result;
        } else {
            echo '<script>alert("Please fill all fields!")</script>';
        }
    }*/
    public function insertAcc(user_admin $newUser)
    {
        $username = $newUser->getUsername();
        $password = $newUser->getPassword();
        $privilege = $newUser->getPrivilege();
    
        if ($username != null && $password != null && $privilege != null) {
            $sql = "INSERT INTO account(username, password, privilege) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$username, $password, $privilege]);
            if ($result) {
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
            return $result;
        } else {
            echo '<script>alert("Please fill all fields!")</script>';
        }
    }
    public function nombreclients(){
        $query ="select COUNT(*) from user";
        $stmt = $this->pdo->query($query);
        $result = $stmt->fetchColumn();
        return $result;
    }
}