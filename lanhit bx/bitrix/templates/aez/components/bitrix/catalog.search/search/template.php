<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

use Bitrix\Main\Loader;

$this->setFrameMode(true);

global $searchFilter;

$elementOrder = [];
if ($arParams['USE_SEARCH_RESULT_ORDER'] === 'N')
{
	$elementOrder = [
		"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
		"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
		"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
	];
}?>
<h1 class="title">Results for «<?=$_REQUEST['q']?>»</h1>
<!-- <div class="common__top">
		<div class="common__title title"></div>
		<div class="common__filter-btn">Фильтрация</div>
</div> -->
<div class="common__wrap search-result">
	<div class="row">
		<div class="col-lg-3">
			<aside class="common__sidebar">
				<?
				global $searchFilter; 
				//$productFilter = array("!PROPERTY_HIDE_IN_TABLE_VALUE"=>"да");

				if (isset($_GET['LETER'])) { 
					$searchFilter = array('NAME'=>$_GET['LETER'].'%');
				}

				?>
					<? $APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "bootstrap_v4", array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"SECTION_ID" => $arCurSection['ID'],
							"FILTER_NAME" => "searchFilter",
							"PRICE_CODE" => $arParams["~PRICE_CODE"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
							"SAVE_IN_SESSION" => "N",
							"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
							"XML_EXPORT" => "N",
							"SECTION_TITLE" => "NAME",
							"SECTION_DESCRIPTION" => "DESCRIPTION",
							'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
							"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID'],
							"SEF_MODE" => $arParams["SEF_MODE"],
							"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
							"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
							"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
							"AJAX_MODE" => "N",
							"INSTANT_RELOAD" => "N",
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
			</aside>
		</div>
	
<div class="col-lg-9">
	<div class="common__content">




<?
if (Loader::includeModule('search'))
{

	$arElements = $APPLICATION->IncludeComponent(
		"bitrix:search.page",
		"search",
		[
			"RESTART" => $arParams["RESTART"],
			"NO_WORD_LOGIC" => $arParams["NO_WORD_LOGIC"],
			"USE_LANGUAGE_GUESS" => $arParams["USE_LANGUAGE_GUESS"],
			"CHECK_DATES" => $arParams["CHECK_DATES"],
			"arrFILTER" => [
				"iblock_".$arParams["IBLOCK_TYPE"],
			],
			"arrFILTER_iblock_".$arParams["IBLOCK_TYPE"] => [
				$arParams["IBLOCK_ID"],
			],
			"USE_TITLE_RANK" => $arParams['USE_TITLE_RANK'],
			"DEFAULT_SORT" => "rank",
			"FILTER_NAME" => "",
			"SHOW_WHERE" => "N",
			"arrWHERE" => [],
			"SHOW_WHEN" => "N",
			"PAGE_RESULT_COUNT" => ($arParams["PAGE_RESULT_COUNT"] ?? 50),
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "N",
		],
		$component,
		[
			'HIDE_ICONS' => 'Y',
		]
	);
	if (!empty($arElements) && is_array($arElements))
	{
		global $searchFilter;
		$searchFilter = [
			"ID" => $arElements,
			"!PROPERTY_HIDE_IN_TABLE_VALUE"=>"да"
		];

		if ($arParams['USE_SEARCH_RESULT_ORDER'] === 'Y')
		{
			$elementOrder = [
				"ELEMENT_SORT_FIELD" => "ID",
				"ELEMENT_SORT_ORDER" => $arElements,
			];
		}
	}
	else
	{
		if (is_array($arElements))
		{?>



			<div class="nothing-dummy">
					<div class="container">
							<div class="nothing-dummy__wrap">
									<div class="nothing-dummy__img"><img src="<?=SITE_TEMPLATE_PATH?>/images/microscope.png" alt=""></div>
									<div class="nothing-dummy__text"><?echo GetMessage("CT_BCSE_NOT_FOUND");?></div>
							</div>
					</div>
			</div>
			

<?

			return;
		}
	}
}
else
{
	
	$searchQuery = '';
	if (isset($_REQUEST['q']) && is_string($_REQUEST['q']))
		$searchQuery = trim($_REQUEST['q']);
	if ($searchQuery !== '')
	{
		$searchFilter = [
			'*SEARCHABLE_CONTENT' => $searchQuery,
			"!PROPERTY_HIDE_IN_TABLE_VALUE"=>"да"
		];
	}
	unset($searchQuery);
}

if (!empty($searchFilter) && is_array($searchFilter))
{
	$arParams['LINE_ELEMENT_COUNT'] = (int)($arParams['LINE_ELEMENT_COUNT'] ?? 3);
	if ($arParams['LINE_ELEMENT_COUNT'] < 2)
	{
		$arParams['LINE_ELEMENT_COUNT'] = 2;
	}
	elseif ($arParams['LINE_ELEMENT_COUNT'] > 4)
	{
		$arParams['LINE_ELEMENT_COUNT'] = 4;
	}

	

	$componentParams = [
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
		"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
		"PROPERTY_CODE" => $arParams["PROPERTY_CODE"],
		"PROPERTY_CODE_MOBILE" => ($arParams["PROPERTY_CODE_MOBILE"] ?? []),
		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
		"OFFERS_FIELD_CODE" => $arParams["OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
		"OFFERS_LIMIT" => $arParams["OFFERS_LIMIT"],
		"SECTION_URL" => $arParams["SECTION_URL"],
		"DETAIL_URL" => $arParams["DETAIL_URL"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"DISPLAY_COMPARE" => $arParams["DISPLAY_COMPARE"],
		"PRICE_CODE" => $arParams["~PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
		"USE_PRODUCT_QUANTITY" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => ($arParams["ADD_PROPERTIES_TO_BASKET"] ?? ''),
		"PARTIAL_PRODUCT_PROPERTIES" => ($arParams["PARTIAL_PRODUCT_PROPERTIES"] ?? ''),
		"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
		"HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"LAZY_LOAD" => ($arParams["LAZY_LOAD"] ?? 'N'),
		"MESS_BTN_LAZY_LOAD" => ($arParams["~MESS_BTN_LAZY_LOAD"] ?? ''),
		"LOAD_ON_SCROLL" => ($arParams["LOAD_ON_SCROLL"] ?? 'N'),
		"FILTER_NAME" => "searchFilter",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => [],
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "Y",
		"META_KEYWORDS" => "",
		"META_DESCRIPTION" => "",
		"BROWSER_TITLE" => "",
		"ADD_SECTIONS_CHAIN" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",

		'LABEL_PROP' => ($arParams['LABEL_PROP'] ?? ''),
		'LABEL_PROP_MOBILE' => ($arParams['LABEL_PROP_MOBILE'] ?? ''),
		'LABEL_PROP_POSITION' => ($arParams['LABEL_PROP_POSITION'] ?? ''),
		'ADD_PICT_PROP' => ($arParams['ADD_PICT_PROP'] ?? ''),
		'PRODUCT_DISPLAY_MODE' => "Y",
		'PRODUCT_BLOCKS_ORDER' => ($arParams['PRODUCT_BLOCKS_ORDER'] ?? ''),
		//'PRODUCT_ROW_VARIANTS' => ($arParams['PRODUCT_ROW_VARIANTS'] ?? ''),
		'PRODUCT_ROW_VARIANTS' => "[{'VARIANT':'1','BIG_DATA':false},{'VARIANT':'1','BIG_DATA':false},{'VARIANT':'1','BIG_DATA':false}]",
		'ENLARGE_PRODUCT' => ($arParams['ENLARGE_PRODUCT'] ?? ''),
		'ENLARGE_PROP' => ($arParams['ENLARGE_PROP'] ?? ''),
		'SHOW_SLIDER' => ($arParams['SHOW_SLIDER'] ?? 'Y'),
		'SLIDER_INTERVAL' => ($arParams['SLIDER_INTERVAL'] ?? '3000'),
		'SLIDER_PROGRESS' => ($arParams['SLIDER_PROGRESS'] ?? 'N'),

		'OFFER_ADD_PICT_PROP' => ($arParams['OFFER_ADD_PICT_PROP'] ?? ''),
		'OFFER_TREE_PROPS' => ($arParams['OFFER_TREE_PROPS'] ?? []),
		'PRODUCT_SUBSCRIPTION' => ($arParams['PRODUCT_SUBSCRIPTION'] ?? ''),
		'SHOW_DISCOUNT_PERCENT' => ($arParams['SHOW_DISCOUNT_PERCENT'] ?? ''),
		'SHOW_OLD_PRICE' => ($arParams['SHOW_OLD_PRICE'] ?? ''),
		'SHOW_MAX_QUANTITY' => ($arParams['SHOW_MAX_QUANTITY'] ?? ''),
		'MESS_SHOW_MAX_QUANTITY' => ($arParams['~MESS_SHOW_MAX_QUANTITY'] ?? ''),
		'RELATIVE_QUANTITY_FACTOR' => ($arParams['RELATIVE_QUANTITY_FACTOR'] ?? ''),
		'MESS_RELATIVE_QUANTITY_MANY' => ($arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?? ''),
		'MESS_RELATIVE_QUANTITY_FEW' => ($arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?? ''),
		'MESS_BTN_BUY' => ($arParams['~MESS_BTN_BUY'] ?? ''),
		'MESS_BTN_ADD_TO_BASKET' => ($arParams['~MESS_BTN_ADD_TO_BASKET'] ?? ''),
		'MESS_BTN_SUBSCRIBE' => ($arParams['~MESS_BTN_SUBSCRIBE'] ?? ''),
		'MESS_BTN_DETAIL' => ($arParams['~MESS_BTN_DETAIL'] ?? ''),
		'MESS_NOT_AVAILABLE' => ($arParams['~MESS_NOT_AVAILABLE'] ?? ''),
		'MESS_BTN_COMPARE' => ($arParams['~MESS_BTN_COMPARE'] ?? ''),

		'USE_ENHANCED_ECOMMERCE' => ($arParams['USE_ENHANCED_ECOMMERCE'] ?? ''),
		'DATA_LAYER_NAME' => ($arParams['DATA_LAYER_NAME'] ?? ''),
		'BRAND_PROPERTY' => ($arParams['BRAND_PROPERTY'] ?? ''),

		'TEMPLATE_THEME' => ($arParams['TEMPLATE_THEME'] ?? ''),
		'ADD_TO_BASKET_ACTION' => ($arParams['ADD_TO_BASKET_ACTION'] ?? ''),
		'SHOW_CLOSE_POPUP' => ($arParams['SHOW_CLOSE_POPUP'] ?? ''),
		'COMPARE_PATH' => ($arParams['COMPARE_PATH'] ?? ''),
		'COMPARE_NAME' => ($arParams['COMPARE_NAME'] ?? ''),
		'USE_COMPARE_LIST' => ($arParams['USE_COMPARE_LIST'] ?? ''),
	] + $elementOrder;

?>

	<div class="common__leter">
		<div class="leter-row">

			<a href="?LETER=A" class="leter<?if($_GET['LETER'] == 'A'){?> active<?}?>">A</a>
			<a href="?LETER=B" class="leter<?if($_GET['LETER'] == 'B'){?> active<?}?>">B</a>
			<a href="?LETER=C" class="leter<?if($_GET['LETER'] == 'C'){?> active<?}?>">C</a>
			<a href="?LETER=D" class="leter<?if($_GET['LETER'] == 'D'){?> active<?}?>">D</a>
			<a href="?LETER=F" class="leter<?if($_GET['LETER'] == 'F'){?> active<?}?>">F</a>
			<a href="?LETER=G" class="leter<?if($_GET['LETER'] == 'G'){?> active<?}?>">G</a>
			<a href="?LETER=H" class="leter<?if($_GET['LETER'] == 'H'){?> active<?}?>">H</a>
			<a href="?LETER=I" class="leter<?if($_GET['LETER'] == 'I'){?> active<?}?>">I</a>
			<a href="?LETER=J" class="leter<?if($_GET['LETER'] == 'J'){?> active<?}?>">J</a>
			<a href="?LETER=K" class="leter<?if($_GET['LETER'] == 'K'){?> active<?}?>">K</a>
			<a href="?LETER=L" class="leter<?if($_GET['LETER'] == 'L'){?> active<?}?>">L</a>
			<a href="?LETER=M" class="leter<?if($_GET['LETER'] == 'M'){?> active<?}?>">M</a>
			<a href="?LETER=N" class="leter<?if($_GET['LETER'] == 'N'){?> active<?}?>">N</a>
			<a href="?LETER=O" class="leter<?if($_GET['LETER'] == 'O'){?> active<?}?>">O</a>
			<a href="?LETER=P" class="leter<?if($_GET['LETER'] == 'P'){?> active<?}?>">P</a>
			<a href="?LETER=Q" class="leter<?if($_GET['LETER'] == 'Q'){?> active<?}?>">Q</a>
			<a href="?LETER=R" class="leter<?if($_GET['LETER'] == 'R'){?> active<?}?>">R</a>
			<a href="?LETER=S" class="leter<?if($_GET['LETER'] == 'S'){?> active<?}?>">S</a>
			<a href="?LETER=T" class="leter<?if($_GET['LETER'] == 'T'){?> active<?}?>">T</a>
			<a href="?LETER=U" class="leter<?if($_GET['LETER'] == 'U'){?> active<?}?>">U</a>
			<a href="?LETER=V" class="leter<?if($_GET['LETER'] == 'V'){?> active<?}?>">V</a>
			<a href="?LETER=W" class="leter<?if($_GET['LETER'] == 'W'){?> active<?}?>">W</a>
			<a href="?LETER=X" class="leter<?if($_GET['LETER'] == 'X'){?> active<?}?>">X</a>
			<a href="?LETER=Y" class="leter<?if($_GET['LETER'] == 'Y'){?> active<?}?>">Y</a>
			<a href="?LETER=Z" class="leter<?if($_GET['LETER'] == 'Z'){?> active<?}?>">Z</a>

		</div>		
	</div>
	<div class="filter-active">
		<div class="filter-active-title">Applied Filters:</div>
	</div>
	<?/*
	<div class="common__search common__search-custom">
		

		
		<?
		if($_GET['count'] == 50 || $_GET['count'] == 100){
			$count = $_GET['count'];
		}else{
			$count = 25;
		}
		?>
		<div class="count">
			<div class="count__value"><?=$count;?></div>
			<div class="count__list">
				<div class="count__inner">
					<a class="count__item" href="<?=$APPLICATION->GetCurPageParam(false, array("count"))?>">25</a>
					<a class="count__item" href="<?=$APPLICATION->GetCurPageParam("count=50", array("count"))?>">50</a>
					<a class="count__item" href="<?=$APPLICATION->GetCurPageParam("count=100", array("count"))?>">100</a>
				</div>
			</div>
		</div>
	</div>
	*/?>
	<div class="catalog-list">
<?
	$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"bootstrap_v4",
		$componentParams,
		$arResult["THEME_COMPONENT"],
		[
			'HIDE_ICONS' => 'Y',
		]
	);?>
	</div>


	<?
}
?>
</div>
</div>