<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

// Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/script.js");
// Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/style.css");
// $this->addExternalCss("/bitrix/css/main/bootstrap.css");
CJSCore::Init(array('clipboard', 'fx'));

Loc::loadMessages(__FILE__);

if (!empty($arResult['ERRORS']['FATAL'])) {
	foreach ($arResult['ERRORS']['FATAL'] as $error) {
		ShowError($error);
	}
	$component = $this->__component;
	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])) {
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}
} else {
	if (!empty($arResult['ERRORS']['NONFATAL'])) {
		foreach ($arResult['ERRORS']['NONFATAL'] as $error) {
			ShowError($error);
		}
	}
	if (!count($arResult['ORDERS'])) {?>

<div class="warning">

		<?

		if ($_REQUEST["filter_history"] == 'Y') {
			if ($_REQUEST["show_canceled"] == 'Y') {
		?>
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
			<g clip-path="url(#clip0_570_3282)">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M8 1.5C6.27609 1.5 4.62279 2.18482 3.40381 3.40381C2.18482 4.62279 1.5 6.27609 1.5 8C1.5 9.72391 2.18482 11.3772 3.40381 12.5962C4.62279 13.8152 6.27609 14.5 8 14.5C9.72391 14.5 11.3772 13.8152 12.5962 12.5962C13.8152 11.3772 14.5 9.72391 14.5 8C14.5 6.27609 13.8152 4.62279 12.5962 3.40381C11.3772 2.18482 9.72391 1.5 8 1.5ZM0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0C10.1217 0 12.1566 0.842855 13.6569 2.34315C15.1571 3.84344 16 5.87827 16 8C16 10.1217 15.1571 12.1566 13.6569 13.6569C12.1566 15.1571 10.1217 16 8 16C5.87827 16 3.84344 15.1571 2.34315 13.6569C0.842855 12.1566 0 10.1217 0 8ZM6.5 7.75C6.5 7.55109 6.57902 7.36032 6.71967 7.21967C6.86032 7.07902 7.05109 7 7.25 7H8.25C8.44891 7 8.63968 7.07902 8.78033 7.21967C8.92098 7.36032 9 7.55109 9 7.75V10.5H9.25C9.44891 10.5 9.63968 10.579 9.78033 10.7197C9.92098 10.8603 10 11.0511 10 11.25C10 11.4489 9.92098 11.6397 9.78033 11.7803C9.63968 11.921 9.44891 12 9.25 12H7.25C7.05109 12 6.86032 11.921 6.71967 11.7803C6.57902 11.6397 6.5 11.4489 6.5 11.25C6.5 11.0511 6.57902 10.8603 6.71967 10.7197C6.86032 10.579 7.05109 10.5 7.25 10.5H7.5V8.5H7.25C7.05109 8.5 6.86032 8.42098 6.71967 8.28033C6.57902 8.13968 6.5 7.94891 6.5 7.75ZM8 6C8.26522 6 8.51957 5.89464 8.70711 5.70711C8.89464 5.51957 9 5.26522 9 5C9 4.73478 8.89464 4.48043 8.70711 4.29289C8.51957 4.10536 8.26522 4 8 4C7.73478 4 7.48043 4.10536 7.29289 4.29289C7.10536 4.48043 7 4.73478 7 5C7 5.26522 7.10536 5.51957 7.29289 5.70711C7.48043 5.89464 7.73478 6 8 6Z" fill="#7B5DE4"/>
			</g>
			<defs>
				<clipPath id="clip0_570_3282">
					<rect width="16" height="16" fill="white"/>
				</clipPath>
			</defs>
		</svg>
				<?= Loc::getMessage('SPOL_TPL_EMPTY_CANCELED_ORDER') ?>
			<?
			} else {
			?>
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
				<g clip-path="url(#clip0_570_3282)">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M8 1.5C6.27609 1.5 4.62279 2.18482 3.40381 3.40381C2.18482 4.62279 1.5 6.27609 1.5 8C1.5 9.72391 2.18482 11.3772 3.40381 12.5962C4.62279 13.8152 6.27609 14.5 8 14.5C9.72391 14.5 11.3772 13.8152 12.5962 12.5962C13.8152 11.3772 14.5 9.72391 14.5 8C14.5 6.27609 13.8152 4.62279 12.5962 3.40381C11.3772 2.18482 9.72391 1.5 8 1.5ZM0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0C10.1217 0 12.1566 0.842855 13.6569 2.34315C15.1571 3.84344 16 5.87827 16 8C16 10.1217 15.1571 12.1566 13.6569 13.6569C12.1566 15.1571 10.1217 16 8 16C5.87827 16 3.84344 15.1571 2.34315 13.6569C0.842855 12.1566 0 10.1217 0 8ZM6.5 7.75C6.5 7.55109 6.57902 7.36032 6.71967 7.21967C6.86032 7.07902 7.05109 7 7.25 7H8.25C8.44891 7 8.63968 7.07902 8.78033 7.21967C8.92098 7.36032 9 7.55109 9 7.75V10.5H9.25C9.44891 10.5 9.63968 10.579 9.78033 10.7197C9.92098 10.8603 10 11.0511 10 11.25C10 11.4489 9.92098 11.6397 9.78033 11.7803C9.63968 11.921 9.44891 12 9.25 12H7.25C7.05109 12 6.86032 11.921 6.71967 11.7803C6.57902 11.6397 6.5 11.4489 6.5 11.25C6.5 11.0511 6.57902 10.8603 6.71967 10.7197C6.86032 10.579 7.05109 10.5 7.25 10.5H7.5V8.5H7.25C7.05109 8.5 6.86032 8.42098 6.71967 8.28033C6.57902 8.13968 6.5 7.94891 6.5 7.75ZM8 6C8.26522 6 8.51957 5.89464 8.70711 5.70711C8.89464 5.51957 9 5.26522 9 5C9 4.73478 8.89464 4.48043 8.70711 4.29289C8.51957 4.10536 8.26522 4 8 4C7.73478 4 7.48043 4.10536 7.29289 4.29289C7.10536 4.48043 7 4.73478 7 5C7 5.26522 7.10536 5.51957 7.29289 5.70711C7.48043 5.89464 7.73478 6 8 6Z" fill="#7B5DE4"/>
				</g>
				<defs>
					<clipPath id="clip0_570_3282">
						<rect width="16" height="16" fill="white"/>
					</clipPath>
				</defs>
			</svg>
				<?= Loc::getMessage('SPOL_TPL_EMPTY_HISTORY_ORDER_LIST') ?>
			<?
			}
		} else {
			?>
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
				<g clip-path="url(#clip0_570_3282)">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M8 1.5C6.27609 1.5 4.62279 2.18482 3.40381 3.40381C2.18482 4.62279 1.5 6.27609 1.5 8C1.5 9.72391 2.18482 11.3772 3.40381 12.5962C4.62279 13.8152 6.27609 14.5 8 14.5C9.72391 14.5 11.3772 13.8152 12.5962 12.5962C13.8152 11.3772 14.5 9.72391 14.5 8C14.5 6.27609 13.8152 4.62279 12.5962 3.40381C11.3772 2.18482 9.72391 1.5 8 1.5ZM0 8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0C10.1217 0 12.1566 0.842855 13.6569 2.34315C15.1571 3.84344 16 5.87827 16 8C16 10.1217 15.1571 12.1566 13.6569 13.6569C12.1566 15.1571 10.1217 16 8 16C5.87827 16 3.84344 15.1571 2.34315 13.6569C0.842855 12.1566 0 10.1217 0 8ZM6.5 7.75C6.5 7.55109 6.57902 7.36032 6.71967 7.21967C6.86032 7.07902 7.05109 7 7.25 7H8.25C8.44891 7 8.63968 7.07902 8.78033 7.21967C8.92098 7.36032 9 7.55109 9 7.75V10.5H9.25C9.44891 10.5 9.63968 10.579 9.78033 10.7197C9.92098 10.8603 10 11.0511 10 11.25C10 11.4489 9.92098 11.6397 9.78033 11.7803C9.63968 11.921 9.44891 12 9.25 12H7.25C7.05109 12 6.86032 11.921 6.71967 11.7803C6.57902 11.6397 6.5 11.4489 6.5 11.25C6.5 11.0511 6.57902 10.8603 6.71967 10.7197C6.86032 10.579 7.05109 10.5 7.25 10.5H7.5V8.5H7.25C7.05109 8.5 6.86032 8.42098 6.71967 8.28033C6.57902 8.13968 6.5 7.94891 6.5 7.75ZM8 6C8.26522 6 8.51957 5.89464 8.70711 5.70711C8.89464 5.51957 9 5.26522 9 5C9 4.73478 8.89464 4.48043 8.70711 4.29289C8.51957 4.10536 8.26522 4 8 4C7.73478 4 7.48043 4.10536 7.29289 4.29289C7.10536 4.48043 7 4.73478 7 5C7 5.26522 7.10536 5.51957 7.29289 5.70711C7.48043 5.89464 7.73478 6 8 6Z" fill="#7B5DE4"/>
				</g>
				<defs>
					<clipPath id="clip0_570_3282">
						<rect width="16" height="16" fill="white"/>
					</clipPath>
				</defs>
			</svg>
			<?= Loc::getMessage('SPOL_TPL_EMPTY_ORDER_LIST') ?>
	<?
		}?>
			

		<a href="<?= htmlspecialcharsbx($arParams['PATH_TO_CATALOG']) ?>" class="sale-order-history-link">
			<?= Loc::getMessage('SPOL_TPL_LINK_TO_CATALOG') ?>
		</a>

	
</div>
		<?
	}
	?>








	<?
	$nothing = !isset($_REQUEST["filter_history"]) && !isset($_REQUEST["show_all"]);
	$clearFromLink = array("filter_history", "filter_status", "show_all", "show_canceled");

	if ($nothing || $_REQUEST["filter_history"] == 'N') {/*
			?>
			<a class="sale-order-history-link" href="<?=$APPLICATION->GetCurPageParam("filter_history=Y", $clearFromLink, false)?>">
				<?echo Loc::getMessage("SPOL_TPL_VIEW_ORDERS_HISTORY")?>
			</a>
			<?
		*/
	}
	if ($_REQUEST["filter_history"] == 'Y') {
	?>
		<a class="sale-order-history-link" href="<?= $APPLICATION->GetCurPageParam("", $clearFromLink, false) ?>">
			<? echo Loc::getMessage("SPOL_TPL_CUR_ORDERS") ?>
		</a>
		<?
		if ($_REQUEST["show_canceled"] == 'Y') {
		?>
			<a class="sale-order-history-link" href="<?= $APPLICATION->GetCurPageParam("filter_history=Y", $clearFromLink, false) ?>">
				<? echo Loc::getMessage("SPOL_TPL_VIEW_ORDERS_HISTORY") ?>
			</a>
		<?
		} else {
		?>
			<a class="sale-order-history-link" href="<?= $APPLICATION->GetCurPageParam("filter_history=Y&show_canceled=Y", $clearFromLink, false) ?>">
				<? echo Loc::getMessage("SPOL_TPL_VIEW_ORDERS_CANCELED") ?>
			</a>
	<?
		}
	}
	?>



	<?

	if ($_REQUEST["filter_history"] !== 'Y') {
		$paymentChangeData = array();
		$orderHeaderStatus = null;
	?>
		<div class="history-list">
			<?
			foreach ($arResult['ORDERS'] as $key => $order) {

				if ($orderHeaderStatus !== $order['ORDER']['STATUS_ID'] && $arResult['SORT_TYPE'] == 'STATUS') {
					$orderHeaderStatus = $order['ORDER']['STATUS_ID'];
					if ($arStatus = CSaleStatus::GetByID($order['ORDER']['STATUS_ID'])){
					}


					
					

					/*?>
					<h1 class="sale-order-title">
						<?= Loc::getMessage('SPOL_TPL_ORDER_IN_STATUSES') ?> &laquo;<?=htmlspecialcharsbx($arResult['INFO']['STATUS'][$orderHeaderStatus]['NAME'])?>&raquo;
					</h1>
					<?*/
				}
			?>



				<div class="history-list__item">
					<div class="history-item__wrap sale-order-list-container">
						<div class="history-item__top sale-order-list-title-container open">
							<div class="history-item__text history-item__text--width sale-order-list-title"><?= Loc::getMessage('SPOL_TPL_ORDER') ?> <?= Loc::getMessage('SPOL_TPL_NUMBER_SIGN') . $order['ORDER']['ACCOUNT_NUMBER'] ?></div>
							<div class="history-item__text history-item__text--width history-item__text--width-s"><?= $order['ORDER']['DATE_INSERT_FORMATED'] ?></div>
							<div class="history-item__status history-item__status--accept"><span>Status:</span><span class="response-msg"><?=$arStatus['NAME']?></span></div>
							
							<a class="history-item__link btn-repeat" href="#" data-order-id="<?=$order['ORDER']['ID']?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
								<path d="M6.66669 3.33268V13.3327C6.66669 13.7747 6.84228 14.1986 7.15484 14.5112C7.4674 14.8238 7.89133 14.9993 8.33335 14.9993H15C15.442 14.9993 15.866 14.8238 16.1785 14.5112C16.4911 14.1986 16.6667 13.7747 16.6667 13.3327V6.03435C16.6667 5.81232 16.6223 5.59253 16.5361 5.38789C16.45 5.18325 16.3238 4.99788 16.165 4.84268L13.4025 2.14102C13.0912 1.83656 12.673 1.66607 12.2375 1.66602H8.33335C7.89133 1.66602 7.4674 1.84161 7.15484 2.15417C6.84228 2.46673 6.66669 2.89065 6.66669 3.33268V3.33268Z" stroke="#7B5DE4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M13.3333 14.9987V16.6654C13.3333 17.1074 13.1577 17.5313 12.8452 17.8439C12.5326 18.1564 12.1087 18.332 11.6667 18.332H5.00001C4.55798 18.332 4.13406 18.1564 3.8215 17.8439C3.50894 17.5313 3.33334 17.1074 3.33334 16.6654V7.4987C3.33334 7.05667 3.50894 6.63275 3.8215 6.32019C4.13406 6.00763 4.55798 5.83203 5.00001 5.83203H6.66668" stroke="#7B5DE4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg> Copy Request
						</a>
							<!-- <button class="history-item__arrow js-show"></button> -->
						</div>
						<div class="history-item__inner show">
							<div class="history-item__body">

								<?
								foreach ($order["BASKET_ITEMS"] as $item) {

									$arItemSelect = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_CML2_LINK", "PROPERTY_NUM", "PROPERTY_PACKING");
									$arItemFilter = array("IBLOCK_ID" => 11, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $item["PRODUCT_ID"]);
									$resProduct = CIBlockElement::GetList(array(), $arItemFilter, false, array("nPageSize" => 9999), $arItemSelect);
									while ($ob = $resProduct->GetNextElement()) {
										$arItemFields = $ob->GetFields();
									}



									$arProductSelect = array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PROPERTY_SUBTITLE", "PROPERTY_CAS");
									$arProductFilter = array("IBLOCK_ID" => 10, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "ID" => $arItemFields["PROPERTY_CML2_LINK_VALUE"]);
									$resProduct = CIBlockElement::GetList(array(), $arProductFilter, false, array("nPageSize" => 9999), $arProductSelect);
									while ($ob = $resProduct->GetNextElement()) {
										$arProductFields = $ob->GetFields();
									}


								?>



									<div class="history-item__line">
										<div class="history-item__column history-item__column--l">
											<div class="history-item__text"><?= $arProductFields["NAME"] ?></div>
											<div class="history-item__name"><?= $arProductFields["PROPERTY_SUBTITLE_VALUE"] ?></div>
										</div>
										<div class="history-item__column">
											<div class="history-item__name">CAS:</div><a class="history-item__detail text-attention" href="#"><?= $arProductFields["PROPERTY_CAS_VALUE"] ?></a>
										</div>
										<div class="history-item__column history-item__column--m">
											<div class="history-item__name">ID:</div><a class="history-item__detail text-attention" href="#"><?= $arItemFields['PROPERTY_NUM_VALUE'] ?></a>
										</div>
										<div class="history-item__column history-item__column--m">
											<div class="history-item__name">Size:</div>
											<div class="history-item__detail"><?= $arItemFields['PROPERTY_PACKING_VALUE'] ?> г</div>
										</div>
										<div class="history-item__column history-item__column--xl">
											<div class="history-item__name">Quantity:</div>
											<div class="history-item__detail"><?= $item['QUANTITY']; ?></div>
										</div>
									</div>

								<? }
								unset($arSkuFields);

								?>


							</div>
							<!-- <div class="history-item__bottom">
								<div class="history-item__text">Комментарий к запросу:</div>
								<p>
										Здравствуйте, помимо указанного выше товара, нам в лабораторию нужно 3 кг. Амиачного раствора оксида
											серебра для проведения реакции  серебрянного зеркала. Подскажите пожалуйста, еслить ли у вас
											возможность предоставить данный товар дополнительно или хотя бы исходники для его приготовления.
								</p>
								<div class="history-item__text">Прикрепленный файлы:</div>
								<div class="history-item__downloads"><a class="history-item__link" href="#" download="download">Документация.pdf</a><a class="history-item__link" href="#" download="download">Документация2.pdf</a></div>
						</div> -->
						</div>
						<!-- <button class="history-item__arrow history-item__arrow--mobile js-show"></button> -->


						<?/*
						<div class="col-md-12 col-sm-12 col-xs-12 sale-order-list-title-container">
							<h2 class="sale-order-list-title">
								<?=Loc::getMessage('SPOL_TPL_ORDER')?>
								<?=Loc::getMessage('SPOL_TPL_NUMBER_SIGN').$order['ORDER']['ACCOUNT_NUMBER']?>
								<?=Loc::getMessage('SPOL_TPL_FROM_DATE')?>
								<?=$order['ORDER']['DATE_INSERT_FORMATED']?>,
								<?=count($order['BASKET_ITEMS']);?>
								<?
								$count = count($order['BASKET_ITEMS']) % 10;
								if ($count == '1')
								{
									echo Loc::getMessage('SPOL_TPL_GOOD');
								}
								elseif ($count >= '2' && $count <= '4')
								{
									echo Loc::getMessage('SPOL_TPL_TWO_GOODS');
								}
								else
								{
									echo Loc::getMessage('SPOL_TPL_GOODS');
								}
								?>
								<?=Loc::getMessage('SPOL_TPL_SUMOF')?>
								<?=$order['ORDER']['FORMATED_PRICE']?>
							</h2>
						</div>
					*/ ?>

						<div class="col-md-12 sale-order-list-inner-container" style="display: none;">
							<span class="sale-order-list-inner-title-line">
								<span class="sale-order-list-inner-title-line-item"><?= Loc::getMessage('SPOL_TPL_PAYMENT') ?></span>
								<span class="sale-order-list-inner-title-line-border"></span>
							</span>
							<?
							$showDelimeter = false;
							foreach ($order['PAYMENT'] as $payment) {
								if ($order['ORDER']['LOCK_CHANGE_PAYSYSTEM'] !== 'Y') {
									$paymentChangeData[$payment['ACCOUNT_NUMBER']] = array(
										"order" => htmlspecialcharsbx($order['ORDER']['ACCOUNT_NUMBER']),
										"payment" => htmlspecialcharsbx($payment['ACCOUNT_NUMBER']),
										"allow_inner" => $arParams['ALLOW_INNER'],
										"refresh_prices" => $arParams['REFRESH_PRICES'],
										"path_to_payment" => $arParams['PATH_TO_PAYMENT'],
										"only_inner_full" => $arParams['ONLY_INNER_FULL'],
										"return_url" => $arResult['RETURN_URL'],
									);
								}
							?>
								<div class="row sale-order-list-inner-row">
									<?
									if ($showDelimeter) {
									?>
										<div class="sale-order-list-top-border"></div>
									<?
									} else {
										$showDelimeter = true;
									}
									?>

									<div class="sale-order-list-inner-row-body">
										<div class="col-md-9 col-sm-8 col-xs-12 sale-order-list-payment">
											<div class="sale-order-list-payment-title">
												<?
												$paymentSubTitle = Loc::getMessage('SPOL_TPL_BILL') . " " . Loc::getMessage('SPOL_TPL_NUMBER_SIGN') . htmlspecialcharsbx($payment['ACCOUNT_NUMBER']);
												if (isset($payment['DATE_BILL'])) {
													$paymentSubTitle .= " " . Loc::getMessage('SPOL_TPL_FROM_DATE') . " " . $payment['DATE_BILL_FORMATED'];
												}
												$paymentSubTitle .= ",";
												echo $paymentSubTitle;
												?>
												<span class="sale-order-list-payment-title-element"><?= $payment['PAY_SYSTEM_NAME'] ?></span>
												<?
												if ($payment['PAID'] === 'Y') {
												?>
													<span class="sale-order-list-status-success"><?= Loc::getMessage('SPOL_TPL_PAID') ?></span>
												<?
												} elseif ($order['ORDER']['IS_ALLOW_PAY'] == 'N') {
												?>
													<span class="sale-order-list-status-restricted"><?= Loc::getMessage('SPOL_TPL_RESTRICTED_PAID') ?></span>
												<?
												} else {
												?>
													<span class="sale-order-list-status-alert"><?= Loc::getMessage('SPOL_TPL_NOTPAID') ?></span>
												<?
												}
												?>
											</div>
											<div class="sale-order-list-payment-price">
												<span class="sale-order-list-payment-element"><?= Loc::getMessage('SPOL_TPL_SUM_TO_PAID') ?>:</span>

												<span class="sale-order-list-payment-number"><?= $payment['FORMATED_SUM'] ?></span>
											</div>
											<?
											if (!empty($payment['CHECK_DATA'])) {
												$listCheckLinks = "";
												foreach ($payment['CHECK_DATA'] as $checkInfo) {
													$title = Loc::getMessage('SPOL_CHECK_NUM', array('#CHECK_NUMBER#' => $checkInfo['ID'])) . " - " . htmlspecialcharsbx($checkInfo['TYPE_NAME']);
													if ($checkInfo['LINK'] <> '') {
														$link = $checkInfo['LINK'];
														$listCheckLinks .= "<div><a href='$link' target='_blank'>$title</a></div>";
													}
												}
												if ($listCheckLinks <> '') {
											?>
													<div class="sale-order-list-payment-check">
														<div class="sale-order-list-payment-check-left"><?= Loc::getMessage('SPOL_CHECK_TITLE') ?>:</div>
														<div class="sale-order-list-payment-check-left">
															<?= $listCheckLinks ?>
														</div>
													</div>
												<?
												}
											}
											if ($payment['PAID'] !== 'Y' && $order['ORDER']['LOCK_CHANGE_PAYSYSTEM'] !== 'Y') {
												?>
												<a href="#" class="sale-order-list-change-payment" id="<?= htmlspecialcharsbx($payment['ACCOUNT_NUMBER']) ?>">
													<?= Loc::getMessage('SPOL_TPL_CHANGE_PAY_TYPE') ?>
												</a>
											<?
											}
											if ($order['ORDER']['IS_ALLOW_PAY'] == 'N' && $payment['PAID'] !== 'Y') {
											?>
												<div class="sale-order-list-status-restricted-message-block">
													<span class="sale-order-list-status-restricted-message"><?= Loc::getMessage('SOPL_TPL_RESTRICTED_PAID_MESSAGE') ?></span>
												</div>
											<?
											}
											?>

										</div>
										<?
										if ($payment['PAID'] === 'N' && $payment['IS_CASH'] !== 'Y' && $payment['ACTION_FILE'] !== 'cash') {
											if ($order['ORDER']['IS_ALLOW_PAY'] == 'N') {
										?>
												<div class="col-md-3 col-sm-4 col-xs-12 sale-order-list-button-container">
													<a class="sale-order-list-button inactive-button">
														<?= Loc::getMessage('SPOL_TPL_PAY') ?>
													</a>
												</div>
											<?
											} elseif ($payment['NEW_WINDOW'] === 'Y') {
											?>
												<div class="col-md-3 col-sm-4 col-xs-12 sale-order-list-button-container">
													<a class="sale-order-list-button" target="_blank" href="<?= htmlspecialcharsbx($payment['PSA_ACTION_FILE']) ?>">
														<?= Loc::getMessage('SPOL_TPL_PAY') ?>
													</a>
												</div>
											<?
											} else {
											?>
												<div class="col-md-3 col-sm-4 col-xs-12 sale-order-list-button-container">
													<a class="sale-order-list-button ajax_reload" href="<?= htmlspecialcharsbx($payment['PSA_ACTION_FILE']) ?>">
														<?= Loc::getMessage('SPOL_TPL_PAY') ?>
													</a>
												</div>
										<?
											}
										}
										?>

									</div>
									<div class="col-lg-9 col-md-9 col-sm-10 col-xs-12 sale-order-list-inner-row-template">
										<a class="sale-order-list-cancel-payment">
											<i class="fa fa-long-arrow-left"></i> <?= Loc::getMessage('SPOL_CANCEL_PAYMENT') ?>
										</a>
									</div>
								</div>
							<?
							}
							if (!empty($order['SHIPMENT'])) {
							?>
								<div class="sale-order-list-inner-title-line">
									<span class="sale-order-list-inner-title-line-item"><?= Loc::getMessage('SPOL_TPL_DELIVERY') ?></span>
									<span class="sale-order-list-inner-title-line-border"></span>
								</div>
							<?
							}
							$showDelimeter = false;
							foreach ($order['SHIPMENT'] as $shipment) {
								if (empty($shipment)) {
									continue;
								}
							?>
								<div class="row sale-order-list-inner-row">
									<?
									if ($showDelimeter) {
									?>
										<div class="sale-order-list-top-border"></div>
									<?
									} else {
										$showDelimeter = true;
									}
									?>
									<div class="col-md-9 col-sm-8 col-xs-12 sale-order-list-shipment">
										<div class="sale-order-list-shipment-title">
											<span class="sale-order-list-shipment-element">
												<?= Loc::getMessage('SPOL_TPL_LOAD') ?>
												<?
												$shipmentSubTitle = Loc::getMessage('SPOL_TPL_NUMBER_SIGN') . htmlspecialcharsbx($shipment['ACCOUNT_NUMBER']);
												if ($shipment['DATE_DEDUCTED']) {
													$shipmentSubTitle .= " " . Loc::getMessage('SPOL_TPL_FROM_DATE') . " " . $shipment['DATE_DEDUCTED_FORMATED'];
												}

												if ($shipment['FORMATED_DELIVERY_PRICE']) {
													$shipmentSubTitle .= ", " . Loc::getMessage('SPOL_TPL_DELIVERY_COST') . " " . $shipment['FORMATED_DELIVERY_PRICE'];
												}
												echo $shipmentSubTitle;
												?>
											</span>
											<?
											if ($shipment['DEDUCTED'] == 'Y') {
											?>
												<span class="sale-order-list-status-success"><?= Loc::getMessage('SPOL_TPL_LOADED'); ?></span>
											<?
											} else {
											?>
												<span class="sale-order-list-status-alert"><?= Loc::getMessage('SPOL_TPL_NOTLOADED'); ?></span>
											<?
											}
											?>
										</div>

										<div class="sale-order-list-shipment-status">
											<span class="sale-order-list-shipment-status-item"><?= Loc::getMessage('SPOL_ORDER_SHIPMENT_STATUS'); ?>:</span>
											<span class="sale-order-list-shipment-status-block"><?= htmlspecialcharsbx($shipment['DELIVERY_STATUS_NAME']) ?></span>
										</div>

										<?
										if (!empty($shipment['DELIVERY_ID'])) {
										?>
											<div class="sale-order-list-shipment-item">
												<?= Loc::getMessage('SPOL_TPL_DELIVERY_SERVICE') ?>:
												<?= $arResult['INFO']['DELIVERY'][$shipment['DELIVERY_ID']]['NAME'] ?>
											</div>
										<?
										}

										if (!empty($shipment['TRACKING_NUMBER'])) {
										?>
											<div class="sale-order-list-shipment-item">
												<span class="sale-order-list-shipment-id-name"><?= Loc::getMessage('SPOL_TPL_POSTID') ?>:</span>
												<span class="sale-order-list-shipment-id"><?= htmlspecialcharsbx($shipment['TRACKING_NUMBER']) ?></span>
												<span class="sale-order-list-shipment-id-icon"></span>
											</div>
										<?
										}
										?>
									</div>
									<?
									if ($shipment['TRACKING_URL'] <> '') {
									?>
										<div class="col-md-2 col-md-offset-1 col-sm-12 sale-order-list-shipment-button-container">
											<a class="sale-order-list-shipment-button" target="_blank" href="<?= $shipment['TRACKING_URL'] ?>">
												<?= Loc::getMessage('SPOL_TPL_CHECK_POSTID') ?>
											</a>
										</div>
									<?
									}
									?>
								</div>
							<?
							}
							?>
							<div class="row sale-order-list-inner-row">
								<div class="sale-order-list-top-border"></div>
								<div class="col-md-<?= ($order['ORDER']['CAN_CANCEL'] !== 'N') ? 8 : 10 ?>  col-sm-12 sale-order-list-about-container">
									<a class="sale-order-list-about-link" href="<?= htmlspecialcharsbx($order["ORDER"]["URL_TO_DETAIL"]) ?>"><?= Loc::getMessage('SPOL_TPL_MORE_ON_ORDER') ?></a>
								</div>
								<div class="col-md-2 col-sm-12 sale-order-list-repeat-container">
									<a class="sale-order-list-repeat-link" href="<?= htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"]) ?>"><?= Loc::getMessage('SPOL_TPL_REPEAT_ORDER') ?></a>
								</div>
								<?
								if ($order['ORDER']['CAN_CANCEL'] !== 'N') {
								?>
									<div class="col-md-2 col-sm-12 sale-order-list-cancel-container">
										<a class="sale-order-list-cancel-link" href="<?= htmlspecialcharsbx($order["ORDER"]["URL_TO_CANCEL"]) ?>"><?= Loc::getMessage('SPOL_TPL_CANCEL_ORDER') ?></a>
									</div>
								<?
								}
								?>
							</div>
						</div>

					</div>
				</div>
			<?
			}
			unset($arID);
			unset($arBasketItems);

			?>

		</div>
		<?
	} else {
		$orderHeaderStatus = null;

		if ($_REQUEST["show_canceled"] === 'Y' && count($arResult['ORDERS'])) {
		?>
			<h1 class="sale-order-title">
				<?= Loc::getMessage('SPOL_TPL_ORDERS_CANCELED_HEADER') ?>
			</h1>
			<?
		}

		foreach ($arResult['ORDERS'] as $key => $order) {
			if ($orderHeaderStatus !== $order['ORDER']['STATUS_ID'] && $_REQUEST["show_canceled"] !== 'Y') {
				$orderHeaderStatus = $order['ORDER']['STATUS_ID'];
			?>
				<h1 class="sale-order-title">
					<?= Loc::getMessage('SPOL_TPL_ORDER_IN_STATUSES') ?> &laquo;<?= htmlspecialcharsbx($arResult['INFO']['STATUS'][$orderHeaderStatus]['NAME']) ?>&raquo;
				</h1>
			<?
			}
			?>
			<div class="col-md-12 col-sm-12 sale-order-list-container">
				<div class="row">
					<div class="col-md-12 col-sm-12 sale-order-list-accomplished-title-container">
						<div class="row">
							<div class="col-md-8 col-sm-12 sale-order-list-accomplished-title-container">
								<h2 class="sale-order-list-accomplished-title">
									<?= Loc::getMessage('SPOL_TPL_ORDER') ?>
									<?= Loc::getMessage('SPOL_TPL_NUMBER_SIGN') ?>
									<?= htmlspecialcharsbx($order['ORDER']['ACCOUNT_NUMBER']) ?>
									<?= Loc::getMessage('SPOL_TPL_FROM_DATE') ?>
									<?= $order['ORDER']['DATE_INSERT'] ?>,
									<?= count($order['BASKET_ITEMS']); ?>
									<?
									$count = mb_substr(count($order['BASKET_ITEMS']), -1);
									if ($count == '1') {
										echo Loc::getMessage('SPOL_TPL_GOOD');
									} elseif ($count >= '2' || $count <= '4') {
										echo Loc::getMessage('SPOL_TPL_TWO_GOODS');
									} else {
										echo Loc::getMessage('SPOL_TPL_GOODS');
									}
									?>
									<?= Loc::getMessage('SPOL_TPL_SUMOF') ?>
									<?= $order['ORDER']['FORMATED_PRICE'] ?>
								</h2>
							</div>
							<div class="col-md-4 col-sm-12 sale-order-list-accomplished-date-container">
								<?
								if ($_REQUEST["show_canceled"] !== 'Y') {
								?>
									<span class="sale-order-list-accomplished-date">
										<?= Loc::getMessage('SPOL_TPL_ORDER_FINISHED') ?>
									</span>
								<?
								} else {
								?>
									<span class="sale-order-list-accomplished-date canceled-order">
										<?= Loc::getMessage('SPOL_TPL_ORDER_CANCELED') ?>
									</span>
								<?
								}
								?>
								<span class="sale-order-list-accomplished-date-number"><?= $order['ORDER']['DATE_STATUS_FORMATED'] ?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 sale-order-list-inner-accomplished">
						<div class="row sale-order-list-inner-row">
							<div class="col-md-3 col-sm-12 sale-order-list-about-accomplished">
								<a class="sale-order-list-about-link" href="<?= htmlspecialcharsbx($order["ORDER"]["URL_TO_DETAIL"]) ?>">
									<?= Loc::getMessage('SPOL_TPL_MORE_ON_ORDER') ?>
								</a>
							</div>
							<div class="col-md-3 col-md-offset-6 col-sm-12 sale-order-list-repeat-accomplished">
								<a class="sale-order-list-repeat-link sale-order-link-accomplished" href="<?= htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"]) ?>">
									<?= Loc::getMessage('SPOL_TPL_REPEAT_ORDER') ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?
		}
	}
	?>









	<?
	echo $arResult["NAV_STRING"];

	if ($_REQUEST["filter_history"] !== 'Y') {
		$javascriptParams = array(
			"url" => CUtil::JSEscape($this->__component->GetPath() . '/ajax.php'),
			"templateFolder" => CUtil::JSEscape($templateFolder),
			"templateName" => $this->__component->GetTemplateName(),
			"paymentList" => $paymentChangeData,
			"returnUrl" => CUtil::JSEscape($arResult["RETURN_URL"]),
		);
		$javascriptParams = CUtil::PhpToJSObject($javascriptParams);
	?>

<!-- Повторить запрос -->
<script>
$(".btn-repeat").on("click", function(e){
	e. preventDefault();

	var order_id = $(this).attr('data-order-id'), // ID исходного заказа
			btn = $(this); // объект кнопки
					
			var res = $(this).parents('.history-item__top').find(".response-msg").html(''); // очищаем текст сообщений
			
	if (order_id > 0){
					
		$.ajax({
				type: "POST",
				url: 'https://aez.com.tr/ajax/order-repeat.php',
				data: {
						'ORDER_ID': order_id,
				},
				dataType: "json",
				success: function(data){
						
					// если статус успешный
					if (data.status == true){
							btn.hide(); // скрываем кнопку
					}
					
					// показ текстовых сообщений
					if (data.msg && data.msg.length > 0){
						$(".response-msg").fadeIn();
						$.each( data.msg, function( key,field ) {
								if (field.type == true){
									res.append('<span class="text-advance">'+field.text+'</span>');
								} else {
									res.append('<span class="text-error">'+field.text+'</span>');
								}
						});
					}
				}
		});
	}
 });
</script>



		<script>
			BX.Sale.PersonalOrderComponent.PersonalOrderList.init(<?= $javascriptParams ?>);
		</script>
<?
	}
}
?>