<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if (!CModule::IncludeModule("sale")) return;

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
		array("ID", "PRODUCT_ID", "QUANTITY", "NAME", "PRODUCT_PROVIDER_CLASS", "CURRENCY")

	);


	while ($arItems = $dbBasketItems->Fetch()) {
		$arBasketItems[] = $arItems;
		$arBasketItemsID[] = $arItems["PRODUCT_ID"];
		$arBasketIDproductID[$arItems['ID']] = $arItems["PRODUCT_ID"];


		//$arBasketItems["PROPERTIES"] = $dbBasketItems->GetProperties();
	}
}
//$arBasketItems = CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
?>

<?
$code = $APPLICATION->CaptchaGetCode();
?>
<? foreach ($arBasketItems as $key => $item) { ?>


<?

	$mxResult = CCatalogSku::GetProductInfo($item["PRODUCT_ID"]);

	if (is_array($mxResult)) {
		$propsSubtitle = CIBlockElement::GetProperty(10, $mxResult['ID'], array("sort" => "asc"), array("CODE" => "SUBTITLE"));
		$propsForma = CIBlockElement::GetProperty(10, $mxResult['ID'], array("sort" => "asc"), array("CODE" => "FORMA"));
		
		if ($ar_props = $propsSubtitle->Fetch()) {
			$arBasketItems[$key]['SECOND_NAME'] = $ar_props["VALUE"];
		}
		if ($ar_props = $propsForma->Fetch()) {
			$arBasketItems[$key]['FORMA'] = $ar_props["VALUE"];
		}
	}


	$arBasketItems[$key]['PACKING'] = '';
	$arBasketItems[$key]['NUM'] = '';

	$arSkuSelect = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_CML2_LINK", "PROPERTY_PACKING", "PROPERTY_NUM");
	$arSkuFilter = array("IBLOCK_ID" => 11, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $item["PRODUCT_ID"]);
	$resSku = CIBlockElement::GetList(array(), $arSkuFilter, false, array("nPageSize" => 999), $arSkuSelect);
	while ($ob = $resSku->GetNextElement()) {
		$arSkuFields = $ob->GetFields();
	}
	$arBasketItems[$key]['PACKING'] = $arSkuFields['PROPERTY_PACKING_VALUE'];
	$arBasketItems[$key]['NUM'] = $arSkuFields['PROPERTY_NUM_VALUE'];
} ?>


