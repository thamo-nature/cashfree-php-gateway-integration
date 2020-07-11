  <?php 
  $money = 100;
  
  $pay = "<center>
  
  <form action='checkout.php' method='post'>
  <input type='hidden' name='orderId' value='order-01' />
  <input type='hidden' name='amount' value='$money' />
     <button type='submit' class='cart-btn btn-info'>
          Checkout with Cashfree
      </button>
   </form>

</center>";
?>

<?php

if(isset($database->logged_user)){

   echo  $pay;
}
else{

  echo  "<center><a class='btn button' href='signup.php' role='button'>Sign up</a></center>";
}

?>
