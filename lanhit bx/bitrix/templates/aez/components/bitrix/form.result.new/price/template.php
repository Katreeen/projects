<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="form__part">
<div class="form__box">
<?
if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?=$arResult["FORM_NOTE"]?>
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
{/*
?>
	<div class="title title--second"><?=$arResult["FORM_TITLE"]?></div>
<?
*/} //endif ;

	if ($arResult["isFormImage"] == "Y")
	{
	?>
	<a href="<?=$arResult["FORM_IMAGE"]["URL"]?>" target="_blank" alt="<?=GetMessage("FORM_ENLARGE")?>"><img src="<?=$arResult["FORM_IMAGE"]["URL"]?>" <?if($arResult["FORM_IMAGE"]["WIDTH"] > 300):?>width="300"<?elseif($arResult["FORM_IMAGE"]["HEIGHT"] > 200):?>height="200"<?else:?><?=$arResult["FORM_IMAGE"]["ATTR"]?><?endif;?> hspace="3" vscape="3" border="0" /></a>
	<?//=$arResult["FORM_IMAGE"]["HTML_CODE"]?>
	<?
	} //endif
	?>

			<?//=$arResult["FORM_DESCRIPTION"]?>
			<p>The request for an individual synthesis is a great opportunity for large customers to receive an order-made product. Our production can synthesize products of any complexity for you both <a href="/catalog/">from our catalog</a> and under the order.</p>
		
	<?
} // endif
	?>


	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
	?>
		<div class="form__place form__place--width">



				<?/*if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;*/?>
				<?
				$tmp = $arQuestion["HTML_CODE"];


				if($FIELD_SID == 'SIMPLE_QUESTION_189'){
					$mainclasstextarea = 'class="input-place__input input-place__input--textarea" placeholder="'.$arQuestion["CAPTION"].'"';
					$arQuestion["HTML_CODE"] = $tmp;
					$tmp = str_replace('class="inputtextarea"', $mainclasstextarea, $tmp);
					?>
					<div class="input-place input-place--height">
						<? echo $tmp;?>
						<div class="input-place__error">
						<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
							<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
							<?endif;?>
						</div>
					</div>
				<?
				

				}else if($FIELD_SID == 'SIMPLE_QUESTION_788'){

					$mainclassfile = 'class="js-input-file" multiple="multiple"';
					//$arQuestion["HTML_CODE"] = $tmp;
					$tmp = str_replace('class="inputfile"', $mainclassfile, $tmp);?>
					<div class="input-place input-place--file <?=$FIELD_SID?>">
					<label class="input-place__label">
						<svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3.25808 8.70608L7.85508 4.11008C8.32469 3.6447 8.95952 3.38429 9.62067 3.38583C10.2818 3.38737 10.9154 3.65074 11.3829 4.1183C11.8503 4.58587 12.1135 5.21956 12.1148 5.8807C12.1162 6.54185 11.8556 7.17661 11.3901 7.64608L6.08708 12.9491C5.89848 13.1312 5.64588 13.232 5.38368 13.2298C5.12148 13.2275 4.87067 13.1223 4.68526 12.9369C4.49985 12.7515 4.39469 12.5007 4.39241 12.2385C4.39013 11.9763 4.49092 11.7237 4.67308 11.5351L9.97608 6.23108C10.0672 6.13678 10.1176 6.01048 10.1164 5.87938C10.1153 5.74829 10.0627 5.62288 9.96999 5.53018C9.87729 5.43747 9.75188 5.38489 9.62078 5.38375C9.48968 5.38261 9.36338 5.43301 9.26908 5.52408L3.96508 10.8291C3.59007 11.2042 3.37944 11.713 3.37953 12.2434C3.37958 12.5061 3.43136 12.7662 3.53191 13.0088C3.63247 13.2514 3.77983 13.4719 3.96558 13.6576C4.15134 13.8433 4.37185 13.9906 4.61452 14.091C4.8572 14.1915 5.11728 14.2432 5.37993 14.2431C5.91038 14.243 6.41907 14.0322 6.79408 13.6571L12.0971 8.35408C12.7535 7.69767 13.1223 6.80739 13.1223 5.87908C13.1223 4.95078 12.7535 4.0605 12.0971 3.40408C11.4407 2.74767 10.5504 2.37891 9.62208 2.37891C8.69378 2.37891 7.80349 2.74767 7.14708 3.40408L2.55108 7.99908C2.50333 8.04521 2.46524 8.10038 2.43903 8.16138C2.41283 8.22238 2.39903 8.28799 2.39846 8.35438C2.39788 8.42077 2.41053 8.48661 2.43567 8.54806C2.46081 8.60951 2.49794 8.66534 2.54488 8.71228C2.59183 8.75923 2.64766 8.79635 2.7091 8.8215C2.77055 8.84664 2.83639 8.85929 2.90278 8.85871C2.96917 8.85813 3.03478 8.84434 3.09578 8.81814C3.15679 8.79193 3.21196 8.75384 3.25808 8.70608Z" fill="#2F80ED"></path>
						</svg>
						<span>Attach Files</span>
						<?echo $tmp;?>
					</label><span class="input-place__desc">You can attach up to 5 files</span>
					<div class="input-place__error">

						<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
							<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
							<?endif;?>
					</div>
				</div>
				<?
				}?>
		</div>
				<?
		}
	} //endwhile
	?>			
				

			

		</div>
