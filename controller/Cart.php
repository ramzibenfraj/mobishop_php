<?php
// php cart class
class Cart extends Modele
{
    public function __construct() {
        parent::__construct();
    }
    // get cart using user_id
    public function getCart($userid = null, $table = 'cart')
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE user_id = ?");
        $stmt->execute([$userid]);
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultArray;
    }

    // insert into cart table
    public function insertIntoCart($params = null, $table = "cart")
    {
        if ($params != null) {
            // "Insert into cart(user_id, item_id) values (?, ?)"
            // get table columns
            $columns = implode(',', array_keys($params));
            $placeholders = implode(',', array_fill(0, count($params), '?'));

            // create sql query
            $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = $this->pdo->prepare($sql);

            // execute query
            $result = $stmt->execute(array_values($params));
            return $result;
        }
    }

    //get user_id and item_id and insert into cart table
    public function addToCart($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid,
            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result) {
                // Reload Page
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
        }
    }/*
    public function addToCart($cartItem)
{
    if (isset($cartItem->user_id) && isset($cartItem->item_id)) {
        $params = array(
            "user_id" => $cartItem->user_id,
            "item_id" => $cartItem->item_id,
        );

        // insert data into cart
        $result = $this->insertIntoCart($params);
        if ($result) {
            // Reload Page
            header('Location: ' . $_SERVER['REQUEST_URI']);
        } else {
            echo '<script>alert("Error")</script>';
        }
    }
}*/

    


    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart')
    {
        if ($item_id != null) {
            $stmt = $this->pdo->prepare("DELETE FROM $table WHERE item_id = ?");
            $result = $stmt->execute([$item_id]);

            if ($result) {
                // Reload Page
                header('Location: '. $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
            return $result;
        }
    }

    // calculate sub total
    public function getSum($arr)
    {
        $sum = 0;
        foreach ($arr as $item) {
            $sum += floatval($item);
        }
        return sprintf('%.2f', $sum);
    }
    // get item_id of shopping cart list
    public function getCartId($cartArray = null)
    {
        $cart_id = array();
        if ($cartArray != null) {
            foreach ($cartArray as $item) {
                array_push($cart_id, $item['item_id']);
            }
            return $cart_id;
        }
    }
    
}