<?
global $USER;
if (!$USER->IsAuthorized()) : ?>
	<form class="form order__form" action="" method="POST" enctype="multipart/form-data">
		<!-- <div class="form__info">
			<div class="info-block">
				<div class="info-block__inner">Отправить запрос индивидуального синтеза могут только авторизованные пользователи</div>
			</div>
		</div> -->
		<div class="form__body">
			<div class="form__box">
				<div class="form__heading">
					<div class="form__title">
						<h2 class="title title--second">Quick registration</h2>
						<!-- <div class="form__tooltip">
							<div class="tooltip">
								<div class="tooltip__icon"></div>
								<div class="tooltip__desc">Заказ доступен только для авторизованных пользователей</div>
							</div>
						</div> -->
					</div><a class="form__heading-link button button--height js-show-modal" data-bs-toggle="modal" data-bs-target="#modal-login" href="#" data-type="signin">log In</a>
				</div>
				<div class="form__places">
					<div class="form__place">
						<div class="input-place">
							<label class="input-place__label">Name: *</label>
							<input class="input-place__input" type="text" name="first_name" placeholder="Name">
							<div class="input-place__error">Name</div>
						</div>
					</div>
					<div class="form__place">
						<div class="input-place">
							<label class="input-place__label">Surname: *</label>
							<input class="input-place__input" type="text" name="last_name" placeholder="Surname">
							<div class="input-place__error">Surname</div>
						</div>
					</div>
					<div class="form__place">
						<div class="input-place">
							<label class="input-place__label">Email: *</label>
							<input class="input-place__input" type="email" name="email" placeholder="Email">
							<div class="input-place__error">Email</div>
						</div>
					</div>
					<div class="form__place">
						<div class="input-place">
							<label class="input-place__label">Phone: *</label>
							<input class="input-place__input js-input-phone" type="tel" name="phone">
							<div class="input-place__error">Phone</div>
						</div>
					</div>
					<div class="form__place">
						<div class="input-place">
							<label class="input-place__label">Organization: *</label>
							<input class="input-place__input" type="text" name="company" placeholder="Organization">
							<div class="input-place__error">Organization</div>
						</div>
					</div>
					<div class="form__place">
						<div class="input-place">
							<label class="input-place__label">Country: *</label>
							<select class="select js-select" name="country" placeholder="Country" data-search="false" data-type="search">
								<option value="" placeholder>Country</option>
								<option>Russia</option>
								<option>Ukraine</option>
								<option>Belarus</option>
							</select>
						</div>
						<div class="input-place__error">Country</div>
					</div>
					<div class="form__place form__place--width">
						<div class="input-place">
							<input class="input-place__checkbox" id="agree" type="checkbox" name="agree" required>
							<label class="input-place__checkbox-label" for="agree">I agree with <a class="input-place__link" href="#">&nbsp;the personal data processing policy</a></label>
						</div>
					</div>
				</div>
			</div>
			<div class="form__box">

				<h2 class="title title--second">Comment on the request</h2>
				<p>Please specify the order details in the comments below, you can also attach additional files.</p>
				<div class="form__part">
					<div class="form__place form__place--width">
						<div class="input-place input-place--height">
							<textarea class="input-place__input input-place__input--textarea" name="massage" placeholder="Your comment to request"></textarea>
						</div>
					</div>
					<div class="form__place form__place--width">
						<div class="input-place input-place--file">
							<label class="input-place__label">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M3.25808 8.70608L7.85508 4.11008C8.32469 3.6447 8.95952 3.38429 9.62067 3.38583C10.2818 3.38737 10.9154 3.65074 11.3829 4.1183C11.8503 4.58587 12.1135 5.21956 12.1148 5.8807C12.1162 6.54185 11.8556 7.17661 11.3901 7.64608L6.08708 12.9491C5.89848 13.1312 5.64588 13.232 5.38368 13.2298C5.12148 13.2275 4.87067 13.1223 4.68526 12.9369C4.49985 12.7515 4.39469 12.5007 4.39241 12.2385C4.39013 11.9763 4.49092 11.7237 4.67308 11.5351L9.97608 6.23108C10.0672 6.13678 10.1176 6.01048 10.1164 5.87938C10.1153 5.74829 10.0627 5.62288 9.96999 5.53018C9.87729 5.43747 9.75188 5.38489 9.62078 5.38375C9.48968 5.38261 9.36338 5.43301 9.26908 5.52408L3.96508 10.8291C3.59007 11.2042 3.37944 11.713 3.37953 12.2434C3.37958 12.5061 3.43136 12.7662 3.53191 13.0088C3.63247 13.2514 3.77983 13.4719 3.96558 13.6576C4.15134 13.8433 4.37185 13.9906 4.61452 14.091C4.8572 14.1915 5.11728 14.2432 5.37993 14.2431C5.91038 14.243 6.41907 14.0322 6.79408 13.6571L12.0971 8.35408C12.7535 7.69767 13.1223 6.80739 13.1223 5.87908C13.1223 4.95078 12.7535 4.0605 12.0971 3.40408C11.4407 2.74767 10.5504 2.37891 9.62208 2.37891C8.69378 2.37891 7.80349 2.74767 7.14708 3.40408L2.55108 7.99908C2.50333 8.04521 2.46524 8.10038 2.43903 8.16138C2.41283 8.22238 2.39903 8.28799 2.39846 8.35438C2.39788 8.42077 2.41053 8.48661 2.43567 8.54806C2.46081 8.60951 2.49794 8.66534 2.54488 8.71228C2.59183 8.75923 2.64766 8.79635 2.7091 8.8215C2.77055 8.84664 2.83639 8.85929 2.90278 8.85871C2.96917 8.85813 3.03478 8.84434 3.09578 8.81814C3.15679 8.79193 3.21196 8.75384 3.25808 8.70608Z" fill="#7B5DE4"/>
								</svg><span>Attach Files</span>
								<input type="file" name="file" multiple="multiple" id="upload-btn">
							</label><span class="input-place__desc">You can attach up to 5 files</span>
						</div>
					</div>
				</div>
				<input type="hidden" name="url" value="<?= $_SERVER['REQUEST_URI'] ?>">
				<input type="hidden" name="products" value="">
				<div class="form__place">
					<button class="form__submit button" type="submit">Send Request</button>
				</div>
			</div>
		</div>
	</form>
