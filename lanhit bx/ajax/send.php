<? require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php"); 
use Bitrix\Main\Context,
Bitrix\Currency\CurrencyManager,
Bitrix\Sale\Order,
Bitrix\Sale\Basket;
CModule::IncludeModule('iblock');

Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");


if (!$_POST) {
	die('=(');
}

$json_response = [
	'error' => []
];

$SITE_ID = 's1';



$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : false;
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : false;
$email = isset($_POST['email']) ? $_POST['email'] : false;
$phone = isset($_POST['phone']) ? $_POST['phone'] : false;
$company = isset($_POST['company']) ? $_POST['company'] : false;
$country = isset($_POST['country']) ? $_POST['country'] : false;
$massage = isset($_POST['massage']) ? $_POST['massage'] : false;
$agree = isset($_POST['agree']) ? $_POST['agree'] : false;
$basket = isset($_POST['basket']) ? $_POST['basket'] : false;

if (!$first_name || !$last_name || !$email || !$phone || !$company || !$country) {
	$response['errors'][] = 'All text fields are required';
	$json_response['error'][] = 'All text fields are required';
}

if (!$agree) {
	$response['errors'][] = 'You must agree to the terms';
	$json_response['error'][] = 'You must agree to the terms';
}

if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$response['errors'][] = 'Wrong format email';
	$json_response['error'][] = 'Wrong format email';
}
?>


<?
if (isset($_FILES['file']) && $_FILES['file']['name'] != '') {

	if ($_FILES["file"]["error"]) {
		$response['errors'][] = 'File download errors';
		$json_response['error'][] = 'File download errors';
	}
  if (count($_FILES["file"]) > 5) {
		$response['errors'][] = 'File limit exceeded. You can attach no more than 5 files to a message.';
    $json_response['error'][] = 'File limit exceeded. You can attach no more than 5 files to a message.';
  }



	$allowedExt = ['doc','docx','txt','pdf', 'jpg', 'png'];
	$maxFileSize = 512 * 1024 * 6;
	$fileName = basename( $_FILES['file']['name'] );
	$fileSize = filesize( $_FILES['file']['tmp_name'] );
	$fileExt = mb_strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

	if(!in_array($fileExt, $allowedExt)) {
		$response['errors'][] = 'The file is of an unauthorized type';
		$json_response['error'][] = 'The file is of an unauthorized type';
	}

	if($fileSize > $maxFileSize) {
		$response['errors'][] = 'File size exceeds 3 MB';
		$json_response['error'][] = 'File size exceeds 3 MB';
	}
}



if ($json_response['error']) {
	echo json_encode($json_response, JSON_UNESCAPED_UNICODE);
	return json_encode($response);
	die();
}





$files = array();
foreach ($_FILES as $file){
  if (!empty($file['tmp_name'])) {
  $files[] = CFile::SaveFile($file,'form');
  }
}



$arBasketItems = json_decode($basket, true);


$result = '';
foreach ($arBasketItems as $item){

  $result .= "\nID: {$item['PRODUCT_ID']}\n";
  $result .= "Название: {$item['NAME']}, {$item['SECOND_NAME']}, {$item['FORMA']}\n";
  $result .= "Упаковка: {$item['PACKING']} г \n";
  $result .= "Количество: {$item['QUANTITY']} шт\n";
  //$result .= "Внутренний ID: {$item['NUM']}\n\n";
  
}

$arEventFields = array(
  "FIRST_NAME"     => $_REQUEST['first_name'],
  "LAST_NAME"      => $_REQUEST['last_name'],
  "EMAIL"          => $_REQUEST['email'],
  "PHONE"          => $_REQUEST['phone'],
  "COMPANY"        => $_REQUEST['company'],
  "COUNTRY"        => $_REQUEST['country'],
  "MESSAGE"        => $_REQUEST['massage'],
  "PRODUCTS"       => $result
  
);
// $arEventFields1 = array(
// 	"ORDER_ID" => $ID,
// 	"ORDER_LIST" => $result,
// 	"ORDER_USER" => $_POST['first_name'] . " " . $_POST['last_name'],
// 	"EMAIL" => $_POST['email'],
// 	"SALE_EMAIL" => "info@lanhit.ru",
// 	"ORDER_DATE" => date('m.d.Y'),
// );



