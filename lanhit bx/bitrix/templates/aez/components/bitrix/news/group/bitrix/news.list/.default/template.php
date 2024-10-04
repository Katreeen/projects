<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>

<section class="table-elements">
<div class="home-table" id="table">
		<div class="container">
		<div class="table-elements__top">
			<h1 class="table-elements__title">Our products</h1>
			<div class="table-elements__descr">Select the element from the periodic table that is part of the compound you need.</div>
		</div>
			
      <?
        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "DETAIL_PAGE_URL", "PROPERTY_SYMBOL", "PROPERTY_NUMBER", "PREVIEW_PICTURE", "PROPERTY_HIDE_IN_TABLE", "PROPERTY_ELEMENTS");
        $arFilter = Array("IBLOCK_ID"=>6, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>999), $arSelect);
        while($ob = $res->GetNextElement())
        {
        $arFields[] = $ob->GetFields();
        }
      ?>

      <?
      $products = [];
      foreach($arFields as $item){
        $key = $item["PROPERTY_NUMBER_VALUE"];
        $products[$key] = $item;
      }?>


			<div class="product-table">
				<div class="product-table__grid">
        <?
        $j = 0;
        for ($i = 1; $i <= 154; $i++) {
          if ($i > 1 && $i < 18 || $i > 20 && $i < 31 || $i > 38 && $i < 49) { ?>
            <div class="product-table__item product-table__item--nothing">
              <div class="product-table__text"></div>
            </div>
          <?}else{
            $j++;
            if ($j > 57 && $j < 72 || $j > 89 && $j < 104) continue;
            if(array_key_exists($j, $products)){?>
              
              <?if($products[$j]['PROPERTY_HIDE_IN_TABLE_VALUE'] == "да"){?>
                <div class="product-table__item">
                  <div class="product-table__text"><?=$products[$j]["PROPERTY_SYMBOL_VALUE"]?></div>
                </div>
              <?}else{?>
                <a class="product-table__item product-table__item--alkaline js-tooltip" href="<?=$products[$j]["DETAIL_PAGE_URL"]?>" data-template="<?=$products[$j]["PROPERTY_SYMBOL_VALUE"]?>">
                  <div class="product-table__text"><?=$products[$j]["PROPERTY_SYMBOL_VALUE"]?></div>
                </a>
              <?}?>
            <?}else{?>
              <div class="product-table__item">
                <div class="product-table__text"><?=$j?></div>
              </div>
            <?}?>
          <?}?>
        <?}?>
        </div>
        <div class="product-table__grid">
          <div class="product-table__item product-table__item--tranparent">
						<div class="product-table__text"></div>
					</div>
          <div class="product-table__item product-table__item--tranparent">
						<div class="product-table__text"></div>
					</div>
          <div class="product-table__item product-table__item--tranparent">
						<div class="product-table__text"></div>
					</div>
          <?
          for ($l = 57; $l <= 103; $l++) {
            if ($l > 71 && $l < 89) continue;
            
            if($l == 89){?>
              <div class="product-table__item product-table__item--tranparent">
                <div class="product-table__text"></div>
              </div>
              <div class="product-table__item product-table__item--tranparent">
                <div class="product-table__text"></div>
              </div>
              <div class="product-table__item product-table__item--tranparent">
                <div class="product-table__text"></div>
              </div>
            <?}

            if(array_key_exists($l, $products)){?>
              <?if($products[$l]['PROPERTY_HIDE_IN_TABLE_VALUE'] != "да"){?>
                <a class="product-table__item product-table__item--alkaline js-tooltip" href="<?=$products[$l]["DETAIL_PAGE_URL"]?>" data-template="<?=$products[$l]["PROPERTY_SYMBOL_VALUE"]?>">
                  <div class="product-table__text"><?=$products[$l]["PROPERTY_SYMBOL_VALUE"]?></div>
                </a>
              <?}else{?>
                <div class="product-table__item">
                  <div class="product-table__text"><?=$products[$l]["PROPERTY_SYMBOL_VALUE"]?></div>
                </div>
              <?}?>
            <?}else{?>
              

                <div class="product-table__item">
                  <div class="product-table__text"><?=$l?></div>
                </div>
            <?}
          }?>
        </div>

      </div>
			<div class="product-table__tooltips">
				<?foreach($products as $product){
					$img = CFile::ResizeImageGet($product['PREVIEW_PICTURE'], array('width'=>193, 'height'=>145), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
					
					<div class="product-table__tooltip" id="<?=$product["PROPERTY_SYMBOL_VALUE"]?>">
						<div class="product-table__tooltip-img"><img src="<?=$img['src']?>" alt="<?=$product["NAME"]?>"></div>
						<div class="product-table__tooltip-text">
							<?=$product["~PREVIEW_TEXT"]?>
						</div>
					</div>
				<?}?>

				</div>
			</div>

			<div class="product-list">
				<div class="search-form">
					<form class="search-form d-flex" role="search">
						<input type="search" placeholder="Search..." aria-label="Search">
						<button class="btn btn-secondary" type="submit">Search</button>
					</form>
				</div>

				<div class="product-list__wrap product-list__wrap--open">
					<!-- <div class="product-list__btn">Показать элементы</div> -->
					<div class="product-list__items">
		
					<?
					foreach ($products as $product) {
						if ($product['PROPERTY_ELEMENTS_VALUE'] != '') {
							$arMassiv = array();
							$dbRes = CIBlockElement::GetProperty(6, $product['ID'], array("sort" => "desc"), array("CODE" => "ELEMENTS"));
							while ($arTmp = $dbRes->Fetch()) {
								$arMassiv[] = $arTmp['VALUE'];
							}

						?>

						<a class="product-list__item" href="<?= $product['DETAIL_PAGE_URL'] ?>"><span>(<?= $product['PROPERTY_SYMBOL_VALUE'] ?>) <?= $product['NAME'] ?></span><span>(<? echo count($arMassiv) ?> products available)</span></a>

						<? }
						} ?>

						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>