<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Localization\Loc;

?>

<div class="bx_profile">
	<?
	ShowError($arResult["strProfileError"]);

	if ($arResult['DATA_SAVED'] == 'Y')
	{
		ShowNote(Loc::getMessage('PROFILE_DATA_SAVED'));
	}

	?>
	<div class="personal-card">
		<div class="personal-card__wrap">
			<?$photo = CFile::ResizeImageGet($arResult['arUser']['PERSONAL_PHOTO'], array('width'=>130, 'height'=>130), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
			<div class="personal-card__preview">
				<?if($photo){?>
					<img src="<?=$photo['src']?>" alt=""></div>
				<?}else{?>
					<img src="<?=SITE_TEMPLATE_PATH?>/i/no-photo-login.png" alt=""></div>
				<?}?>
			
			<!-- если фотография не загружена-->
			<!--.personal-card__preview-->
			<!--  form.personal-card__form(action='' method='')-->
			<!--    label.personal-card__label-->
			<!--      input.personal-card__input(type='file' name='personal_photo')-->
			<!--      span Добавить фото-->
			<!--      img(src='images/personal-card/personal-img.png' alt='')-->
			<div class="personal-card__content">
				<div class="personal-card__top">
					<div class="title title--second"><?=$arResult['arUser']['LAST_NAME']?> <?=$arResult['arUser']['NAME']?></div>
					<div class="admin-links">
					<a class="personal-card__link" data-bs-toggle="modal" data-bs-target="#pass">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
					<path d="M5.0332 14.6875C5.07227 14.6875 5.11133 14.6836 5.15039 14.6777L8.43555 14.1016C8.47461 14.0938 8.51172 14.0762 8.53906 14.0469L16.8184 5.76758C16.8365 5.74951 16.8508 5.72805 16.8606 5.70442C16.8704 5.68079 16.8755 5.65546 16.8755 5.62988C16.8755 5.6043 16.8704 5.57897 16.8606 5.55535C16.8508 5.53172 16.8365 5.51026 16.8184 5.49219L13.5723 2.24414C13.5352 2.20703 13.4863 2.1875 13.4336 2.1875C13.3809 2.1875 13.332 2.20703 13.2949 2.24414L5.01562 10.5234C4.98633 10.5527 4.96875 10.5879 4.96094 10.627L4.38477 13.9121C4.36577 14.0167 4.37255 14.1244 4.40454 14.2258C4.43654 14.3273 4.49276 14.4193 4.56836 14.4941C4.69727 14.6191 4.85938 14.6875 5.0332 14.6875ZM6.34961 11.2812L13.4336 4.19922L14.8652 5.63086L7.78125 12.7129L6.04492 13.0195L6.34961 11.2812ZM17.1875 16.3281H2.8125C2.4668 16.3281 2.1875 16.6074 2.1875 16.9531V17.6562C2.1875 17.7422 2.25781 17.8125 2.34375 17.8125H17.6562C17.7422 17.8125 17.8125 17.7422 17.8125 17.6562V16.9531C17.8125 16.6074 17.5332 16.3281 17.1875 16.3281Z" fill="#7B5DE4"/>
				</svg> Edit</a>

					<a class="personal-card__link" href="<?=$APPLICATION->GetCurPageParam("logout=yes&".bitrix_sessid_get(), array(
      "login",
      "logout",
      "register",
      "forgot_password",
      "change_password"));?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  			<path d="M7.66667 17H4.55556C4.143 17 3.74733 16.8361 3.45561 16.5444C3.16389 16.2527 3 15.857 3 15.4444V4.55556C3 4.143 3.16389 3.74733 3.45561 3.45561C3.74733 3.16389 4.143 3 4.55556 3H7.66667M13.1111 13.8889L17 10L13.1111 6.11111M17 10H7.66667" stroke="#7B5DE4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			Log Out</a>
			
			</div>
				</div>
				<div class="personal-card__details">
							<div class="personal-card__part">
									<div class="personal-card__detail">
										<?
										$date = date_create($arResult['arUser']['DATE_REGISTER']);  
										$date = date_format($date, 'd.m.Y');?>
											<div class="personal-card__name">Date of registration:</div>
											<div class="personal-card__desc"><span><?=$date?></span></div>
									</div>
									<div class="personal-card__detail">
											<div class="personal-card__name">Phone:</div>
											<div class="personal-card__desc"><span><?=$arResult['arUser']['PERSONAL_PHONE']?></span></div>
									</div>
									<div class="personal-card__detail">
											<div class="personal-card__name">Organization:</div>
											<div class="personal-card__desc"><span><?=$arResult['arUser']['WORK_COMPANY']?></span></div>
									</div>
							</div>
							<div class="personal-card__part">
									<div class="personal-card__detail personal-card__detail--mobile">
											<div class="personal-card__name">Password:</div>
											<div class="personal-card__desc"><span>*********</span></div>
									</div>
									<div class="personal-card__detail personal-card__detail--mobile">
											<div class="personal-card__name">Email:</div>
											<div class="personal-card__desc"><span><?=$arResult['arUser']['EMAIL']?></span></div>
									</div>
							</div>
					</div>
			</div>
		</div>
	</div>



