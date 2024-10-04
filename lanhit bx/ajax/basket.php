<?php
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
?>

<?
if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {
	
	function getBasketItems(){
		
		$arID = array();
		$arBasketItems = array();
		$dbBasketItems = CSaleBasket::GetList(
			array(
				"NAME" => "ASC",
				"ID" => "ASC"
			),
			array(
				"FUSER_ID" => CSaleBasket::GetBasketUserID(),
				"LID" => SITE_ID,
				"ORDER_ID" => "NULL"
			),
			false,
			false,
			array("ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "PRODUCT_PROVIDER_CLASS")
		);
		while ($arItems = $dbBasketItems->Fetch()) {
			if ('' != $arItems['PRODUCT_PROVIDER_CLASS'] || '' != $arItems["CALLBACK_FUNC"]) {
				CSaleBasket::UpdatePrice(
					$arItems["ID"],
					$arItems["CALLBACK_FUNC"],
					$arItems["MODULE"],
					$arItems["PRODUCT_ID"],
					$arItems["QUANTITY"],
					"N",
					$arItems["PRODUCT_PROVIDER_CLASS"]
				);
				$arID[] = $arItems["ID"];
			}
		}
		if (!empty($arID)) {
			$dbBasketItems = CSaleBasket::GetList(
				array(
					"NAME" => "ASC",
					"ID" => "ASC"
				),
				array(
					"ID" => $arID,
					"ORDER_ID" => "NULL"
				),
				false,
				false,
				array("ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY",  "PRODUCT_PROVIDER_CLASS", "NAME", "DETAIL_PAGE_URL",  "PREVIEW_PICTURE")
				
			);
			while ($arItems = $dbBasketItems->Fetch()) {
				$arBasketItems[] = $arItems;
			}
		}
		
		return $arBasketItems;
		
	}
	
	function getAllItems(){
		
		$arID = array();
		$arBasketItems = array();
		$dbBasketItems = CSaleBasket::GetList(
			array(
				"NAME" => "ASC",
				"ID" => "ASC"
			),
			array(
				"FUSER_ID" => CSaleBasket::GetBasketUserID(),
				"LID" => SITE_ID,
				"ORDER_ID" => "NULL"
			),
			false,
			false,
			array("ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "PRODUCT_PROVIDER_CLASS")
		);
		while ($arItems = $dbBasketItems->Fetch()) {
			if ('' != $arItems['PRODUCT_PROVIDER_CLASS'] || '' != $arItems["CALLBACK_FUNC"]) {
				CSaleBasket::UpdatePrice(
					$arItems["ID"],
					$arItems["CALLBACK_FUNC"],
					$arItems["MODULE"],
					$arItems["PRODUCT_ID"],
					$arItems["QUANTITY"],
					"N",
					$arItems["PRODUCT_PROVIDER_CLASS"]
				);
				$arID[] = $arItems["ID"];
			}
		}
		if (!empty($arID)) {
			$dbBasketItems = CSaleBasket::GetList(
				array(
					"NAME" => "ASC",
					"ID" => "ASC"
				),
				array(
					"ID" => $arID,
					"ORDER_ID" => "NULL"
				),
				false,
				false,
				array("ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY",  "PRODUCT_PROVIDER_CLASS", "NAME", "DETAIL_PAGE_URL",  "PREVIEW_PICTURE")
				
			);
			while ($arItems = $dbBasketItems->Fetch()) {
				$arBasketItems[] = $arItems;
				$arBasketItemsID[] = $arItems["PRODUCT_ID"];
				$arBasketIDproductID[$arItems['ID']] = $arItems["PRODUCT_ID"];
			}
		}

		// Проверяем элементы в корзине это товары или торговые предложения

		foreach ($arBasketItemsID as $productID) {

			$filter = array( 'IBLOCK_ID' => 10, 'ID' => $productID );
			$res = CIBlockElement::GetList(array(), $filter);

			if ($arItem = $res->Fetch()) {
				$arBasketProductID[] = $productID;
			} else {
				$arBasketSkuID[] = $productID;
			}
		}

		$arSkuFields = array();
		$arProductFields = array();
		$arProductFieldsAll = array();

		if($arBasketSkuID){
			$arSkuSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_CML2_LINK", "PROPERTY_PACKING", "PROPERTY_NUM");
			$arSkuFilter = Array("IBLOCK_ID"=>11, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arBasketItemsID);
			$resSku = CIBlockElement::GetList(Array(), $arSkuFilter, false, Array("nPageSize"=>999), $arSkuSelect);
			while($ob = $resSku->GetNextElement())
			{
			 $arSkuFields[] = $ob->GetFields();
			 $arProductFieldsAll[] = $ob->GetFields();
			 
			}
		}
		if($arBasketProductID){
			$arProductSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_SUBTITLE", "PROPERTY_CAS", "PROPERTY_PRODUCT_ID", "PROPERTY_FMATER", "PROPERTY_PACKING");
			$arProductFilter = Array("IBLOCK_ID"=>10, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arBasketProductID);
			$resProduct = CIBlockElement::GetList(Array(), $arProductFilter, false, Array("nPageSize"=>999), $arProductSelect);
			while($ob = $resProduct->GetNextElement())
			{
			$arProductFields[] = $ob->GetFields();
			$arProductFieldsAll[] = $ob->GetFields();
			}
		}
		
		return $arProductFieldsAll;
		 
	}
	
	function productUpdateInBasket($PRODUCT_ID, $action, $pack ) {
		
		$arID = array();
		$arBasketItems = array();
		$dbBasketItems = CSaleBasket::GetList(
			array(
				"NAME" => "ASC",
				"ID" => "ASC"
			),
			array(
				"FUSER_ID" => CSaleBasket::GetBasketUserID(),
				"LID" => SITE_ID,
				"ORDER_ID" => "NULL",
				"PRODUCT_ID"=>$PRODUCT_ID
			),
			false,
			false,
			array("ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "PRODUCT_PROVIDER_CLASS")
		);
		while ($arItems = $dbBasketItems->Fetch()) {
			if ('' != $arItems['PRODUCT_PROVIDER_CLASS'] || '' != $arItems["CALLBACK_FUNC"]) {
				CSaleBasket::UpdatePrice(
					$arItems["ID"],
					$arItems["CALLBACK_FUNC"],
					$arItems["MODULE"],
					$arItems["PRODUCT_ID"],
					$arItems["QUANTITY"],
					"N",
					$arItems["PRODUCT_PROVIDER_CLASS"]
				);
				$arBasketItems[] = $arItems;
			}
		}
		
		$ths_pack = 1;
		if($pack){
			$ths_pack = $pack;
		}
		
		if($action == 'plus'){
			$new_quantity = $arBasketItems[0]['QUANTITY']+$pack;
		}
		if($action == 'minus'){
			$new_quantity = $arBasketItems[0]['QUANTITY']-$pack;
		}
		if($action == 'delete'){
			$new_quantity = 0;
		}
		
		if($new_quantity<0){
			$new_quantity = 0;
		}
		
		CSaleBasket::Update($arBasketItems[0]['ID'], array("QUANTITY"=>$new_quantity));
		
	}
	
	$id = $_POST['id'];
	$action = $_POST['action'];
	$pack = $_POST['pack'];
	
	if($action == 'plus' or $action == 'minus' or $action == 'delete'){
		productUpdateInBasket($id, $action, 1);
	}
}
?>


<?
$basketItems = getAllItems();
$arBasketItems = getBasketItems();

foreach($basketItems as $item){

	if($item["PROPERTY_CML2_LINK_VALUE"]){
		$arProductSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_SUBTITLE", "PROPERTY_CAS");
		$arProductFilter = Array("IBLOCK_ID"=>10, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$item["PROPERTY_CML2_LINK_VALUE"]);
		$resProduct = CIBlockElement::GetList(Array(), $arProductFilter, false, Array("nPageSize"=>9999), $arProductSelect);
		while($ob = $resProduct->GetNextElement())
		{
			$arProductFields = $ob->GetFields();

		}
	
	
	$found_key = array_search($item['ID'], array_column($arBasketItems, 'PRODUCT_ID'));


	$img_src = '';
	if($arProductFields['PREVIEW_PICTURE'] != ''){
		$img = CFile::ResizeImageGet($arProductFields['PREVIEW_PICTURE'], array('width'=>90, 'height'=>71), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		$img_src = $img['src'];
	}else{
		$img_src = '/bitrix/templates/aez/components/bitrix/catalog.section/bootstrap_v4/images/no_photo.png';
	}
	?>
	
	
	<div class="basket__product">
		<div class="product-item">
			<div class="product-item__inner"><a class="product-item__preview" href="<?=$item['DETAIL_PAGE_URL']?>">
					<div class="product-item__img"><img src="<?=$img_src?>" alt="product-preview"></div>
					<div class="product-item__wrap">
						<div class="product-item__name"><?=$arProductFields["NAME"]?></div>
						<div class="product-item__title"><?=$arProductFields["PROPERTY_SUBTITLE_VALUE"]?></div>
					</div>
				</a>
				<div class="product-item__column">
					<div class="product-item__title">CAS:</div><a class="product-item__text text-attention" href="#"><?=$arProductFields["PROPERTY_CAS_VALUE"]?></a>
				</div>
				<div class="product-item__column product-item__column--l">
					<div class="product-item__title">AR:</div><a class="product-item__text text-attention" href="#"><?=$item['PROPERTY_NUM_VALUE']?></a>
				</div>
				<div class="product-item__column product-item__column--m">
					<div class="product-item__title">Size:</div>
					<div class="product-item__text product-item__text--color"><?=$item['PROPERTY_PACKING_VALUE']?> g</div>
				</div>
				<div class="product-item__column product-item__column--m product-item__column--xl">
					<div class="product-item__title">Quantity:</div>
					<div class="product-item__count">
						<div class="input-number input-number--mobile">
							<button class="input-number__minus js-change-count" type="button" data-action="minus" data-pack="1" data-id="<?=$item['ID']?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
								<rect width="26" height="26" rx="7" fill="url(#paint0_linear_348_2113)"/>
								<path d="M18.6667 13H8" stroke="white" stroke-width="2" stroke-linecap="round"/>
								<defs>
									<linearGradient id="paint0_linear_348_2113" x1="13" y1="0" x2="13" y2="26" gradientUnits="userSpaceOnUse">
										<stop stop-color="#9679FC"/>
										<stop offset="1" stop-color="#7658E0"/>
									</linearGradient>
								</defs>
							</svg>

							</button>
							<input class="input-number__input js-input-number-course" type="number" name="count" value="<?=$arBasketItems[$found_key]['QUANTITY'];?>" readonly>
							<button class="input-number__plus js-change-count" type="button" data-action="plus" data-pack="1" data-id="<?=$item['ID']?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
								<rect width="26" height="26" rx="7" fill="url(#paint0_linear_348_2110)"/>
								<path d="M13.3333 18.6667V13.3333M13.3333 13.3333V8M13.3333 13.3333H18.6667M13.3333 13.3333H8" stroke="white" stroke-width="2" stroke-linecap="round"/>
								<defs>
									<linearGradient id="paint0_linear_348_2110" x1="13" y1="0" x2="13" y2="26" gradientUnits="userSpaceOnUse">
										<stop stop-color="#9679FC"/>
										<stop offset="1" stop-color="#7658E0"/>
									</linearGradient>
								</defs>
							</svg>

							</button>
						</div>
					</div>
				</div>
				<div class="product-item__column product-item__column--s product-item__column--mobile">
					<button class="product-item__delete" data-id="<?=$item['ID']?>" data-action="delete">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M12 1.75C12.8301 1.74995 13.6288 2.06755 14.2322 2.63767C14.8356 3.20779 15.198 3.98719 15.245 4.816L15.25 5H20.5C20.69 5.00006 20.8729 5.07224 21.0118 5.20197C21.1506 5.3317 21.2351 5.5093 21.248 5.69888C21.261 5.88846 21.2015 6.07589 21.0816 6.2233C20.9617 6.37071 20.7902 6.4671 20.602 6.493L20.5 6.5H19.704L18.424 19.52C18.3599 20.1691 18.0671 20.7743 17.598 21.2275C17.1289 21.6806 16.5139 21.9523 15.863 21.994L15.687 22H8.313C7.66046 22 7.02919 21.7679 6.53201 21.3453C6.03482 20.9227 5.70412 20.337 5.599 19.693L5.576 19.519L4.295 6.5H3.5C3.31876 6.49999 3.14366 6.43436 3.00707 6.31523C2.87048 6.19611 2.78165 6.03155 2.757 5.852L2.75 5.75C2.75001 5.56876 2.81564 5.39366 2.93477 5.25707C3.05389 5.12048 3.21845 5.03165 3.398 5.007L3.5 5H8.75C8.75 4.13805 9.09241 3.3114 9.7019 2.7019C10.3114 2.09241 11.138 1.75 12 1.75ZM18.197 6.5H5.802L7.069 19.372C7.09705 19.6592 7.22362 19.9279 7.42722 20.1324C7.63082 20.3369 7.89892 20.4647 8.186 20.494L8.313 20.5H15.687C16.287 20.5 16.796 20.075 16.912 19.498L16.932 19.372L18.196 6.5H18.197ZM13.75 9.25C13.9312 9.25001 14.1063 9.31564 14.2429 9.43477C14.3795 9.55389 14.4684 9.71845 14.493 9.898L14.5 10V17C14.4999 17.19 14.4278 17.3729 14.298 17.5118C14.1683 17.6506 13.9907 17.7351 13.8011 17.748C13.6115 17.761 13.4241 17.7015 13.2767 17.5816C13.1293 17.4617 13.0329 17.2902 13.007 17.102L13 17V10C13 9.80109 13.079 9.61032 13.2197 9.46967C13.3603 9.32902 13.5511 9.25 13.75 9.25ZM10.25 9.25C10.4312 9.25001 10.6063 9.31564 10.7429 9.43477C10.8795 9.55389 10.9684 9.71845 10.993 9.898L11 10V17C10.9999 17.19 10.9278 17.3729 10.798 17.5118C10.6683 17.6506 10.4907 17.7351 10.3011 17.748C10.1115 17.761 9.92411 17.7015 9.7767 17.5816C9.62929 17.4617 9.5329 17.2902 9.507 17.102L9.5 17V10C9.5 9.80109 9.57902 9.61032 9.71967 9.46967C9.86032 9.32902 10.0511 9.25 10.25 9.25ZM12 3.25C11.5608 3.25002 11.1377 3.41517 10.8146 3.71268C10.4915 4.01019 10.2921 4.4183 10.256 4.856L10.25 5H13.75C13.75 4.53587 13.5656 4.09075 13.2374 3.76256C12.9092 3.43437 12.4641 3.25 12 3.25Z" fill="#7B5DE4"/>
					</svg>

					</button>
				</div>
			</div>
		</div>
	</div>
<?
}else{
	$found_key = array_search($item['ID'], array_column($arBasketItems, 'PRODUCT_ID'));
	?>



	<div class="basket__product">
		<div class="product-item">
			<div class="product-item__inner"><a class="product-item__preview" href="<?=$item['DETAIL_PAGE_URL']?>">
					<div class="product-item__img"><img src="<?=$img_src?>" alt="product-preview"></div>
					<div class="product-item__wrap">
						<div class="product-item__name"><?=$item["NAME"]?></div>
						<div class="product-item__title"><?=$item["PROPERTY_SUBTITLE_VALUE"]?></div>
					</div>
				</a>
				<div class="product-item__column">
					<div class="product-item__title">CAS:</div><a class="product-item__text text-attention" href="#"><?=$item["PROPERTY_CAS_VALUE"]?></a>
				</div>
				<div class="product-item__column product-item__column--l">
					<div class="product-item__title">AR:</div><a class="product-item__text text-attention" href="#"><?=$item['PROPERTY_NUM_VALUE']?></a>
				</div>
				<div class="product-item__column product-item__column--m">
					<div class="product-item__title">Size:</div>
					<div class="product-item__text product-item__text--color"><?=$item['PROPERTY_PACKING_VALUE']?> g</div>
				</div>
				<div class="product-item__column product-item__column--m product-item__column--xl">
					<div class="product-item__title">Quantity:</div>
					<div class="product-item__count">
						<div class="input-number input-number--mobile">
							<button class="input-number__minus js-change-count" type="button" data-action="minus" data-pack="1" data-id="<?=$item['ID']?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
								<rect width="26" height="26" rx="7" fill="url(#paint0_linear_348_2113)"/>
								<path d="M18.6667 13H8" stroke="white" stroke-width="2" stroke-linecap="round"/>
								<defs>
									<linearGradient id="paint0_linear_348_2113" x1="13" y1="0" x2="13" y2="26" gradientUnits="userSpaceOnUse">
										<stop stop-color="#9679FC"/>
										<stop offset="1" stop-color="#7658E0"/>
									</linearGradient>
								</defs>
							</svg>

							</button>
							<input class="input-number__input js-input-number-course" type="number" name="count" value="<?=$arBasketItems[$found_key]['QUANTITY'];?>" readonly>
							<button class="input-number__plus js-change-count" type="button" data-action="plus" data-pack="1" data-id="<?=$item['ID']?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
								<rect width="26" height="26" rx="7" fill="url(#paint0_linear_348_2110)"/>
								<path d="M13.3333 18.6667V13.3333M13.3333 13.3333V8M13.3333 13.3333H18.6667M13.3333 13.3333H8" stroke="white" stroke-width="2" stroke-linecap="round"/>
								<defs>
									<linearGradient id="paint0_linear_348_2110" x1="13" y1="0" x2="13" y2="26" gradientUnits="userSpaceOnUse">
										<stop stop-color="#9679FC"/>
										<stop offset="1" stop-color="#7658E0"/>
									</linearGradient>
								</defs>
							</svg>

							</button>
						</div>
					</div>
				</div>
				<div class="product-item__column product-item__column--s product-item__column--mobile">
					<button class="product-item__delete" data-id="<?=$item['ID']?>" data-action="delete">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M12 1.75C12.8301 1.74995 13.6288 2.06755 14.2322 2.63767C14.8356 3.20779 15.198 3.98719 15.245 4.816L15.25 5H20.5C20.69 5.00006 20.8729 5.07224 21.0118 5.20197C21.1506 5.3317 21.2351 5.5093 21.248 5.69888C21.261 5.88846 21.2015 6.07589 21.0816 6.2233C20.9617 6.37071 20.7902 6.4671 20.602 6.493L20.5 6.5H19.704L18.424 19.52C18.3599 20.1691 18.0671 20.7743 17.598 21.2275C17.1289 21.6806 16.5139 21.9523 15.863 21.994L15.687 22H8.313C7.66046 22 7.02919 21.7679 6.53201 21.3453C6.03482 20.9227 5.70412 20.337 5.599 19.693L5.576 19.519L4.295 6.5H3.5C3.31876 6.49999 3.14366 6.43436 3.00707 6.31523C2.87048 6.19611 2.78165 6.03155 2.757 5.852L2.75 5.75C2.75001 5.56876 2.81564 5.39366 2.93477 5.25707C3.05389 5.12048 3.21845 5.03165 3.398 5.007L3.5 5H8.75C8.75 4.13805 9.09241 3.3114 9.7019 2.7019C10.3114 2.09241 11.138 1.75 12 1.75ZM18.197 6.5H5.802L7.069 19.372C7.09705 19.6592 7.22362 19.9279 7.42722 20.1324C7.63082 20.3369 7.89892 20.4647 8.186 20.494L8.313 20.5H15.687C16.287 20.5 16.796 20.075 16.912 19.498L16.932 19.372L18.196 6.5H18.197ZM13.75 9.25C13.9312 9.25001 14.1063 9.31564 14.2429 9.43477C14.3795 9.55389 14.4684 9.71845 14.493 9.898L14.5 10V17C14.4999 17.19 14.4278 17.3729 14.298 17.5118C14.1683 17.6506 13.9907 17.7351 13.8011 17.748C13.6115 17.761 13.4241 17.7015 13.2767 17.5816C13.1293 17.4617 13.0329 17.2902 13.007 17.102L13 17V10C13 9.80109 13.079 9.61032 13.2197 9.46967C13.3603 9.32902 13.5511 9.25 13.75 9.25ZM10.25 9.25C10.4312 9.25001 10.6063 9.31564 10.7429 9.43477C10.8795 9.55389 10.9684 9.71845 10.993 9.898L11 10V17C10.9999 17.19 10.9278 17.3729 10.798 17.5118C10.6683 17.6506 10.4907 17.7351 10.3011 17.748C10.1115 17.761 9.92411 17.7015 9.7767 17.5816C9.62929 17.4617 9.5329 17.2902 9.507 17.102L9.5 17V10C9.5 9.80109 9.57902 9.61032 9.71967 9.46967C9.86032 9.32902 10.0511 9.25 10.25 9.25ZM12 3.25C11.5608 3.25002 11.1377 3.41517 10.8146 3.71268C10.4915 4.01019 10.2921 4.4183 10.256 4.856L10.25 5H13.75C13.75 4.53587 13.5656 4.09075 13.2374 3.76256C12.9092 3.43437 12.4641 3.25 12 3.25Z" fill="#7B5DE4"/>
					</svg>

					</button>
				</div>
			</div>
		</div>
	</div>


<?}?>
<?}?>


<?
      
// Ответ всегда возвращаем в JSON
/* header("Content-type: application/json; charset=utf-8");

// класс для возврата результата JSON
class JSONResults {
  public $status = 0;
  public $msg = "Ошибка при подключении модулей";
}
// Список статусов: 0 - ошибка на стороне сервера; 1 - товар добавлен в корзину; -1 - не удалось добавить товар в корзину; 2 - количество товара обновлено; -1 - не удалось обновить количество товара; 3 - товар удалён из корзины; -3 - не удалось удалить товар из корзины
      
// Создаём экземпляр объекта
$JSONResults = new JSONResults;
      
if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {
      
  function productAddToBasket($PRODUCT_ID=0,$QUANTITY=0) {
    return Add2BasketByProductID($PRODUCT_ID,$QUANTITY,array());
  }
      
  function productDeleteFromBasket($PRODUCT_ID=0) {
  //// Выполняем запрос в корзину узнаём есть ли у неё элемент с Ид_товара
    $a = CSaleBasket::GetList(// Выполняем запрос в корзину узнаём есть ли у неё элемент с Ид_товара
      $arOrder = array(),
      $arFilter = array("PRODUCT_ID"=>$PRODUCT_ID),
      $arGroupBy = false,
      $arNavStartParams = false,
      $arSelectFields = array()
    );
    if (count($a->arResult)) {// Если есть получаем Ид этого элемента в корзине(может не совпадать с Ид товара)
      $idProductInBasket = $a->arResult[0]["ID"];
      $arFields_new = array("QUANTITY"=>0);
      return CSaleBasket::Update($idProductInBasket, $arFields_new);
    }
    return false;
  }
      
  function productUpdateInBasket($prodId=0,$QUANTITY=0) {
    if ($prodId == 0) {return false;}
      $basket = \Bitrix\Sale\Basket::loadItemsForFUser(\Bitrix\Sale\Fuser::getId(CSaleBasket::GetBasketUserID()), \Bitrix\Main\Context::getCurrent()->getSite());
      $basket->refresh();

      $dbRes = \Bitrix\Sale\Basket::getList(array(
        "select"=>["PRODUCT_ID","NAME","QUANTITY","ID"],
        "filter"=>array(
        "=FUSER_ID"=>\Bitrix\Sale\Fuser::getId(),
        "=ORDER_ID" => null,
        "=LID"=>\Bitrix\Main\Context::getCurrent()->getSite(),
        "=CAN_BUY"=>"Y",
        "=PRODUCT_ID"=>$prodId
      )
    ));

    $itemId = false;

    while ($item = $dbRes->fetch()) {
      if (isset($item["ID"]) and $item["ID"] and isset($item["PRODUCT_ID"]) and ($item["PRODUCT_ID"] == $prodId)) {
        $itemId = $item["ID"];
      }
    }

    if ($itemId) {
      $itemProd = $basket->getItemById($itemId);
      if ($QUANTITY==0) {
        $itemProd->delete();
      } else {
        $itemProd->setField("QUANTITY",$QUANTITY);
      }
      $basket->save();
      $basket->refresh();
      return true;
   }
  return false;
}
      
  $action = "";
  if (isset($_REQUEST["action"]) and (($_REQUEST["action"] == "add") or ($_REQUEST["action"] == "delete") or ($_REQUEST["action"] == "update"))) {
    $action = $_REQUEST["action"];
  }
      
  $id = 0;
  if (isset($_REQUEST["id"]) and ($_REQUEST["id"] != "")) {
    $id = $_REQUEST["id"];
  }
      
  $QUANTITY = 0;
  if (isset($_REQUEST["count"]) and ($_REQUEST["count"] != "")) {
    $QUANTITY = $_REQUEST["count"];
  }
  if ($action == "add") {
    if (productAddToBasket($id,$QUANTITY)) {
      $JSONResults->status = 1;
      $JSONResults->msg = "Товар добавлен в корзину";
    } else {
      $JSONResults->status = -1;
      $JSONResults->msg = "Не удалось добавить товар в корзину";
    }
  } elseif ($action == "update") {
    if (productUpdateInBasket($id,$QUANTITY)) {
      $JSONResults->status = 2;
      $JSONResults->msg = "Количество товара в корзине обновлено";
    } else {
      $JSONResults->status = -2;
      $JSONResults->msg = "Не удалось обновить количество товара в корзине";
    } 
  } elseif ($action == "delete") {
    if (productDeleteFromBasket($id)) {
      $JSONResults->status = 3;
      $JSONResults->msg = "Товар удалён из корзины";
    } else {
      $JSONResults->status = -3;
      $JSONResults->msg = "Не удалось удалить товар из корзины";
    } 
  }
}
      
echo json_encode($JSONResults); */
?>