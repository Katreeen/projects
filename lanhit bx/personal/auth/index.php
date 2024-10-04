<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?><?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "", Array(
	"COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
		"COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
		"FORGOT_PASSWORD_URL" => "index.php",	// Страница забытого пароля
		"PROFILE_URL" => "/personal/",	// Страница профиля
		"REGISTER_URL" => "registration.php",	// Страница регистрации
		"SHOW_ERRORS" => "Y",	// Показывать ошибки
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>