<div class="modal" id="pass">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        <div class="modal-title">Edit Profile</div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
			<div class="modal-body">



				<form method="post" name="form1" action="<?=POST_FORM_ACTION_URI?>" enctype="multipart/form-data" role="form" class="modal__form">
					<?=$arResult["BX_SESSION_CHECK"]?>
					<input type="hidden" name="lang" value="<?=LANG?>" />
					<input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />
					<input type="hidden" name="LOGIN" value="<?=$arResult["arUser"]["LOGIN"]?>" />
					<div class="main-profile-block-shown" id="user_div_reg">
						<div class="main-profile-block-date-info" style="display: none">
							<?
							if($arResult["ID"]>0)
							{
								if ($arResult["arUser"]["TIMESTAMP_X"] <> '')
								{
									?>
						
									<div class="col-sm-9 col-md-offset-3 small">
										<strong><?=Loc::getMessage('LAST_UPDATE')?></strong>
										<strong><?=$arResult["arUser"]["TIMESTAMP_X"]?></strong>
									</div>
									<?
								}

								if ($arResult["arUser"]["LAST_LOGIN"] <> '')
								{
									?>
									<div class="col-sm-9 col-md-offset-3 small">
										<strong><?=Loc::getMessage('LAST_LOGIN')?></strong>
										<strong><?=$arResult["arUser"]["LAST_LOGIN"]?></strong>
									</div>
									<?
								}
							}
							?>
						</div>
						<?
						if (!in_array(LANGUAGE_ID,array('ru', 'ua')))
						{
							?>
							<div class="form-group" style="display: none;">
								<label class="main-profile-form-label col-sm-12 col-md-3 text-md-right" for="main-profile-title"><?=Loc::getMessage('main_profile_title')?></label>
								<div class="col-sm-12">
									<input class="form-control" type="text" name="TITLE" maxlength="50" id="main-profile-title" value="<?=$arResult["arUser"]["TITLE"]?>" />
								</div>
							</div>
							<?
						}
						?>
						
																				
							
						<div class="modal__place">
							<div class="input-place form-group">
								<label class="input-place__label main-profile-form-label form-label" for="main-profile-name"><?=Loc::getMessage('NAME')?></label>
								<div class="form-input">
								<input class="input-place__input" type="text" name="NAME" maxlength="50" id="main-profile-name" value="<?=$arResult["arUser"]["NAME"]?>" />
								</div>
							</div>
						</div>
						<div class="modal__place">
							<div class="input-place">
								<label class="input-place__label main-profile-form-label form-label" for="main-profile-last-name"><?=Loc::getMessage('LAST_NAME')?></label>
								<div class="form-input">
								<input class="input-place__input" type="text" name="LAST_NAME" maxlength="50" id="main-profile-last-name" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
								</div>
							</div>
						</div>
						<div class="modal__place">
							<div class="input-place">
								<label class="input-place__label main-profile-form-label form-label" for="main-profile-second-name"><?=Loc::getMessage('SECOND_NAME')?></label>
								<div class="form-input">
								<input class="input-place__input" type="text" name="SECOND_NAME" maxlength="50" id="main-profile-second-name" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" />
								</div>
							</div>
						</div>
						<div class="modal__place">
							<div class="input-place">
								<label class="input-place__label main-profile-form-label form-label" for="main-profile-email"><?=Loc::getMessage('EMAIL')?></label>
								<div class="form-input">
								<input class="input-place__input" type="text" name="EMAIL" maxlength="50" id="main-profile-email" value="<?=$arResult["arUser"]["EMAIL"]?>" />
								</div>
							</div>
						</div>
						<?
						if ($arResult['CAN_EDIT_PASSWORD'])
						{
							?>
							<!-- <div class="modal__place">
								<div class="input-place form-group">
									<p class="main-profile-form-password-annotation col-sm-9 col-sm-offset-3 small">
										<?//echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?>
									</p>
								</div>
							</div> -->
							<div class="modal__place">
								<div class="input-place">
									<label class="input-place__label main-profile-form-label form-label" for="main-profile-password"><?=Loc::getMessage('NEW_PASSWORD_REQ')?></label>
									<div class="form-input">
									<input class="input-place__input bx-auth-input main-profile-password" type="password" name="NEW_PASSWORD" maxlength="50" id="main-profile-password" value="" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="modal__place">
								<div class="input-place">
									<label class="input-place__label main-profile-form-label main-profile-password form-label" for="main-profile-password-confirm">
										<?=Loc::getMessage('NEW_PASSWORD_CONFIRM')?>
									</label>
									<div class="form-input">
									<input class="input-place__input" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" id="main-profile-password-confirm" autocomplete="off" />
									</div>
								</div>
							</div>
							<?
						}
						?>
					</div>
					<div class="modal__submit main-profile-form-buttons-block">
						<input type="submit" name="save" class="btn btn-primary main-profile-submit" value="<?=(($arResult["ID"]>0) ? Loc::getMessage("MAIN_SAVE") : Loc::getMessage("MAIN_ADD"))?>">
						<input type="submit" class="btn btn-primary"  name="reset" value="<?echo GetMessage("MAIN_RESET")?>">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?/*
	<div class="col-sm-12 main-profile-social-block">
		<?
		if ($arResult["SOCSERV_ENABLED"])
		{
			$APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
				"SHOW_PROFILES" => "Y",
				"ALLOW_DELETE" => "Y"
			),
				false
			);
		}
		?>
	</div>
	<div class="clearfix"></div>
	*/?>
	<script>
		BX.Sale.PrivateProfileComponent.init();
	</script>
</div>

