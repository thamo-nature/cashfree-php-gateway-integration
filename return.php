    <?php
    echo json_encode($_POST); //echo it if you want

    $orderId = $_POST["orderId"];
    $orderAmount = $_POST["orderAmount"];
    $referenceId = $_POST["referenceId"];
    $txStatus = $_POST["txStatus"];
    $paymentMode = $_POST["paymentMode"];
    $txMsg = $_POST["txMsg"];
    $txTime = $_POST["txTime"];
    $signature = $_POST["signature"];
    $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
    $secretKey = "your secret key";
    $hash_hmac = hash_hmac('sha256', $data, $secretKey, true) ;
    $computedSignature = base64_encode($hash_hmac);
    if ($signature == $computedSignature) {
      echo "<h1>Your order is successfully confirmed!</h1>";
      //your code or some sql statements
      //$post_insert = $database->connection->query("insert into table values(NULL,'$this->name','$this->address','$this->number','$this->city','0','$joined',0)");
      //$post_to_db =  $database->connection->query($post_insert); 
  
    } else {
      echo "<h1>Something went wrong</h1>";
      // Leave it
    }

 ?>

