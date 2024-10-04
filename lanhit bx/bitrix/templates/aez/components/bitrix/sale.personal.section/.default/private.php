<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;

if ($arParams['SHOW_PRIVATE_PAGE'] !== 'Y')
{
	LocalRedirect($arParams['SEF_FOLDER']);
}

if ($arParams["MAIN_CHAIN_NAME"] <> '')
{
	$APPLICATION->AddChainItem(htmlspecialcharsbx($arParams["MAIN_CHAIN_NAME"]), $arResult['SEF_FOLDER']);
}
$APPLICATION->AddChainItem(Loc::getMessage("SPS_CHAIN_PRIVATE"));
if ($arParams['SET_TITLE'] == 'Y')
{
	$APPLICATION->SetTitle(Loc::getMessage("SPS_TITLE_PRIVATE"));
}

?>



<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile",
	".default",
	Array(
		"SET_TITLE" =>$arParams["SET_TITLE"],
		"AJAX_MODE" => $arParams['AJAX_MODE_PRIVATE'],
		"SEND_INFO" => $arParams["SEND_INFO_PRIVATE"],
		"CHECK_RIGHTS" => $arParams['CHECK_RIGHTS_PRIVATE'],
		"EDITABLE_EXTERNAL_AUTH_ID" => $arParams['EDITABLE_EXTERNAL_AUTH_ID'],
	),
	$component
);?>
<?if ($USER->IsAuthorized()){?>
<h2 class="title title--second">General information</h2>



<?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.order.list", 
	"main", 
	array(
		"STATUS_COLOR_N" => "green",
		"STATUS_COLOR_P" => "yellow",
		"STATUS_COLOR_F" => "gray",
		"STATUS_COLOR_PSEUDO_CANCELLED" => "red",
		"PATH_TO_DETAIL" => "order_detail.php?ID=#ID#",
		"PATH_TO_COPY" => "/personal/card/",
		"PATH_TO_CANCEL" => "order_cancel.php?ID=#ID#",
		"PATH_TO_BASKET" => "/personal/card/",
		"PATH_TO_PAYMENT" => "payment.php",
		"ORDERS_PER_PAGE" => "20",
		"ID" => $ID,
		"SET_TITLE" => "N",
		"SAVE_IN_SESSION" => "Y",
		"NAV_TEMPLATE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"HISTORIC_STATUSES" => array(
			0 => "F",
		),
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"COMPONENT_TEMPLATE" => "main",
		"PATH_TO_CATALOG" => "/catalog/",
		"DISALLOW_CANCEL" => "N",
		"RESTRICT_CHANGE_PAYSYSTEM" => array(
			0 => "F",
		),
		"REFRESH_PRICES" => "N",
		"DEFAULT_SORT" => "STATUS"
	),
	false
);?>

<?}?>