</div>

<div class="form__info">
		<!-- <div class="info-block">
				<div class="info-block__inner">Отправить запрос индивидуального синтеза могут только авторизованные пользователи</div>
		</div> -->
</div>

<div class="form__body">
	<div class="form__box">
	<div class="form__heading">
			<div class="form__title">
					<h2 class="title title--second">Quick registration</h2>
					<!-- <div class="form__tooltip">
							<div class="tooltip">
									<div class="tooltip__icon"></div>
									<div class="tooltip__desc">Заказ доступен только для авторизованных пользователей</div>
							</div>
					</div> -->
			</div><a class="form__heading-link button button--height js-show-modal" data-bs-toggle="modal" data-bs-target="#modal-login" href="#" data-type="signin">log In</a>
	</div>

	<div class="form__places">
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{?>
		<?
				$tmp = $arQuestion["HTML_CODE"];


				if($FIELD_SID != 'SIMPLE_QUESTION_788' && $FIELD_SID != 'SIMPLE_QUESTION_189'){

					if($FIELD_SID == 'SIMPLE_QUESTION_838'){
						$mainclasstext = ' class="input-place__input js-input-phone" placeholder="'.$arQuestion["CAPTION"].'"';
						$arQuestion["HTML_CODE"] = $tmp;
						$tmp = str_replace('class="inputtext"', $mainclasstext, $tmp);
						$tmp = str_replace('type="text"', 'type="tel"', $tmp);
						
						?>
						<div class="form__place">
						<div class="input-place">
							<label class="input-place__label <?=$FIELD_SID?>"><?=$arQuestion["CAPTION"]?>:<span> *</span></label>
							<? echo $tmp;?>
							<div class="input-place__error">
							<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
								<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
								<?endif;?>
							</div>
						</div>
					</div>

				<?
					/*}else if ($FIELD_SID == 'SIMPLE_QUESTION_754'){
						$mainclasstext = 'class="select js-select" placeholder="'.$arQuestion["CAPTION"].'" data-search="false" data-type="search"';
						$arQuestion["HTML_CODE"] = $tmp;
						$tmp = str_replace('class="inputselect"', $mainclasstext, $tmp);?>

					<div class="form__place">
						<div class="input-place">
							<label class="input-place__label <?=$FIELD_SID?>"><?=$arQuestion["CAPTION"]?>:<span> *</span></label>
							<? echo $tmp;?>
							<div class="input-place__error">
							<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
								<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
								<?endif;?>
							</div>
						</div>
					</div>

						<?*/
					}else if($FIELD_SID == 'SIMPLE_QUESTION_754'){
						
						\Bitrix\Main\Loader::includeModule('sale');
						$res = \Bitrix\Sale\Location\LocationTable::getList(array(
								'filter' => array('=NAME.LANGUAGE_ID' => LANGUAGE_ID, 'TYPE_CODE' => 'COUNTRY'),
								'select' => array('*', 'NAME_RU' => 'NAME.NAME', 'TYPE_CODE' => 'TYPE.CODE')
						));

						?>
						<div class="form__place">
							<div class="input-place">
								<label class="input-place__label <?=$FIELD_SID?>"><?=$arQuestion["CAPTION"]?>:<span> *</span></label>
								<select class="select js-select" placeholder="Country" data-search="false" data-type="search" name="form_dropdown_SIMPLE_QUESTION_754" id="form_dropdown_SIMPLE_QUESTION_754">
									
								
									<?
									while($item = $res->fetch())
									{?>

									<option value="<?=$item['NAME_RU']?>"><?=$item['NAME_RU']?></option>
											

									<?
				
									}?>
								</select>
								<div class="input-place__error">
								<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
									<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
									<?endif;?>
								</div>
							</div>
						</div>
						<?

					}else{

					

					$mainclasstext = 'class="input-place__input" placeholder="'.$arQuestion["CAPTION"].'"';
					$arQuestion["HTML_CODE"] = $tmp;
					$tmp = str_replace('class="inputtext"', $mainclasstext, $tmp);
					
					?>
					<div class="form__place">
						<div class="input-place">
							<label class="input-place__label <?=$FIELD_SID?>"><?=$arQuestion["CAPTION"]?>:<span> *</span></label>
							<? echo $tmp;?>
							<div class="input-place__error">
							<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
								<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
								<?endif;?>
							</div>
						</div>
					</div>
				<?
				}
				?>
				<?
				}
				?>

	



<?}?>
<?}?>
	

			<div class="form__place form__place--width">
					<div class="input-place">
							<input class="input-place__checkbox" id="agree" type="checkbox" name="agree">
							<label class="input-place__checkbox-label" for="agree">I agree with <a class="input-place__link" href="#">&nbsp;the personal data processing policy</a></label>
					</div>
			</div>
		
	</div>


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





<div class="form__place">

				<input class="form__submit button" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
				<?/*if ($arResult["F_RIGHT"] >= 15):?>
				&nbsp;<input type="hidden" name="web_form_apply" value="Y" /><input type="submit" name="web_form_apply" value="<?=GetMessage("FORM_APPLY")?>" />
				<?endif;?>
				&nbsp;<input type="reset" value="<?=GetMessage("FORM_RESET");?>" />*/?>


<?/*=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")*/?>
</div>


<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>
	</div>
</div>