<? else : ?>
	<form class="form order__form" action="" method="POST" enctype="multipart/form-data">
		<div class="form__body">
			<?
			$rsUser = CUser::GetByID($USER->GetID());
			$arUser = $rsUser->Fetch();

			?>
			<div class="form__box">
				<input type="hidden" name="first_name" value="<?= $arUser['NAME'] ?>">
				<input type="hidden" name="last_name" value="<?= $arUser['LAST_NAME'] ?>">
				<input type="hidden" name="email" value="<?= $arUser['EMAIL'] ?>">
				<input type="hidden" name="phone" value="<?= $arUser['PERSONAL_PHONE'] ?>">
				<input type="hidden" name="company" value="<?= $arUser['WORK_COMPANY'] ?>">
				<input type="hidden" name="country" value="<?= GetCountryByID($arUser['WORK_COUNTRY'], "ru"); ?>">


				<h2 class="title title--second">Comment on the request</h2>
				<p>Please specify the order details in the comments below, you can also attach additional files.</p>
				<div class="form__part">
					<div class="form__place form__place--width">
						<div class="input-place input-place--height">
							<textarea class="input-place__input input-place__input--textarea" name="massage" placeholder="Your comment to request"></textarea>
						</div>
					</div>
					<div class="form__place form__place--width">
						<div class="input-place input-place--file">
							<label class="input-place__label">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
								<path d="M3.25808 8.70608L7.85508 4.11008C8.32469 3.6447 8.95952 3.38429 9.62067 3.38583C10.2818 3.38737 10.9154 3.65074 11.3829 4.1183C11.8503 4.58587 12.1135 5.21956 12.1148 5.8807C12.1162 6.54185 11.8556 7.17661 11.3901 7.64608L6.08708 12.9491C5.89848 13.1312 5.64588 13.232 5.38368 13.2298C5.12148 13.2275 4.87067 13.1223 4.68526 12.9369C4.49985 12.7515 4.39469 12.5007 4.39241 12.2385C4.39013 11.9763 4.49092 11.7237 4.67308 11.5351L9.97608 6.23108C10.0672 6.13678 10.1176 6.01048 10.1164 5.87938C10.1153 5.74829 10.0627 5.62288 9.96999 5.53018C9.87729 5.43747 9.75188 5.38489 9.62078 5.38375C9.48968 5.38261 9.36338 5.43301 9.26908 5.52408L3.96508 10.8291C3.59007 11.2042 3.37944 11.713 3.37953 12.2434C3.37958 12.5061 3.43136 12.7662 3.53191 13.0088C3.63247 13.2514 3.77983 13.4719 3.96558 13.6576C4.15134 13.8433 4.37185 13.9906 4.61452 14.091C4.8572 14.1915 5.11728 14.2432 5.37993 14.2431C5.91038 14.243 6.41907 14.0322 6.79408 13.6571L12.0971 8.35408C12.7535 7.69767 13.1223 6.80739 13.1223 5.87908C13.1223 4.95078 12.7535 4.0605 12.0971 3.40408C11.4407 2.74767 10.5504 2.37891 9.62208 2.37891C8.69378 2.37891 7.80349 2.74767 7.14708 3.40408L2.55108 7.99908C2.50333 8.04521 2.46524 8.10038 2.43903 8.16138C2.41283 8.22238 2.39903 8.28799 2.39846 8.35438C2.39788 8.42077 2.41053 8.48661 2.43567 8.54806C2.46081 8.60951 2.49794 8.66534 2.54488 8.71228C2.59183 8.75923 2.64766 8.79635 2.7091 8.8215C2.77055 8.84664 2.83639 8.85929 2.90278 8.85871C2.96917 8.85813 3.03478 8.84434 3.09578 8.81814C3.15679 8.79193 3.21196 8.75384 3.25808 8.70608Z" fill="#7B5DE4"/>
							</svg>	<span>Attach Files</span>
								<input type="file" name="file" multiple="multiple" id="upload-btn">
							</label><span class="input-place__desc">You can attach up to 5 files</span>
						</div>
					</div>
					<div class="form__place form__place--width">
						<div class="input-place">
							<input class="input-place__checkbox" id="agree" type="checkbox" name="agree">
							<label class="input-place__checkbox-label" for="agree">I agree with <a class="input-place__link" href="#">&nbsp;the personal data processing policy</a></label>
						</div>
					</div>
				</div>
				<input type="hidden" name="url" value="<?= $_SERVER['REQUEST_URI'] ?>">
				<input type="hidden" name="products" value="">
				<div class="form__place">
					<button class="form__submit button" type="submit">Send Request</button>
				</div>
			</div>
		</div>
	</form>