if(CEvent::Send("ORDER_SEND", $SITE_ID, $arEventFields, 'Y','', $files)){
	$messages = array();
	array_push($messages, "Сообщение успешно отправлено!");
	
  //echo "<span style='color:#0fcf00;'>Сообщение успешно отправлено!</span>";

  $myBasket = Bitrix\Sale\Basket::create(SITE_ID);


foreach ($arBasketItems as $product)
{
    $item = $myBasket->createItem("catalog", $product["PRODUCT_ID"]);
    unset($product["PRODUCT_ID"]); 
  
    $item->setField('QUANTITY', $product["QUANTITY"]);
    $item->setField('NAME', $product["NAME"].', '.$product["SECOND_NAME"]);
    $item->setField('PRODUCT_PROVIDER_CLASS', $product["PRODUCT_PROVIDER_CLASS"]);
    $item->setField('CURRENCY', $product["CURRENCY"]);

}

$myBasket->refresh();

$user_tag = '';

if($USER->GetID()){
	$user_id = $USER->GetID(); 
}else{
	$user_id = 'пустой';
	
	$rsUsers = CUser::GetList(array('sort' => 'asc'), 'sort');
	while($arUser = $rsUsers->Fetch()){
		$user_logins[] = $arUser['LOGIN'];
	}
	
	if(in_array($_POST['email'], $user_logins)){
		array_push($messages, "пользователь ".$_POST['email']." уже существует");
		
		//die();
		// надо что-то сделать, если такой e-mail уже есть. Типа сообщение об ошибке вывести и прекратить оформлять заказ
	}
	
	function gen_password($length = 6)
	{				
		$chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP'; 
		$size = strlen($chars) - 1; 
		$password = ''; 
		while($length--) {
			$password .= $chars[random_int(0, $size)]; 
		}
		return $password;
	}
	 
	$user_pass = gen_password(8);
	
	$user = new CUser;
	$arFields = Array(
		"NAME"              => $_POST['first_name'],
		"LAST_NAME"         => $_POST['last_name'],
		"EMAIL"             => $_POST['email'],
		"LOGIN"             => $_POST['email'],
		"LID"               => "ru",
		"ACTIVE"            => "Y",
		"GROUP_ID"          => array(6),
		"PASSWORD"          => $user_pass,
		"CONFIRM_PASSWORD"  => $user_pass
	);

	

	$ID = $user->Add($arFields);
	if (intval($ID) > 0){
		array_push($messages, "Пользователь ".$ID." успешно добавлен.");
		$user_id = $ID;


	}else{
		array_push($messages, $user->LAST_ERROR);
	}
	$user_tag = 'new';
}




$siteId = 's1';
$userId = $user_id;
$order = \Bitrix\Sale\Order::create($siteId, $userId);
$order->setPersonTypeId(1); // 1 - ID типа плательщика

$order->setBasket($myBasket);

	$basket = $order->getBasket();	
	foreach ($basket as $basketItem) {
		
		$id = $basketItem->getField('PRODUCT_ID');

		$mxResult = CCatalogSku::GetProductInfo($id);

		if (is_array($mxResult)) {
			$propsSubtitle = CIBlockElement::GetProperty(10, $mxResult['ID'], array("sort" => "asc"), array("CODE" => "SUBTITLE"));
			$propsForma = CIBlockElement::GetProperty(10, $mxResult['ID'], array("sort" => "asc"), array("CODE" => "FORMA"));

			if ($ar_props = $propsSubtitle->Fetch()) {
				$propSecondName = $ar_props["VALUE"];
			}
			if ($ar_props = $propsForma->Fetch()) {
				$propForma = $ar_props["VALUE"];
			}
		}


		$basketItem->setField('NAME', $basketItem->getField('NAME').', '. $propSecondName.', '.$propForma);
		
	}	

	$basket->save();

  $result = $order->save();
	CEvent::SendImmediate("SALE_NEW_ORDER", 's1', $arEventFields, "N", 37);
	
	

  if (!$result->isSuccess())
      {
        var_dump($result->getErrors()); 
      }
      
      ?>
      <?/*
      <pre><?//print_r($result)?></pre>
			*/?>


<?
  
}else{
	array_push($messages, "Ошибка почтового сервера!");
	
}

if($user_tag == 'new'){
	$arFeedForm = array(
		"CUSTOMER_NAME" => htmlspecialcharsEx($_POST['email']),
		"CUSTOMER_PASS" => htmlspecialcharsEx($user_pass),
		"EMAIL" => htmlspecialcharsEx($_POST['email']),
		"DEFAULT_EMAIL_FROM" => "info@aez.com.tr",
		"SITE_NAME" => "AEZ",
	);
	CEvent::Send('USER_INFO', $SITE_ID, $arFeedForm );

}



  



echo json_encode($json_response, JSON_UNESCAPED_UNICODE);

CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());

die();


?>