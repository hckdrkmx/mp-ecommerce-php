<?
require 'sdk/vendor/autoload.php';
MercadoPago\SDK::setAccessToken('APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181');
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

$preference = new MercadoPago\Preference();

$preference->back_urls = array(
    "success" => "https://hckdrkmx-mp-commerce-php.herokuapp.com/hckdrk/message.php?type_message=success",
    "failure" => "https://hckdrkmx-mp-commerce-php.herokuapp.com/hckdrk/message.php?type_message=failure",
    "pending" => "https://hckdrkmx-mp-commerce-php.herokuapp.com/hckdrk/message.php?type_message=pending"
);
$preference->auto_return = "approved";

//$preference->notification_url = 'https://hckdrkmx-mp-commerce-php.herokuapp.com/hckdrk/listener.php?source_news=webhooks';
//$preference->external_reference = 'alfredo.joel.rojas@gmail.com';

$preference->payment_methods = array(
  "excluded_payment_methods" => array(
    array("id" => "amex")
  ),
  "excluded_payment_types" => array(
    array("id" => "atm")
  ),
  "installments" => 6
);


$item = new MercadoPago\Item();
$item->id = "1234";
$item->title =  $_POST['title']; //editar
$item->description = "Dispositivo móvil de Tienda e-commerce";
$item->quantity = 1;
$item->picture_url = $img = 'https://hckdrkmx-mp-commerce-php.herokuapp.com/'.$_POST['img']; //editar
$item->unit_price = $_POST['price']; //editar

$payer = new MercadoPago\Payer();
$payer->name = "Lalo";
$payer->surname = "Landa";
$payer->email = "test_user_81131286@testuser.com";
$payer->phone = array(
	"area_code" => "11",
	"number" => "22223333"
);

$payer->address = array(
	"street_name" => "Falsa",
	"street_number" => 123,
	"zip_code" => "1111"
);


$preference->items = array($item);
$preference->save();

$btn =  '<a href="'.$preference->init_point.'" class="btn btn-info">Pagar la compra</a>';



?>

<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container" style="padding: 50px">
		<center>
			<?=$btn?>
		</center>
	</div>
</body>
</html>

