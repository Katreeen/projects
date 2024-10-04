<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$APPLICATION->SetPageProperty('top_anons', $arResult["PREVIEW_TEXT"]);

$GLOBALS['__NEWS_ID__'] = $arResult["ID"];
if ($arResult['PROPERTIES']['FULL_TITLE']['VALUE'] != '') {
	$APPLICATION->SetPageProperty('top_title', $arResult['PROPERTIES']['FULL_TITLE']['VALUE']);
} else {
	$APPLICATION->SetPageProperty('top_title', $arResult["NAME"]);
} ?>



<?
if ($arResult['PROPERTIES']['LIST_N_FAZ']['VALUE'] != '') { ?>
	
	<?
	$arFilter = array('IBLOCK_ID' => 16, 'ACTIVE' => 'Y', 'ID' => $arResult['PROPERTIES']['LIST_N_FAZ']['VALUE']);
	$dbSection = CIBlockSection::GetList(array(), $arFilter, false, array("UF_*"));

	while ($arSection = $dbSection->GetNext()) {
		$sections[] = $arSection;
	}


	foreach ($sections as $section) {
		//$icon = CFile::ResizeImageGet($section['UF_ICON'], array('width' => 150, 'height' => 150), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	?>

		<div class="danger-list">
			<div class="danger-list__part">
				<div class="danger-list__title">
					<?= $section['NAME'] ?>
				</div>
				<?
				$arSelect = array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "PROPERTY_COLOR");
				$arFilter = array("IBLOCK_ID" => 16, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "SECTION_ID" => $section['ID']);
				$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 99), $arSelect);
				while ($ob = $res->GetNextElement()) {
					$arFields[] = $ob->GetFields();
				}


				foreach ($arFields as $item) { ?>

					<div class="danger-list__item">
						<div class="danger-item">
							<div class="danger-item__code">
							<span class="decor <? if ($item['PROPERTY_COLOR_VALUE'] == 'красный') {
																										echo 'decor--red';
																									} ?>">
								<?= $item['NAME'] ?></span>
							</div>
							<div class="danger-item__text"><?= $item['~PREVIEW_TEXT'] ?></div>
						</div>
					</div>

				<? } ?>



			</div>
		</div>
	<?
		unset($arFields);
	} ?>

<? } ?>

<?
if ($arResult['PROPERTIES']['LIST_R_FAZ']['VALUE'] != '') { ?>
	<h2 class="title title--second title--white">List of P-phrases</h2>
	<?
	$arFilter = array('IBLOCK_ID' => 17, 'ACTIVE' => 'Y', 'ID' => $arResult['PROPERTIES']['LIST_R_FAZ']['VALUE']);
	$dbSection = CIBlockSection::GetList(array(), $arFilter, false, array("UF_*"));

	while ($arSection = $dbSection->GetNext()) {
		$sections[] = $arSection;
	} ?>

	<?
	foreach ($sections as $section) {
		//$icon = CFile::ResizeImageGet($section['UF_ICON'], array('width' => 150, 'height' => 150), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	?>

		<div class="danger-list">
			<div class="danger-list__part">
				<div class="danger-list__title">
					<?= $section['NAME'] ?>
				</div>
				<?
				$arSelect = array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "PROPERTY_COLOR");
				$arFilter = array("IBLOCK_ID" => 17, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "SECTION_ID" => $section['ID']);
				$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 99), $arSelect);
				while ($ob = $res->GetNextElement()) {
					$arFields[] = $ob->GetFields();
				} ?>




				<?
				foreach ($arFields as $item) { ?>

					<div class="danger-list__item">
						<div class="danger-item">
							<div class="danger-item__code"><span class="decor <? if ($item['PROPERTY_COLOR_VALUE'] == 'красный') {
																										echo 'decor--red';
																									} ?>">
								<?= $item['NAME'] ?></span>
							</div>
							<div class="danger-item__text"><?= $item['~PREVIEW_TEXT'] ?></div>
						</div>
					</div>

				<? } ?>



			</div>
		</div>
	<?
		unset($arFields);
	} ?>

<? } ?>

