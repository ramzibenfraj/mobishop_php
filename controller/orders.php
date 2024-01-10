<?php
class OrderModel extends Modele {
   public function __construct() {
      parent::__construct();
  }
   /*public function insertOrder($product_id, $date, $user_id, $etat) {
      $sql = "INSERT INTO orders (product_id, date, user_id, etat) VALUES (?, ?, ?, ?)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$product_id, $date, $user_id, $etat]);
      return ;
   }*/
   public function insertOrder( $order) {
      $sql = "INSERT INTO orders (product_name, date, user_id, etat) VALUES (?, ?, ?, ?)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$order->getProductId(), $order->getDate(), $order->getUserId(), $order->getEtat()]);
  }
  
   public function getAllorders() {
      $query = 'SELECT * FROM orders';
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
  }

}
?>
