<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Запрос индивидуального синтеза");
?>

<div class="container">
  <div class="breadcrumbs breadcrumbs--invert">
  <? $APPLICATION->IncludeComponent(
          "bitrix:breadcrumb",
          "main",
          array(
            "START_FROM" => "0",
            "PATH" => "",
            "SITE_ID" => "s1"
          )
        ); ?>
  </div>
  <div class="page-content">
      <h1 class="title"><? $APPLICATION->ShowTitle(false) ?></h1>
      <p> Запрос индивидуального синтеза - это отличная возможность для крупных заказчиков получить товар под заказ. Наше производство может синтезировать для вас товары любой сложности как из<a href="/catalog/"> нашего каталога,</a> так и под заказ. </p>

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
      <h2 class="title title--second">Дополнительно</h2>
      <div class="additionally-list">
          <div class="additionally-list__inner js-slider">
              <div class="additionally-list__item">
                <a class="card" href="/catalog/">
                      <div class="card__icon">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="25" cy="25" r="25" fill="#FED444"/>
                        <path d="M36.231 32.618L29 22.675V13H31V11H19V13H21V22.675L13.769 32.618C13.3329 33.2174 13.071 33.9259 13.0125 34.6649C12.954 35.4039 13.1011 36.1447 13.4375 36.8053C13.7739 37.4659 14.2866 38.0206 14.9187 38.4079C15.5508 38.7953 16.2777 39.0002 17.019 39H32.98C33.7214 39.0002 34.4483 38.7953 35.0804 38.4079C35.7125 38.0206 36.2251 37.4659 36.5615 36.8053C36.8979 36.1447 37.045 35.4039 36.9865 34.6649C36.928 33.9259 36.6662 33.2174 36.23 32.618H36.231ZM23 23.325V13H27V23.325L29.673 27H20.327L23 23.325ZM32.981 37H17.02C16.6478 36.9996 16.283 36.8964 15.9657 36.7017C15.6485 36.507 15.3912 36.2285 15.2222 35.8968C15.0533 35.5652 14.9793 35.1933 15.0084 34.8222C15.0375 34.4511 15.1685 34.0953 15.387 33.794L18.873 29H31.127L34.614 33.794C34.8326 34.0953 34.9636 34.4511 34.9927 34.8222C35.0218 35.1933 34.9477 35.5652 34.7788 35.8968C34.6099 36.2285 34.3526 36.507 34.0353 36.7017C33.7181 36.8964 33.3532 36.9996 32.981 37Z" fill="#3C3C3C"/>
                        </svg>

                      </div>
                      <div class="card__name">Каталог соединений</div>
                      <div class="card__desc">Найдите нужные соединения в нашем каталоге соединений</div>
                    </a>
                </div>
              <div class="additionally-list__item">
                <a class="card" href="/faq/">
                      <div class="card__icon">
                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="25" cy="25" r="25" fill="#FED444"/>
                        <path d="M19.8515 20.8487C19.8489 20.9093 19.8588 20.9697 19.8804 21.0263C19.9021 21.0829 19.9351 21.1345 19.9774 21.1779C20.0197 21.2213 20.0705 21.2555 20.1265 21.2786C20.1826 21.3016 20.2428 21.313 20.3033 21.3119H21.8502C22.109 21.3119 22.3152 21.1 22.349 20.8431C22.5177 19.6131 23.3615 18.7169 24.8652 18.7169C26.1515 18.7169 27.329 19.36 27.329 20.9069C27.329 22.0975 26.6277 22.645 25.5196 23.4775C24.2577 24.3944 23.2583 25.465 23.3296 27.2031L23.3352 27.61C23.3372 27.733 23.3874 27.8503 23.4751 27.9366C23.5628 28.0229 23.6809 28.0713 23.804 28.0712H25.3246C25.4489 28.0712 25.5681 28.0219 25.6561 27.934C25.744 27.846 25.7933 27.7268 25.7933 27.6025V27.4056C25.7933 26.0594 26.3052 25.6675 27.6871 24.6194C28.829 23.7512 30.0196 22.7875 30.0196 20.7644C30.0196 17.9313 27.6271 16.5625 25.0077 16.5625C22.6321 16.5625 20.0296 17.6687 19.8515 20.8487ZM22.7708 31.6544C22.7708 32.6537 23.5677 33.3925 24.6646 33.3925C25.8065 33.3925 26.5921 32.6537 26.5921 31.6544C26.5921 30.6194 25.8046 29.8919 24.6627 29.8919C23.5677 29.8919 22.7708 30.6194 22.7708 31.6544Z" fill="black"/>
                        </svg>

                      </div>
                      <div class="card__name">Часто задаваемые вопросы</div>
                      <div class="card__desc">Отвечаем на самые частые вопросы клиентов</div></a></div>
          </div>
      </div>
  </div>
</div>



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>