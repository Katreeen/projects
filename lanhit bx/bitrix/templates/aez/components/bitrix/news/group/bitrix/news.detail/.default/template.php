<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="common__top">
		<div class="common__title title"><h1 class="title"><?$APPLICATION->ShowTitle(false)?></h1></div>
		<!-- <div class="common__filter-btn">Фильтрация</div> -->
</div>
<div class="section-info">
	<?if($arResult["DETAIL_PICTURE"]["SRC"] != ''){?>
		<img class="section-info__image" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
	<?}?>
	<?if($arResult["DETAIL_TEXT"] != ''){?>
		<div class="section-info__text">
			<?echo $arResult["DETAIL_TEXT"];?>
		</div>
	<?}?>
	
	
</div>
<?/*
<aside class="common__sidebar">
				<?
				global $productFilter; 
				//$productFilter = array("!PROPERTY_HIDE_IN_TABLE_VALUE"=>"да");

				if (isset($_GET['LETER'])) { 
					$productFilter = array('NAME'=>$_GET['LETER'].'%');
				}

				?>
				<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.smart.filter", 
    "bootstrap_v4", 
    array(
        "COMPONENT_TEMPLATE" => "bootstrap_v4",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "8",
        "SECTION_ID" => "10",
        "SECTION_CODE" => "",
        "FILTER_NAME" => "areFilter",
        "HIDE_NOT_AVAILABLE" => "N",
        "TEMPLATE_THEME" => "blue",
        "FILTER_VIEW_MODE" => "horizontal",
        "DISPLAY_ELEMENT_COUNT" => "Y",
        "SEF_MODE" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_GROUPS" => "Y",
        "SAVE_IN_SESSION" => "N",
        "INSTANT_RELOAD" => "Y",
        "PAGER_PARAMS_NAME" => "arrPager",
        "PRICE_CODE" => array(
            0 => "BASE",
        ),
        "CONVERT_CURRENCY" => "Y",
        "XML_EXPORT" => "N",
        "SECTION_TITLE" => "-",
        "SECTION_DESCRIPTION" => "-",
        "POPUP_POSITION" => "left",
        "SEF_RULE" => "/catalog/group/#ELEMENT_CODE#/filter/#SMART_FILTER_PATH#/apply/",
        "SECTION_CODE_PATH" => "",
        "SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
        "CURRENCY_ID" => "RUB"
    ),
    false
);?>

					
			</aside>


*/?>
<?
global $areFilter; 
$areFilter = array("ID"=>$arResult["PROPERTIES"]["ELEMENTS"]["VALUE"]);

// $_REQUEST["SECTION_ID"] = 9;
// $_REQUEST["SECTION_ID"] = 10;

?>
<?foreach ($_GET as $key => $value) {
  if (preg_match('/^PAGEN_(\d+)$/', $key, $matches)) {
   $pagen = true;
  }
}?>
<?if(!$pagen){?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"bootstrap_v4", 
	array(
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "10",
		"SECTION_ID" => "10",
		"SECTION_CODE" => $_REQUEST["SECTION_CODE"],
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "areFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"PAGE_ELEMENT_COUNT" => "10",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE_MOBILE" => array(
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_LIMIT" => "5",
		"BACKGROUND_IMAGE" => "-",
		"TEMPLATE_THEME" => "blue",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false}]",
		"ENLARGE_PRODUCT" => "STRICT",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"SHOW_SLIDER" => "N",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => array(
		),
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"MESS_BTN_BUY" => "Add to cart",
		"MESS_BTN_ADD_TO_BASKET" => "Add to cart",
		"MESS_BTN_SUBSCRIBE" => "Subscribe",
		"MESS_BTN_DETAIL" => "Details",
		"MESS_NOT_AVAILABLE" => "Not available",
		"RCM_TYPE" => "personal",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"SHOW_FROM_SECTION" => "N",
		"SECTION_URL" => "",
		"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "Y",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "N",
		"META_DESCRIPTION" => "-",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRICE_CODE" => array(
			0 => "base",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "Y",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"PAGER_TEMPLATE" => "articles",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"LAZY_LOAD" => "N",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"LOAD_ON_SCROLL" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"OFFER_ADD_PICT_PROP" => "-",
		"SEF_RULE" => "#SECTION_CODE#",
		"SECTION_CODE_PATH" => ""
	),
	false
);?>
<?}?>


<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"bootstrap_v4", 
	array(
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "10",
		"SECTION_ID" => "9",
		"SECTION_CODE" => $_REQUEST["SECTION_CODE"],
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "areFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"PAGE_ELEMENT_COUNT" => "10",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE_MOBILE" => array(
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_LIMIT" => "5",
		"BACKGROUND_IMAGE" => "-",
		"TEMPLATE_THEME" => "blue",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false},{'VARIANT':'9','BIG_DATA':false}]",
		"ENLARGE_PRODUCT" => "STRICT",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"SHOW_SLIDER" => "N",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => array(
		),
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "Add to cart",
		"MESS_BTN_SUBSCRIBE" => "Subscribe",
		"MESS_BTN_DETAIL" => "Details",
		"MESS_NOT_AVAILABLE" => "Not available",
		"RCM_TYPE" => "personal",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"SHOW_FROM_SECTION" => "N",
		"SECTION_URL" => "",
		"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "Y",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "N",
		"META_DESCRIPTION" => "-",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRICE_CODE" => array(
			0 => "base",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/cart/",
		"USE_PRODUCT_QUANTITY" => "Y",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"PAGER_TEMPLATE" => "articles",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"LAZY_LOAD" => "N",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"LOAD_ON_SCROLL" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"OFFER_ADD_PICT_PROP" => "-",
		"SEF_RULE" => "#SECTION_CODE#",
		"SECTION_CODE_PATH" => ""
	),
	false
);?>


