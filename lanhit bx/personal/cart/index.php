<?
define("HIDE_SIDEBAR", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Request for a price offer");
if (!CModule::IncludeModule("sale")) return;
?>

<div class="container">
	
	<div class="page-content">
		<h1 class="title">Request for a price offer</h1>

		<?
		
		
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
		// Печатаем массив, содержащий актуальную на текущий момент корзину

		?>
<?

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

	?>

<?

$arSkuFields = array();
$arProductFields = array();

if($arBasketSkuID){


	
	$arSkuSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_CML2_LINK", "PROPERTY_PACKING", "PROPERTY_NUM");
	$arSkuFilter = Array("IBLOCK_ID"=>11, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arBasketSkuID);
	$resSku = CIBlockElement::GetList(Array(), $arSkuFilter, false, Array("nPageSize"=>999), $arSkuSelect);
	while($ob = $resSku->GetNextElement())
	{
	 $arSkuFields[] = $ob->GetFields();
	}
}
?>




<?

if($arBasketProductID){
	$arProductSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_SUBTITLE", "PROPERTY_CAS", "PROPERTY_PRODUCT_ID", "PROPERTY_FMATER", "PROPERTY_PACKING");
	$arProductFilter = Array("IBLOCK_ID"=>10, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$arBasketProductID);
	$resProduct = CIBlockElement::GetList(Array(), $arProductFilter, false, Array("nPageSize"=>999), $arProductSelect);
	while($ob = $resProduct->GetNextElement())
	{
	 $arProductFields[] = $ob->GetFields();
	}
}

?>


		<div class="basket">
			<div class="basket__title">Add products</div>
			<form class="basket__form" action="" method="post">
				<div class="basket__places">
					<div class="basket__place basket__place--l">
						<div class="input-place">
							<label class="input-place__label input-place__label--flex">Article Number:
								<!--.input-place__tooltip-->
								<!--  .tooltip-->
								<!--    .tooltip__icon-->
								<!--    .tooltip__desc-->
								<!--      | Заказ доступен только для авторизованных пользователей-->
							</label>
							<input class="input-place__input" type="text" name="articul" placeholder="Article">
						</div>
					</div>
					<div class="basket__place basket__place--m">
						<div class="input-place">
							<label class="input-place__label">Size:</label>
							<select class="select js-select" name="country" placeholder="Выберите размер">
								<option value="" placeholder>Size</option>
								<option>Size 1</option>
								<option>Size 2</option>
								<option>Size 3</option>
								<option>Size 4</option>
							</select>
						</div>
					</div>
					<div class="basket__place">
						<div class="input-place">
							<label class="input-place__label">Quantity:</label>
							<input class="input-place__input" type="text" name="count" placeholder="Quantity">
						</div>
					</div>
					<div class="basket__place basket__place--btn">
						<button class="basket__submit button">Add product</button>
					</div>
				</div>
			</form>
			<div class="basket__products" id="ajax_basket">
			
				
					<?/*
					echo "111<pre>";
					print_r($arSkuFields);
					echo "</pre>222"; */
					
		foreach($arSkuFields as $sku){?>
			
			<?
			$arProductSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_SUBTITLE", "PROPERTY_CAS", "PROPERTY_PRODUCT_ID", "PROPERTY_FMATER");
			$arProductFilter = Array("IBLOCK_ID"=>10, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>$sku["PROPERTY_CML2_LINK_VALUE"]);
			$resProduct = CIBlockElement::GetList(Array(), $arProductFilter, false, Array("nPageSize"=>9999), $arProductSelect);
			while($ob = $resProduct->GetNextElement())
			{
			$resProductFields = $ob->GetFields();

			}
			
			$found_key = array_search($sku['ID'], array_column($arBasketItems, 'PRODUCT_ID'));


			

			$img_src = '';
			if($resProductFields['PREVIEW_PICTURE'] != ''){
				$img = CFile::ResizeImageGet($resProductFields['PREVIEW_PICTURE'], array('width'=>90, 'height'=>71), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				$img_src = $img['src'];
			}else{
				$img_src = '/bitrix/templates/aez/components/bitrix/catalog.section/bootstrap_v4/images/no_photo.png';
			}?>

				<div class="basket__product">
					<div class="product-item">
						<div class="product-item__inner"><a class="product-item__preview" href="<?=$sku['DETAIL_PAGE_URL']?>">
								<div class="product-item__img"><img src="<?=$img_src;?>" alt="product-preview"></div>
								<div class="product-item__wrap">
									<div class="product-item__name"><?=$resProductFields["NAME"]?></div>
									<div class="product-item__title"><?=$resProductFields["PROPERTY_SUBTITLE_VALUE"]?>, <br><?=$resProductFields["PROPERTY_FMATER_VALUE"]?></div>
								</div>
							</a>
							<div class="product-item__column">
								<div class="product-item__title">CAS:</div><a class="product-item__text text-attention" href="#"><?=$resProductFields["PROPERTY_CAS_VALUE"]?></a>
							</div>
							<div class="product-item__column product-item__column--l">
								<div class="product-item__title">AR:</div><a class="product-item__text text-attention" href="#"><?=$resProductFields["PROPERTY_PRODUCT_ID_VALUE"]?></a>
							</div>
							<div class="product-item__column product-item__column--m">
								<div class="product-item__title">Size:</div>
								<div class="product-item__text product-item__text--color"><?=$sku['PROPERTY_PACKING_VALUE']?> g</div>
							</div>
							<div class="product-item__column product-item__column--m product-item__column--xl">
								<div class="product-item__title">Quantity:</div>
								<div class="product-item__count">
									<div class="input-number input-number--mobile">
										<button class="input-number__minus js-change-count" type="button" data-action="minus" data-pack="1" data-id="<?=$sku['ID']?>">
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
										<button class="input-number__plus js-change-count" type="button" data-action="plus" data-pack="<?=$sku['PROPERTY_PACKING_VALUE']?>" data-id="<?=$sku['ID']?>">
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
								<button class="product-item__delete" data-id="<?=$sku['ID']?>" data-action="delete">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M12 1.75C12.8301 1.74995 13.6288 2.06755 14.2322 2.63767C14.8356 3.20779 15.198 3.98719 15.245 4.816L15.25 5H20.5C20.69 5.00006 20.8729 5.07224 21.0118 5.20197C21.1506 5.3317 21.2351 5.5093 21.248 5.69888C21.261 5.88846 21.2015 6.07589 21.0816 6.2233C20.9617 6.37071 20.7902 6.4671 20.602 6.493L20.5 6.5H19.704L18.424 19.52C18.3599 20.1691 18.0671 20.7743 17.598 21.2275C17.1289 21.6806 16.5139 21.9523 15.863 21.994L15.687 22H8.313C7.66046 22 7.02919 21.7679 6.53201 21.3453C6.03482 20.9227 5.70412 20.337 5.599 19.693L5.576 19.519L4.295 6.5H3.5C3.31876 6.49999 3.14366 6.43436 3.00707 6.31523C2.87048 6.19611 2.78165 6.03155 2.757 5.852L2.75 5.75C2.75001 5.56876 2.81564 5.39366 2.93477 5.25707C3.05389 5.12048 3.21845 5.03165 3.398 5.007L3.5 5H8.75C8.75 4.13805 9.09241 3.3114 9.7019 2.7019C10.3114 2.09241 11.138 1.75 12 1.75ZM18.197 6.5H5.802L7.069 19.372C7.09705 19.6592 7.22362 19.9279 7.42722 20.1324C7.63082 20.3369 7.89892 20.4647 8.186 20.494L8.313 20.5H15.687C16.287 20.5 16.796 20.075 16.912 19.498L16.932 19.372L18.196 6.5H18.197ZM13.75 9.25C13.9312 9.25001 14.1063 9.31564 14.2429 9.43477C14.3795 9.55389 14.4684 9.71845 14.493 9.898L14.5 10V17C14.4999 17.19 14.4278 17.3729 14.298 17.5118C14.1683 17.6506 13.9907 17.7351 13.8011 17.748C13.6115 17.761 13.4241 17.7015 13.2767 17.5816C13.1293 17.4617 13.0329 17.2902 13.007 17.102L13 17V10C13 9.80109 13.079 9.61032 13.2197 9.46967C13.3603 9.32902 13.5511 9.25 13.75 9.25ZM10.25 9.25C10.4312 9.25001 10.6063 9.31564 10.7429 9.43477C10.8795 9.55389 10.9684 9.71845 10.993 9.898L11 10V17C10.9999 17.19 10.9278 17.3729 10.798 17.5118C10.6683 17.6506 10.4907 17.7351 10.3011 17.748C10.1115 17.761 9.92411 17.7015 9.7767 17.5816C9.62929 17.4617 9.5329 17.2902 9.507 17.102L9.5 17V10C9.5 9.80109 9.57902 9.61032 9.71967 9.46967C9.86032 9.32902 10.0511 9.25 10.25 9.25ZM12 3.25C11.5608 3.25002 11.1377 3.41517 10.8146 3.71268C10.4915 4.01019 10.2921 4.4183 10.256 4.856L10.25 5H13.75C13.75 4.53587 13.5656 4.09075 13.2374 3.76256C12.9092 3.43437 12.4641 3.25 12 3.25Z" fill="#7B5DE4"/>
								</svg>
								</button>
							</div>
						</div>
					</div>
				</div>
		<?}?>



		<?

		foreach($arProductFields as $product){?>


			<?
			$img_src = '';
			if($product['PREVIEW_PICTURE']){
				$img = CFile::ResizeImageGet($product['PREVIEW_PICTURE'], array('width'=>90, 'height'=>71), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				$img_src = $img['src'];
			}else{
				$img_src = '/bitrix/templates/aez/components/bitrix/catalog.section/bootstrap_v4/images/no_photo.png';
			}
			$found_key = array_search($product['ID'], array_column($arBasketItems, 'PRODUCT_ID'));
			?>

				<div class="basket__product">
					<div class="product-item">
						<div class="product-item__inner"><a class="product-item__preview" href="<?=$product['DETAIL_PAGE_URL']?>">
								<div class="product-item__img"><img src="<?=$img_src;?>" alt="product-preview"></div>
								<div class="product-item__wrap">
									<div class="product-item__name"><?=$product["NAME"]?></div>
									<div class="product-item__title"><?=$product["PROPERTY_SUBTITLE_VALUE"]?>, <br><?=$product["PROPERTY_FMATER_VALUE"]?></div>
								</div>
							</a>
							<div class="product-item__column">
								<div class="product-item__title">CAS:</div><a class="product-item__text text-attention" href="#"><?=$product["PROPERTY_CAS_VALUE"]?></a>
							</div>
							<div class="product-item__column product-item__column--l">
								<div class="product-item__title">AR:</div><a class="product-item__text text-attention" href="#"><?=$product["PROPERTY_PRODUCT_ID_VALUE"]?></a>
							</div>
							<div class="product-item__column product-item__column--m">
								<div class="product-item__title">Size:</div>
								<div class="product-item__text product-item__text--color">
									<? if($product['PROPERTY_PACKING_VALUE']){?>
								<?=$product['PROPERTY_PACKING_VALUE']?> g
								<?}else{?> - <?}?></div>
							</div>
							<div class="product-item__column product-item__column--m product-item__column--xl">
								<div class="product-item__title">Quantity:</div>
								<div class="product-item__count">
									<div class="input-number input-number--mobile">
										<button class="input-number__minus js-change-count" type="button" data-action="minus" data-pack="1" data-id="<?=$product['ID']?>">
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
										<button class="input-number__plus js-change-count" type="button" data-action="plus" data-pack="1" data-id="<?=$product['ID']?>">
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
								<button class="product-item__delete" data-id="<?=$product['ID']?>" data-action="delete">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M12 1.75C12.8301 1.74995 13.6288 2.06755 14.2322 2.63767C14.8356 3.20779 15.198 3.98719 15.245 4.816L15.25 5H20.5C20.69 5.00006 20.8729 5.07224 21.0118 5.20197C21.1506 5.3317 21.2351 5.5093 21.248 5.69888C21.261 5.88846 21.2015 6.07589 21.0816 6.2233C20.9617 6.37071 20.7902 6.4671 20.602 6.493L20.5 6.5H19.704L18.424 19.52C18.3599 20.1691 18.0671 20.7743 17.598 21.2275C17.1289 21.6806 16.5139 21.9523 15.863 21.994L15.687 22H8.313C7.66046 22 7.02919 21.7679 6.53201 21.3453C6.03482 20.9227 5.70412 20.337 5.599 19.693L5.576 19.519L4.295 6.5H3.5C3.31876 6.49999 3.14366 6.43436 3.00707 6.31523C2.87048 6.19611 2.78165 6.03155 2.757 5.852L2.75 5.75C2.75001 5.56876 2.81564 5.39366 2.93477 5.25707C3.05389 5.12048 3.21845 5.03165 3.398 5.007L3.5 5H8.75C8.75 4.13805 9.09241 3.3114 9.7019 2.7019C10.3114 2.09241 11.138 1.75 12 1.75ZM18.197 6.5H5.802L7.069 19.372C7.09705 19.6592 7.22362 19.9279 7.42722 20.1324C7.63082 20.3369 7.89892 20.4647 8.186 20.494L8.313 20.5H15.687C16.287 20.5 16.796 20.075 16.912 19.498L16.932 19.372L18.196 6.5H18.197ZM13.75 9.25C13.9312 9.25001 14.1063 9.31564 14.2429 9.43477C14.3795 9.55389 14.4684 9.71845 14.493 9.898L14.5 10V17C14.4999 17.19 14.4278 17.3729 14.298 17.5118C14.1683 17.6506 13.9907 17.7351 13.8011 17.748C13.6115 17.761 13.4241 17.7015 13.2767 17.5816C13.1293 17.4617 13.0329 17.2902 13.007 17.102L13 17V10C13 9.80109 13.079 9.61032 13.2197 9.46967C13.3603 9.32902 13.5511 9.25 13.75 9.25ZM10.25 9.25C10.4312 9.25001 10.6063 9.31564 10.7429 9.43477C10.8795 9.55389 10.9684 9.71845 10.993 9.898L11 10V17C10.9999 17.19 10.9278 17.3729 10.798 17.5118C10.6683 17.6506 10.4907 17.7351 10.3011 17.748C10.1115 17.761 9.92411 17.7015 9.7767 17.5816C9.62929 17.4617 9.5329 17.2902 9.507 17.102L9.5 17V10C9.5 9.80109 9.57902 9.61032 9.71967 9.46967C9.86032 9.32902 10.0511 9.25 10.25 9.25ZM12 3.25C11.5608 3.25002 11.1377 3.41517 10.8146 3.71268C10.4915 4.01019 10.2921 4.4183 10.256 4.856L10.25 5H13.75C13.75 4.53587 13.5656 4.09075 13.2374 3.76256C12.9092 3.43437 12.4641 3.25 12 3.25Z" fill="#7B5DE4"/>
								</svg>
								</button>
							</div>
						</div>
					</div>
				</div>
		<?}?>
					
				
				
				
			
				<script>
					// $(document).on('click', '.js-number-plus', function(){
					// 	console.log($(this).attr('data-id'));
					// 	$action = $(this).attr('data-action');
					// 	$id = $(this).attr('data-id');
					// 	$.ajax({
					// 		type: "POST",
					// 		crossDomain : true,
					// 		url: "/ajax/basket.php",
					// 		data: {'action':$action, 'id':$id},
					// 		success: function(result){
					// 			console.log(result);
					// 		},
					// 		fail: function() {
					// 			console.log("fail");
					// 		}
					// 	});
					// })
					$(document).on('click', '.product-item__delete', function(){
						console.log($(this).attr('data-id'));
						$action = $(this).attr('data-action');
						$id = $(this).attr('data-id');
						$.ajax({
							type: "POST",
							crossDomain : true,
							url: "/ajax/basket.php",
							data: {'action':$action, 'id':$id},
							success: function(result){
								$('#ajax_basket').html(result);
								console.log(result);
							},
							fail: function() {
								console.log("fail");
							}
						});
					})
					$(document).on('click', '.js-change-count', function(){
						console.log($(this).attr('data-id'));
						$action = $(this).attr('data-action');
						$id = $(this).attr('data-id');
						$pack = $(this).attr('data-pack');
						$.ajax({
							type: "POST",
							crossDomain : true,
							url: "/ajax/basket.php",
							data: {'action':$action, 'id':$id, 'pack':$pack},
							success: function(result){
								$('#ajax_basket').html(result);
								console.log(result);
							},
							fail: function() {
								console.log("fail");
							}
						});
						return false;
					})
				</script>
				
			</div>
		</div>
		<? $APPLICATION->IncludeFile( SITE_DIR."ajax/order.php", Array(), Array("MODE"=>"html") ); ?>










	<h2 class="title title--second">Details</h2>
	<div class="additionally-list">
		<div class="additionally-list__inner js-slider">
			<div class="additionally-list__item">
				<a class="card" href="/catalog/">
					<div class="card__icon">
						<img src="<?=SITE_TEMPLATE_PATH?>/i/ic001.png" alt="">
					</div>
					<div class="card__name">individual order</div>
					<div class="card__desc">Inform us about the goods you need on individual terms</div>
				</a>
			</div>
			<div class="additionally-list__item">
				<a class="card" href="/faq/">
					<div class="card__icon">
						<img src="<?=SITE_TEMPLATE_PATH?>/i/ic002.png" alt="">
					</div>
					<div class="card__name">FAQ</div>
					<div class="card__desc">We answer the most frequent customer questions</div>
				</a>
			</div>
		</div>
	</div>
</div>
</div>




		<?/*$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket", 
	"zapros", 
	array(
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"COLUMNS_LIST" => array(
			0 => "NAME",
			1 => "DISCOUNT",
			2 => "PRICE",
			3 => "QUANTITY",
			4 => "SUM",
			5 => "PROPS",
			6 => "DELETE",
			7 => "DELAY",
		),
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"PATH_TO_ORDER" => "/personal/order/make/",
		"HIDE_COUPON" => "N",
		"QUANTITY_FLOAT" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"TEMPLATE_THEME" => "site",
		"SET_TITLE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"OFFERS_PROPS" => array(
			0 => "SIZES_SHOES",
			1 => "SIZES_CLOTHES",
			2 => "COLOR_REF",
		),
		"COMPONENT_TEMPLATE" => "zapros",
		"DEFERRED_REFRESH" => "N",
		"USE_DYNAMIC_SCROLL" => "Y",
		"SHOW_FILTER" => "Y",
		"SHOW_RESTORE" => "N",
		"COLUMNS_LIST_EXT" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DISCOUNT",
			2 => "PROPS",
			3 => "DELETE",
			4 => "SUM",
			5 => "PROPERTY_CAS",
			6 => "PROPERTY_PRODUCT_ID",
			7 => "PROPERTY_PACKING",
		),
		"COLUMNS_LIST_MOBILE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DISCOUNT",
			2 => "DELETE",
			3 => "SUM",
			4 => "PROPERTY_CAS",
			5 => "PROPERTY_PRODUCT_ID",
			6 => "PROPERTY_PACKING",
		),
		"TOTAL_BLOCK_DISPLAY" => array(
			0 => "bottom",
		),
		"DISPLAY_MODE" => "extended",
		"PRICE_DISPLAY_MODE" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
		"USE_PRICE_ANIMATION" => "Y",
		"LABEL_PROP" => array(
		),
		"USE_PREPAYMENT" => "N",
		"CORRECT_RATIO" => "Y",
		"AUTO_CALCULATION" => "Y",
		"ACTION_VARIABLE" => "basketAction",
		"COMPATIBLE_MODE" => "Y",
		"EMPTY_BASKET_HINT_PATH" => "/",
		"ADDITIONAL_PICT_PROP_3" => "-",
		"ADDITIONAL_PICT_PROP_4" => "-",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"USE_GIFTS" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"ADDITIONAL_PICT_PROP_8" => "-",
		"ADDITIONAL_PICT_PROP_9" => "-",
		"ADDITIONAL_PICT_PROP_10" => "-",
		"ADDITIONAL_PICT_PROP_11" => "-",
		"ADDITIONAL_PICT_PROP_14" => "-"
	),
	false
);*/ ?>
	</div>
</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>