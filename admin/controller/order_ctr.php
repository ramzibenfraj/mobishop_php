<?php
class OrderModel extends Modele {
   public function __construct() {
      parent::__construct();
  }
  
   public function getAllorders() {
      $query = 'SELECT * FROM orders';
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
  }
  public function updateOrder($order) {
   $sql = "UPDATE orders SET product_name = ?, date = ?, user_id = ?, etat = ? WHERE id = ?";
   $stmt = $this->pdo->prepare($sql);
   $stmt->execute([$order->getProductId(), $order->getDate(), $order->getUserId(), $order->getEtat(), $order->getId()]);
 } 
}
?>
