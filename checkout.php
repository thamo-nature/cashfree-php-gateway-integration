<?php
$orderId = $_POST["orderId"];
$orderAmount = $_POST["amount"];

echo "<center><h1 style='color:green'>Redirecting to payment page.</h1></center>";
echo $orderId . "|" . $orderAmount;
$notifyUrl = "http://public_ip/notify.php";
$returnUrl = "http://public_ip/index.php";

$orderDetails = array();
$orderDetails["notifyUrl"] = $notifyUrl;
$orderDetails["returnUrl"] = $returnUrl;

$userDetails = getUserDetails($orderId);
$order = getOrderDetails($orderId);

$orderDetails["customerName"] = $userDetails["customerName"];
$orderDetails["customerEmail"] = $userDetails["customerEmail"];
$orderDetails["customerPhone"] = $userDetails["customerPhone"];

$orderDetails["orderId"] = $order["orderId"];
$orderDetails["orderAmount"] = $order["orderAmount"];
$orderDetails["orderNote"] = $order["orderNote"];
$orderDetails["orderCurrency"] = $order["orderCurrency"];

$orderDetails["appId"] = "your app id";

$orderDetails["signature"] = generateSignature($orderDetails);

json_encode($orderDetails);

function generateSignature($postData){
  $secretKey = "your secret key";
 ksort($postData);
 $signatureData = "";
 foreach ($postData as $key => $value){
      $signatureData .= $key.$value;
 }
 $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
 $signature = base64_encode($signature);
 return $signature;
}
?>
 <!--<form id="redirectForm" method="post" action="https://cashfree.com/billpay/checkout/post/submit"> -->
  <form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
    <input type="hidden" name="appId" value="<?php echo $orderDetails["appId"] ?>"/>
    <input type="hidden" name="orderId" value="<?php echo $orderDetails["orderId"] ?>"/>
    <input type="hidden" name="orderAmount" value="<?php echo $orderDetails["orderAmount"] ?>"/>
    <input type="hidden" name="orderCurrency" value="<?php echo $orderDetails["orderCurrency"] ?>"/>
    <input type="hidden" name="orderNote" value="<?php echo $orderDetails["orderNote"] ?>"/>
    <input type="hidden" name="customerName" value="<?php echo $orderDetails["customerName"] ?>"/>
    <input type="hidden" name="customerEmail" value="<?php echo $orderDetails["customerEmail"] ?>"/>
    <input type="hidden" name="customerPhone" value="<?php echo $orderDetails["customerPhone"] ?>"/>
    <input type="hidden" name="returnUrl" value="<?php echo $orderDetails["returnUrl"] ?>"/>
    <input type="hidden" name="notifyUrl" value="<?php echo $orderDetails["notifyUrl"] ?>"/>
    <input type="hidden" name="signature" value="<?php echo $orderDetails["signature"] ?>"/>
  </form>

  <script>document.getElementById("redirectForm").submit();</script>

<?php


function getUserDetails($orderId) {
    return array(
      "customerName" => "something username",
      "customerEmail" => "users@gmail.com",
      "customerPhone" => "0987654321"
    );
}

function getOrderDetails($orderId) {

  $orderAmount = $_POST["amount"];

  return array(
    "orderId" => time(),
    "orderAmount" => $orderAmount,
    "orderNote" => "test order",
    "orderCurrency" => "INR"
  );
}



 ?>

