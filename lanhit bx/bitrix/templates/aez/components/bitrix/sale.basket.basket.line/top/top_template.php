<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?><div class="bx-hdr-profile">
<?if (!$compositeStub && $arParams['SHOW_AUTHOR'] == 'Y'):?>
	<div class="bx-basket-block">
		<i class="fa fa-user"></i>
		<?if ($USER->IsAuthorized()):
			$name = trim($USER->GetFullName());
			if (! $name)
				$name = trim($USER->GetLogin());
			if (mb_strlen($name) > 15)
				$name = mb_substr($name, 0, 12).'...';
			?>
			<a href="<?=$arParams['PATH_TO_PROFILE']?>"><?=htmlspecialcharsbx($name)?></a>
			&nbsp;
			<a href="?logout=yes&<?=bitrix_sessid_get()?>"><?=GetMessage('TSB1_LOGOUT')?></a>
		<?else:
			$arParamsToDelete = array(
				"login",
				"login_form",
				"logout",
				"register",
				"forgot_password",
				"change_password",
				"confirm_registration",
				"confirm_code",
				"confirm_user_id",
				"logout_butt",
				"auth_service_id",
				"clear_cache",
				"backurl",
			);

			$currentUrl = urlencode($APPLICATION->GetCurPageParam("", $arParamsToDelete));
			if ($arParams['AJAX'] == 'N')
			{
				?><script type="text/javascript"><?=$cartId?>.currentUrl = '<?=$currentUrl?>';</script><?
			}
			else
			{
				$currentUrl = '#CURRENT_URL#';
			}
			
			$pathToAuthorize = $arParams['PATH_TO_AUTHORIZE'];
			$pathToAuthorize .= (mb_stripos($pathToAuthorize, '?') === false ? '?' : '&');
			$pathToAuthorize .= 'login=yes&backurl='.$currentUrl;
			?>
			<a href="<?=$pathToAuthorize?>">
				<?=GetMessage('TSB1_LOGIN')?>
			</a>
			<?
			if ($arParams['SHOW_REGISTRATION'] === 'Y')
			{
				$pathToRegister = $arParams['PATH_TO_REGISTER'];
				$pathToRegister .= (mb_stripos($pathToRegister, '?') === false ? '?' : '&');
				$pathToRegister .= 'register=yes&backurl='.$currentUrl;
				?>
				<a href="<?=$pathToRegister?>">
					<?=GetMessage('TSB1_REGISTER')?>
				</a>
				<?
			}
			?>
		<?endif?>
	</div>
<?endif?>
	<div class="basket-top">
		<?
		if (!$arResult["DISABLE_USE_BASKET"])
		{
			?>
			<a href="<?= $arParams['PATH_TO_BASKET'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<path d="M2.31 11.242C2.27324 11.0946 2.27054 10.9408 2.3021 10.7922C2.33366 10.6436 2.39866 10.5042 2.49215 10.3845C2.58565 10.2648 2.70519 10.1679 2.8417 10.1013C2.97821 10.0347 3.1281 10 3.28 10H20.72C20.8719 10 21.0218 10.0347 21.1583 10.1013C21.2948 10.1679 21.4143 10.2648 21.5078 10.3845C21.6013 10.5042 21.6663 10.6436 21.6979 10.7922C21.7295 10.9408 21.7268 11.0946 21.69 11.242L19.879 18.485C19.7708 18.9177 19.5212 19.3018 19.1697 19.5763C18.8182 19.8508 18.385 19.9999 17.939 20H6.061C5.61501 19.9999 5.18183 19.8508 4.83033 19.5763C4.47882 19.3018 4.22915 18.9177 4.121 18.485L2.31 11.243V11.242Z" stroke="#171C30" stroke-width="2" stroke-linejoin="round"/>
				<path d="M9 14V16M15 14V16M6 10L10 4M18 10L14 4" stroke="#171C30" stroke-width="2" stroke-linecap="round"/>
			</svg>
			</a><?
		}

		if (!$compositeStub)
		{
			if ($arParams['SHOW_NUM_PRODUCTS'] == 'Y' && ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y'))
			{?>
			<span class="count">

				<?=$arResult['NUM_PRODUCTS'];?>
			</span>
				<?
				if ($arParams['SHOW_TOTAL_PRICE'] == 'Y')
				{
					?>
					<br <? if ($arParams['POSITION_FIXED'] == 'Y'): ?>class="hidden-xs"<? endif; ?>/>
					<span>
						<?=GetMessage('TSB1_TOTAL_PRICE')?> <strong><?=$arResult['TOTAL_PRICE']?></strong>
					</span>
					<?
				}
			}
		}

		if ($arParams['SHOW_PERSONAL_LINK'] == 'Y'):?>
			<div style="padding-top: 4px;">
			<span class="icon_info"></span>
			<a href="<?=$arParams['PATH_TO_PERSONAL']?>"><?=GetMessage('TSB1_PERSONAL')?></a>
			</div>
		<?endif?>
	</div>
</div>