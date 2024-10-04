<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("About");
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "DETAIL_PICTURE", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>15, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>1996);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
  //print_r($arFields);
 $arProps = $ob->GetProperties();
 //print_r($arProps["GALLERY_BRENDS"]);
}

?>
<div class="container">
  <div class="page-content page-offset">
    <h1 class="title offset-lg-1 max-width-900"><?$APPLICATION->ShowTitle(false)?></h1>

    <div class="anons-text offset-lg-1 max-width-900"><?=$arFields['~PREVIEW_TEXT']?></div>
    <?
    $img = CFile::ResizeImageGet($arFields['DETAIL_PICTURE'], array('width'=>1220, 'height'=>520), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
    <div class="detail-picture"><img src="<?=$img['src']?>" alt="<?=$arFields['NAME']?>"></div>
  <div class="offset-lg-1 max-width-900">
  <?=$arFields['~DETAIL_TEXT']?>

  







  </div>
  </div>
</div>



 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>