<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<? if ($arResult["FORM_NOTE"] == "Y" || $arResult["FORM_NOTE"]){?>

<div class="modal-content">
	<div class="modal-header border-0">
		<!-- <img src="/bitrix/templates/dirs/img/34247.png" class="img-position" alt=""> -->
	</div>
	<div class="modal-body" style="text-align: center;">
		<div class="title-h4 font-bold tac">Thanks for your application!</div>
	</div>
</div>

<?}?>
<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>

<?
if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
{
?>
<?
if ($arResult["isFormTitle"])
{
?>
<div class="form-title"><?=$arResult["FORM_TITLE"]?></div>
<?
} //endif ;

	if ($arResult["isFormImage"] == "Y")
	{
	?>
	<a href="<?=$arResult["FORM_IMAGE"]["URL"]?>" target="_blank" alt="<?=GetMessage("FORM_ENLARGE")?>"><img src="<?=$arResult["FORM_IMAGE"]["URL"]?>" <?if($arResult["FORM_IMAGE"]["WIDTH"] > 300):?>width="300"<?elseif($arResult["FORM_IMAGE"]["HEIGHT"] > 200):?>height="200"<?else:?><?=$arResult["FORM_IMAGE"]["ATTR"]?><?endif;?> hspace="3" vscape="3" border="0" /></a>
	<?//=$arResult["FORM_IMAGE"]["HTML_CODE"]?>
	<?
	} //endif
	?>

	<?=$arResult["FORM_DESCRIPTION"]?>
	<?
} // endif
	?>

<div class="row">
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{

			$tmp = $arQuestion["HTML_CODE"];
			$mainclass = 'class="'.$FIELD_SID .' form-control w-100 "';

			$tmp = str_replace('class="inputtext"', $mainclass, $tmp);
			$tmp = str_replace('class="inputtextarea"', $mainclass, $tmp);

	?>
	<?if ($FIELD_SID == 'SIMPLE_QUESTION_798'){?>
	</div>
	<?}?>
	<?if ($FIELD_SID != 'SIMPLE_QUESTION_798'){?>
		<div class="col-lg-6">
	<?}?>
	<div class="form-label"><?=$arQuestion["CAPTION"]?>:</div>
	<div class="form-input">
		<?=$tmp;?>
	</div>
	<?if ($FIELD_SID != 'SIMPLE_QUESTION_798'){?>
	</div>
	<?}?>
				


	<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
	<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
	<?endif;?>
		
	<?
		}
	} //endwhile
	?>
<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
		<tr>
			<th colspan="2"><b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b></th>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></td>
		</tr>
		<tr>
			<td><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></td>
			<td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></td>
		</tr>
<?
} // isUseCaptcha
?>
	


				<input class="btn btn-primary" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
				
				
				<?/*
				if ($arResult["F_RIGHT"] >= 15):?>
				&nbsp;<input type="hidden" name="web_form_apply" value="Y" /><input type="submit" name="web_form_apply" value="<?=GetMessage("FORM_APPLY")?>" />
				<?endif;?>
				&nbsp;<input type="reset" value="<?=GetMessage("FORM_RESET");?>" />
				*/?>
		



<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)