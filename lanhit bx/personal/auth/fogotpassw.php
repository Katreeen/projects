<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>
<div class="container">

    <div class="page-content">


        <? if (CUser::IsAuthorized()) { ?>

        <? } else { ?>
            <? $APPLICATION->IncludeComponent(
                "bitrix:system.auth.forgotpasswd",
                ".default",
                array()
            ); ?>

        <? } ?>

    </div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>