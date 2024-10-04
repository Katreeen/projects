<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Danger pictograms");
$APPLICATION->SetPageProperty('body_class', 'top-bg');
?>

<div class="block-decor block-decor--second" style="background: url(<?= SITE_TEMPLATE_PATH ?>/i/BG-highloadblock.png);">

		<div class="container">
			
			<? if ($APPLICATION->GetCurPage() == '/handbook/') { ?>
				<h1 class="title-decor"><? $APPLICATION->ShowTitle(false) ?></h1>
			<? } else { ?>
				<h1 class="title-decor"><? $APPLICATION->AddBufferContent('top_title'); ?></h1>
				<div class="block-decor__desc">
					<? $APPLICATION->AddBufferContent('top_anons'); ?>
				</div>
			<? } ?>

		
<?/*
<div class="fix__menu">
	<nav class="nav">
		<?
		$APPLICATION->IncludeComponent(
		"bitrix:menu", 
		"fix", 
		array(
				"ROOT_MENU_TYPE" => "fix",
				"MAX_LEVEL" => "1",
				"CHILD_MENU_TYPE" => "",
				"USE_EXT" => "Y",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "Y",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => array(
				),
				"COMPONENT_TEMPLATE" => "fix"
			),
		false
		);?>
	</nav>
</div>
*/?>
<div class="page-content page-content--references">

<div class="page-content-grid">
	<div class="page-content-left">
		

		<? $APPLICATION->IncludeComponent(
	"bitrix:news", 
	"handbook", 
	array(
		"IBLOCK_ID" => "13",
		"COMPONENT_TEMPLATE" => "handbook",
		"IBLOCK_TYPE" => "handbook",
		"NEWS_COUNT" => "20",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_REVIEW" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_TITLE" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_PERMISSIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "prop",
			2 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "prop",
			2 => "",
		),
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"SEF_FOLDER" => "/handbook/",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
); ?>


<?/*$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
"AREA_FILE_SHOW" => "file",
"PATH" => SITE_TEMPLATE_PATH . "/inc/handbook_carousel.php",
"EDIT_TEMPLATE" => "include_areas_template.php"
), false
);*/?>




</div>
	<div class="page-content-right">
	<nav class="nav fix__nav">
		<div class="fix__nav-title">all reference books</div>
			<?
			$APPLICATION->IncludeComponent(
			"bitrix:menu", 
			"fix", 
			array(
					"ROOT_MENU_TYPE" => "fix",
					"MAX_LEVEL" => "1",
					"CHILD_MENU_TYPE" => "left",
					"USE_EXT" => "N",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N",
					"MENU_CACHE_TYPE" => "N",
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS" => array(
					),
					"COMPONENT_TEMPLATE" => "fix"
			),
			false
			);?>

	</nav>	

	</div>
</div>


</div>



</div>

</div>

<?/*$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
"AREA_FILE_SHOW" => "file",
"PATH" => SITE_TEMPLATE_PATH . "/inc/useful_articles.php",
"EDIT_TEMPLATE" => "include_areas_template.php"
), false
);*/?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>