<?
if ($arResult['PROPERTIES']['LIST_UN']['VALUE'] != '') { ?>
	<h2 class="title title--second title--white">List of UN-numbers</h2>


	<div class="danger-list">
		<div class="danger-list__part">

			<div class="table">
				<div class="table__head">
					<div class="table__column">
						<div class="table__text table__text--left">UN number</div>
					</div>
					<div class="table__column table__column--l">
						<div class="table__text">Name description</div>
					</div>
					<div class="table__column table__column--m">
						<div class="table__text">Hazard class</div>
					</div>
					<div class="table__column table__column--m">
						<div class="table__text">Packing Group</div>
					</div>
				</div>
				<div class="table__body">
					<?
					$arSelect = array("ID", "IBLOCK_ID", "NAME", "PROPERTY_UN_TITLE", "PROPERTY_UN_DESCR", "PROPERTY_UN_CLASS", "PROPERTY_UN_GROUP");
					$arFilter = array("IBLOCK_ID" => 18, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "SECTION_ID" => $arResult['PROPERTIES']['LIST_UN']['VALUE']);
					$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 99), $arSelect);
					while ($ob = $res->GetNextElement()) {
						$arFields[] = $ob->GetFields();
					} ?>

					<?
					foreach ($arFields as $item) { ?>



						<div class="table__item">
							<div class="table__column">
								<div class="table__code">
									<div class="table__text table__text--modile">UN</div>
									<div class="decor decor--blue"><?= $item['NAME'] ?></div>
								</div>
							</div>
							<div class="table__column table__column--l">
								<div class="table__desc"><?= $item['PROPERTY_UN_TITLE_VALUE'] ?><span><?= $item['PROPERTY_UN_DESCR_VALUE'] ?></span></div>
							</div>
							<div class="table__column table__column--m">
								<div class="table__text table__text--modile">Класс опасности:</div>
								<div class="table__text"><?= $item['PROPERTY_UN_CLASS_VALUE'] ?></div>
							</div>
							<div class="table__column table__column--m">
								<div class="table__text table__text--modile">Группа упаковки:</div>
								<div class="table__text"><?= $item['PROPERTY_UN_GROUP_VALUE'] ?></div>
							</div>
						</div>


					<? } ?>

				</div>
			</div>
		</div>
	</div>
<?
} ?>
<?
if ($arResult['PROPERTIES']['LIST_PIC']['VALUE'] != '') {

	$arFilter = array('IBLOCK_ID' => 12, 'ACTIVE' => 'Y', 'ID' => $arResult['PROPERTIES']['LIST_PIC']['VALUE']);
	$dbSection = CIBlockSection::GetList(array("SORT"=>"ASC"), $arFilter, false, array("UF_*"));

	while ($arSection = $dbSection->GetNext()) {
		$sections[] = $arSection;
	}


	foreach ($sections as $key => $section) { ?>

		<h2 class="title title--second <?if($key == 0){echo 'title--white';}?>"><?= $section['NAME'] ?></h2>
		<?
		$arSelect = array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_USING", "PROPERTY_EXAMPLE");
		$arFilter = array("IBLOCK_ID" => 12, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y", "SECTION_ID" => $section['ID']);
		$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 99), $arSelect);
		while ($ob = $res->GetNextElement()) {
			$arFields[] = $ob->GetFields();
		}

		$i = 0;
		foreach ($arFields as $item) {
			$i++;
			$icon = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], array('width' => 150, 'height' => 150), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
	
			<div class="pictogram-card">
				<div class="pictogram-card__wrap">
					<div class="pictogram-card__img"><img src="<?= $icon['src'] ?>" alt="pictogram-img"></div>
					<div class="pictogram-card__inner">
						<div class="pictogram-card__head">
							<div class="pictogram-card__title title title--second"><?= $item['NAME'] ?></div>
							<!-- <div class="pictogram-card__count">0<?//= $i ?></div> -->
						</div>
						<div class="pictogram-card__desc">
							<?= $item['~PREVIEW_TEXT'] ?>
						</div>
						<div class="pictogram-card__columns">
							<div class="pictogram-card__column">
								<div class="pictogram-card__text">Application:</div>
								<?= $item['~PROPERTY_USING_VALUE']['TEXT'] ?>
							</div>
							<div class="pictogram-card__column">
								<div class="pictogram-card__text">Examples:</div>
								<?= $item['~PROPERTY_EXAMPLE_VALUE']['TEXT'] ?>
							</div>
						</div>
					</div>
				</div>
			</div>


		<? } ?>


	<?
		unset($arFields);
	} ?>



<? } ?>


<? echo $arResult["DETAIL_TEXT"]; ?>