<? endif ?>
<button class="btn" data-bs-toggle="modal" data-bs-target="#success" style="display: none;">success</button>
<button class="btn" data-bs-toggle="modal" data-bs-target="#error" style="display: none;">error</button>





<script>
	$(document).ready(function() {
		$('.order__form').on('submit', function(e) {
			e.preventDefault();
			var json = <?= json_encode($arBasketItems, JSON_UNESCAPED_UNICODE); ?>;
			var formData = new FormData(this);
			var files = document.getElementById('upload-btn').files;
			for (let i = 0; i < files.length; i++) {
				formData.append(i, files[i])
			}
			//$('.basket').val(json);
			formData.append('basket', JSON.stringify(json))



			$.ajax({
				type: "POST",
				method: 'POST',
				//crossDomain : true,
				url: '/ajax/send.php',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				//dataType:'json',

				success: function(data) {
					// console.log('success');
					// console.log(data);

					var dataJSON = JSON.parse(data);
					console.log(dataJSON);
					if (dataJSON.error.length > 0) {
						$('.modal#error .modal__text').html(dataJSON.error);
						$('.btn[data-bs-target="#error"]').click();
					} else {
						$('.btn[data-bs-target="#success"]').click();
						
						$('.modal#success .btn-close').on('click', function () {
							location.reload();
						});
					}

				},
				error: function(request, status, error) {
					console.log("error");
				}

			});
			return false;
		});


		var arFiles = [];
		$(document).on('change', '#upload-btn', function(e) {
			var $this = $(this);
			var $ctrFiles = $('.input-place__desc');
			var value = $this.val();
			var fileCnt = $ctrFiles.find('.item').length;

			if (fileCnt >= 5) {
				alert('You can attach up to 5 files');
				return false;
			}

			for (var i = 0; i < this.files.length; i++) {
				console.log(this.files[i].name);
			}

			if (value && !arFiles.includes(value)) {
				arFiles.push(value);
				$ctrFiles.append($('<div class="item"><div class="cls"></div>' + value + '</div>').append($this.clone().attr('id', 'att_' + Date.now()).attr('name', 'attach[]')));

			}

		});

		$(document).on('click', '.input-place__desc .item .cls', function(e) {
			$(this).closest('.item').remove();
		});



	});
</script>