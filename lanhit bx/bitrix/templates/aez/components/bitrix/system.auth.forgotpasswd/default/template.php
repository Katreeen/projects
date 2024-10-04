<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

if (!empty($arParams["~AUTH_RESULT"]))
{
	ShowMessage($arParams["~AUTH_RESULT"]);
}

?>
<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if ($arResult["BACKURL"] <> '')
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<div class="form-row">
	<div class="form-item"><?echo GetMessage("sys_forgot_pass_label")?></div>
	</div>
	<div class="form-row">
		<div class="form-label"><?=GetMessage("sys_forgot_pass_login1")?></div>
		<div class="form-input">
			<input type="text" name="USER_LOGIN" value="<?=$arResult["USER_LOGIN"]?>" placeholder="Your email"/>
			<input type="hidden" name="USER_EMAIL" />
		</div>
		<div class="form-text -gray"><?echo GetMessage("sys_forgot_pass_note_email")?></div>
	</div>

<?if($arResult["PHONE_REGISTRATION"]):?>

	<div class="form-row">
	<div class="form-label"><?=GetMessage("sys_forgot_pass_phone")?></div>
	<div class="form-input"><input type="text" name="USER_PHONE_NUMBER" value="<?=$arResult["USER_PHONE_NUMBER"]?>" /></div>
	<div class="form-item"><?echo GetMessage("sys_forgot_pass_note_phone")?></div>
	</div>
<?endif;?>

<?if($arResult["USE_CAPTCHA"]):?>
	<div style="margin-top: 16px">
		<div>
			<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
		</div>
		<div><?echo GetMessage("system_auth_captcha")?></div>
		<div><input type="text" name="captcha_word" maxlength="50" value="" /></div>
	</div>
<?endif?>
<div class="form-row">
	<div class="form-item -center">
			<input type="submit" class="btn btn-primary" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
	</div>
	</div>
</form>



<script type="text/javascript">
// document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
//document.bform.USER_LOGIN.focus();
</script>
