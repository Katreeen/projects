<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "MAIN");
$APPLICATION->SetPageProperty("description", "Production Of High Purity Materials");
$APPLICATION->SetTitle("Production Of High Purity Materials");
$APPLICATION->SetPageProperty('body_class', 'home');
CModule::IncludeModule("iblock");
?>

<section class="promo">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="promo__title font-lora">Production of high purity materials</div>
				<div class="promo__descr">AEZ Kimya is a manufacturer of high-purity inorganic compounds based in Istanbul, Türkiye.</div>
				<a href="/catalog/" class="btn btn-primary promo__btn">Product catalog</a>
			</div>
		</div>
		<div class="promo__list">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="promo__block">
						<div class="promo__icon">
							<img src="<?= SITE_TEMPLATE_PATH ?>/i/promo1.png" alt="">
						</div>
						<div class="promo__subtitle font-lora font-500">64 elements</div>
						<div class="promo__text">Amadeo Chemicals è un produttore di composti inorganici altamente puri e di elevata purezza. </div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="promo__block">
						<div class="promo__icon">
							<img src="<?= SITE_TEMPLATE_PATH ?>/i/promo2.png" alt="">
						</div>
						<div class="promo__subtitle font-lora font-500">Release form</div>
						<div class="promo__text">Amadeo Chemicals è un produttore di composti inorganici altamente puri e di elevata purezza. </div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="promo__block">
						<div class="promo__icon">
							<img src="<?= SITE_TEMPLATE_PATH ?>/i/promo3.png" alt="">
						</div>
						<div class="promo__subtitle font-lora font-500">High purity</div>
						<div class="promo__text">Amadeo Chemicals è un produttore di composti inorganici altamente puri e di elevata purezza. </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/home_catalog.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>


<section class="background-image">
	<div class="container">
		<img src="<?= SITE_TEMPLATE_PATH ?>/i/home-bg.png" alt="">
	</div>
</section>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_TEMPLATE_PATH . "/inc/home_about.php",
	"EDIT_TEMPLATE" => "include_areas_template.php"
	), false
);?>




<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>