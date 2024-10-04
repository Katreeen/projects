<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Request for individual synthesis");
?>

<div class="container">

  <div class="page-content">
      <h1 class="title"><? $APPLICATION->ShowTitle(false) ?></h1>
      

      <?

      $APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	"price", 
	array(
		"COMPONENT_TEMPLATE" => "price",
		"WEB_FORM_ID" => "2",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "Y",
		"SEF_MODE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
<!-- <div class="form__info">
  <div class="info-block">
      <div class="info-block__inner">Отправить запрос индивидуального синтеза могут только авторизованные пользователи</div>
  </div>
</div> -->
        <?/*$APPLICATION->IncludeComponent(
	"bitrix:main.register", 
	"fastreg", 
	array(
		"USER_PROPERTY_NAME" => "",
		"SEF_MODE" => "Y",
		"SHOW_FIELDS" => array(
			0 => "EMAIL",
			1 => "NAME",
			2 => "LAST_NAME",
			3 => "PERSONAL_PHONE",
			4 => "PERSONAL_COUNTRY",
			5 => "WORK_COMPANY",
		),
		"REQUIRED_FIELDS" => array(
			0 => "EMAIL",
			1 => "NAME",
		),
		"AUTH" => "Y",
		"USE_BACKURL" => "Y",
		"SUCCESS_PAGE" => "",
		"SET_TITLE" => "N",
		"USER_PROPERTY" => array(
		),
		"SEF_FOLDER" => "/",
		"COMPONENT_TEMPLATE" => "fastreg"
	),
	false
);*/?> 



        



















      <!-- <button class="button js-show-modal" data-type="agree">Показать модалку</button> -->
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



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>