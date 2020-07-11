# cashfree-php-gateway-integration
customized cashfree php gateway integration for websites

Copy and paste files in your localhost</br>

Get appId and secretKey from cashfree</br>
Change those fields wherever required.</br>

Turn on port forwarding to your machine.</br> 

Then edit </br>
$notifyUrl = "http://your_public_ip/path/notify.php";</br>
$returnUrl = "http://your_public_ip/path/return.php";</br>

Alternatively,you can use virtual host.,to redirect to localhost..,I love port forwarding.</br>

Remember after successful payment from cashfree,user has to submit post data return to us,so we can verify the payment</br>

If session variables not working from port forwarding,firstly port forward then use that forwarded address to test.</br>

If everything works fine in localhost,then go live.</br>

Happy learning to everyone.
