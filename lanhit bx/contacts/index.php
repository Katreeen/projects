<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Contacts");
$APPLICATION->SetPageProperty('body_class', 'top-bg');
CModule::IncludeModule("iblock");

$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "DETAIL_PICTURE", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>14, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID"=>1995);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
  //print_r($arFields);
 $arProps = $ob->GetProperties();
 //print_r($arProps["GALLERY_BRENDS"]);
}
?>
<div class="block-decor block-decor--second" style="background: url(<?= SITE_TEMPLATE_PATH ?>/i/BG-contacts.png);">
  <div class="container">
    <h1 class="title-decor capitalize contacts-title"><?=$arFields['~NAME'] ?></h1>
    <div class="block-decor__desc">
    <?=$arFields['~PREVIEW_TEXT']?>
		</div>
    <div class="row contacts__places">
        <?if($arProps["PHONE"]["VALUE"] != ''){?>
          <div class="col-lg-3">
            <div class="contacts__place">
                <div class="contacts__name"><?=$arProps["PHONE"]["NAME"]?>:</div>
                <div class="contacts__item">
                    <div class="link-decor link-decor--row link-decor--phone"><a class="link-decor__item" href="tel:<?preg_match("/[\D]/",$arProps["PHONE"]["VALUE"])?>"><?=$arProps["PHONE"]["VALUE"]?></a></div>
                </div>
            </div>
          </div>
        <?}?>
        <?if($arProps["EMAIL"]["VALUE"] != ''){?>
          <div class="col-lg-3">
            <div class="contacts__place">
                <div class="contacts__name"><?=$arProps["EMAIL"]["NAME"]?>:</div>
                <div class="contacts__item">
                    <div class="link-decor link-decor--row link-decor--phone"><a class="link-decor__item" href="mailto:<?=$arProps["EMAIL"]["VALUE"]?>"><?=$arProps["EMAIL"]["VALUE"]?></a></div>
                </div>
            </div>
          </div>
        <?}?>
        <?if($arProps["SALES"]["VALUE"] != ''){?>
          <div class="col-lg-3">
            <div class="contacts__place">
                <div class="contacts__name"><?=$arProps["SALES"]["NAME"]?>:</div>
                <div class="contacts__item">
                    <div class="link-decor link-decor--row link-decor--phone"><a class="link-decor__item" href="mailto:<?=$arProps["SALES"]["VALUE"]?>"><?=$arProps["SALES"]["VALUE"]?></a></div>
                </div>
            </div>
          </div>
        <?}?>
        <?if($arProps["SALES"]["VALUE"] != ''){?>
          <div class="col-lg-3">
            <div class="contacts__place">
                <div class="contacts__name"><?=$arProps["OFFICE"]["NAME"]?>:</div>
                <div class="contacts__item">
                    <div class="link-decor link-decor--row link-decor--phone"><span class="link-decor__item"><?=$arProps["OFFICE"]["VALUE"]?></span></div>
                </div>
            </div>
          </div>
        <?}?>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="contacts__place contacts__socials contacts__place-bg">
          <div class="contacts__place-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
              <g clip-path="url(#clip0_158_1593)">
                <path d="M35.625 5.2512C35.1952 4.97316 34.7037 4.80494 34.1937 4.76135C33.6837 4.71776 33.1707 4.80012 32.7 5.0012L17.275 11.0762C16.9098 11.2248 16.5193 11.3012 16.125 11.3012H6.25C5.4212 11.3012 4.62634 11.6304 4.04029 12.2165C3.45424 12.8025 3.125 13.5974 3.125 14.4262V14.6762H0V22.1762H3.125V22.5012C3.14458 23.3169 3.48245 24.0927 4.06639 24.6626C4.65033 25.2325 5.43403 25.5514 6.25 25.5512L10 33.5012C10.2539 34.0366 10.6537 34.4894 11.1534 34.8078C11.6531 35.1262 12.2325 35.2972 12.825 35.3012H14.4C15.2245 35.2946 16.0129 34.9625 16.5936 34.3771C17.1742 33.7918 17.5 33.0007 17.5 32.1762V25.8512L32.7 31.9262C33.0739 32.075 33.4726 32.1513 33.875 32.1512C34.4993 32.1411 35.1072 31.9501 35.625 31.6012C36.0362 31.3236 36.3754 30.952 36.6145 30.5173C36.8536 30.0826 36.9857 29.5971 37 29.1012V7.8262C36.9977 7.31749 36.8713 6.81703 36.6316 6.36829C36.392 5.91954 36.0465 5.53608 35.625 5.2512ZM14.375 14.4262V22.5012H6.25V14.4262H14.375ZM14.375 32.1762H12.8L9.725 25.5512H14.375V32.1762ZM37.075 15.3012V21.5512C37.9038 21.5512 38.6987 21.222 39.2847 20.6359C39.8708 20.0499 40.2 19.255 40.2 18.4262C40.2 17.5974 39.8708 16.8025 39.2847 16.2165C38.6987 15.6304 37.9038 15.3012 37.075 15.3012Z" fill="white"/>
              </g>
              <defs>
                <clipPath id="clip0_158_1593">
                  <rect width="40" height="40" fill="white"/>
                </clipPath>
              </defs>
            </svg>
          </div>
          <div class="contacts__place-title">Social Media</div>
          <div class="contacts__place-text">Join Us</div>
          <div class="socials">
            <a href="https://www.linkedin.com/company/aezchem" class="socials-link" target="_blank" rel="nofollow">
              <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2464 14.7203H19.494V16.8361C20.1059 15.6192 21.675 14.5259 24.0321 14.5259C28.5508 14.5259 29.6235 16.9482 29.6235 21.3925V29.6235H25.0488V22.4046C25.0488 19.8737 24.437 18.4464 22.8793 18.4464C20.7189 18.4464 19.8211 19.9846 19.8211 22.4035V29.6235H15.2464V14.7203ZM7.4019 29.4291H11.9766V14.5259H7.4019V29.4291ZM12.6319 9.66638C12.6321 10.0498 12.5561 10.4295 12.4082 10.7833C12.2604 11.1371 12.0437 11.458 11.7707 11.7273C11.2177 12.277 10.469 12.5846 9.68925 12.5828C8.91085 12.5822 8.16394 12.2753 7.61005 11.7284C7.33809 11.4582 7.12214 11.1369 6.97455 10.7831C6.82697 10.4293 6.75066 10.0498 6.75 9.66638C6.75 8.89211 7.05879 8.151 7.61119 7.60433C8.1646 7.05669 8.91182 6.74966 9.69039 6.75C10.4704 6.75 11.2183 7.05765 11.7707 7.60433C12.322 8.151 12.6319 8.89211 12.6319 9.66638Z" fill="url(#paint0_linear_158_1580)"/>
                <defs>
                  <linearGradient id="paint0_linear_158_1580" x1="18.1868" y1="6.75" x2="18.1868" y2="29.6235" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#9679FC"/>
                    <stop offset="1" stop-color="#7658E0"/>
                  </linearGradient>
                </defs>
              </svg>

            </a>
            <a href="https://www.facebook.com/aezkimya" class="socials-link" target="_blank" rel="nofollow">
              <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                <path d="M17.9997 13.3159C15.4192 13.3159 13.3134 15.4218 13.3134 18.0022C13.3134 20.5827 15.4192 22.6885 17.9997 22.6885C20.5801 22.6885 22.686 20.5827 22.686 18.0022C22.686 15.4218 20.5801 13.3159 17.9997 13.3159ZM32.0551 18.0022C32.0551 16.0616 32.0727 14.1385 31.9637 12.2014C31.8548 9.95144 31.3415 7.95456 29.6962 6.30925C28.0473 4.66042 26.054 4.15066 23.804 4.04167C21.8633 3.93269 19.9403 3.95026 18.0032 3.95026C16.0626 3.95026 14.1395 3.93269 12.2024 4.04167C9.95241 4.15066 7.95554 4.66394 6.31023 6.30925C4.6614 7.95808 4.15163 9.95144 4.04265 12.2014C3.93366 14.1421 3.95124 16.0651 3.95124 18.0022C3.95124 19.9393 3.93366 21.8659 4.04265 23.803C4.15163 26.053 4.66491 28.0499 6.31023 29.6952C7.95905 31.344 9.95241 31.8538 12.2024 31.9628C14.143 32.0718 16.0661 32.0542 18.0032 32.0542C19.9438 32.0542 21.8669 32.0718 23.804 31.9628C26.054 31.8538 28.0509 31.3405 29.6962 29.6952C31.345 28.0464 31.8548 26.053 31.9637 23.803C32.0762 21.8659 32.0551 19.9428 32.0551 18.0022ZM17.9997 25.2128C14.0094 25.2128 10.7891 21.9925 10.7891 18.0022C10.7891 14.012 14.0094 10.7917 17.9997 10.7917C21.9899 10.7917 25.2102 14.012 25.2102 18.0022C25.2102 21.9925 21.9899 25.2128 17.9997 25.2128ZM25.5055 12.1803C24.5739 12.1803 23.8216 11.428 23.8216 10.4964C23.8216 9.56472 24.5739 8.81237 25.5055 8.81237C26.4372 8.81237 27.1895 9.56472 27.1895 10.4964C27.1898 10.7176 27.1464 10.9367 27.0619 11.1411C26.9774 11.3456 26.8533 11.5313 26.6969 11.6877C26.5405 11.8442 26.3547 11.9682 26.1503 12.0527C25.9459 12.1373 25.7268 12.1806 25.5055 12.1803Z" fill="url(#paint0_linear_158_1574)"/>
                <defs>
                  <linearGradient id="paint0_linear_158_1574" x1="18.0035" y1="3.94922" x2="18.0035" y2="32.0552" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#9679FC"/>
                    <stop offset="1" stop-color="#7658E0"/>
                  </linearGradient>
                </defs>
              </svg>

            </a>
            <a href="https://www.instagram.com/aez.com.tr" class="socials-link" target="_blank" rel="nofollow">
              <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.375 18.0817C3.375 25.3527 8.65584 31.3989 15.5625 32.625V22.0621H11.9062V18H15.5625V14.7496C15.5625 11.0933 17.9183 9.06291 21.2504 9.06291C22.3058 9.06291 23.4442 9.225 24.4996 9.38709V13.125H22.6313C20.8433 13.125 20.4375 14.0183 20.4375 15.1567V18H24.3375L23.6879 22.0621H20.4375V32.625C27.3442 31.3989 32.625 25.3539 32.625 18.0817C32.625 9.99281 26.0438 3.375 18 3.375C9.95625 3.375 3.375 9.99281 3.375 18.0817Z" fill="url(#paint0_linear_158_1576)"/>
                <defs>
                  <linearGradient id="paint0_linear_158_1576" x1="18" y1="3.375" x2="18" y2="32.625" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#9679FC"/>
                    <stop offset="1" stop-color="#7658E0"/>
                  </linearGradient>
                </defs>
              </svg>

            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="contacts__place contacts__requesites contacts__place-bg">
          <div class="contacts__place-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none">
              <path d="M14.3003 11.3106L14.4776 11.4868L14.3003 11.3106C14.0392 11.5733 13.8929 11.9292 13.8929 12.3C13.8929 12.6708 14.0392 13.0267 14.3003 13.2894L14.4776 13.1132L14.3003 13.2894C14.5614 13.5521 14.9158 13.7 15.2857 13.7H35.8571C36.2271 13.7 36.5815 13.5521 36.8426 13.2894C37.1036 13.0267 37.25 12.6708 37.25 12.3C37.25 11.9292 37.1036 11.5733 36.8426 11.3106C36.5815 11.0479 36.2271 10.9 35.8571 10.9H15.2857C14.9158 10.9 14.5614 11.0479 14.3003 11.3106ZM14.3003 29.7106C14.0392 29.9733 13.8929 30.3292 13.8929 30.7C13.8929 31.0708 14.0392 31.4267 14.3003 31.6894C14.5614 31.9521 14.9158 32.1 15.2857 32.1H35.8571C36.2271 32.1 36.5815 31.9521 36.8426 31.6894C37.1036 31.4267 37.25 31.0708 37.25 30.7C37.25 30.3292 37.1036 29.9733 36.8426 29.7106C36.5815 29.4479 36.2271 29.3 35.8571 29.3H15.2857C14.9158 29.3 14.5614 29.4479 14.3003 29.7106ZM14.3003 20.5106C14.0392 20.7733 13.8929 21.1292 13.8929 21.5C13.8929 21.8708 14.0392 22.2267 14.3003 22.4894C14.5614 22.7521 14.9158 22.9 15.2857 22.9H35.8571C36.2271 22.9 36.5815 22.7521 36.8426 22.4894C37.1036 22.2267 37.25 21.8708 37.25 21.5C37.25 21.1292 37.1036 20.7733 36.8426 20.5106C36.5815 20.2479 36.2271 20.1 35.8571 20.1H15.2857C14.9158 20.1 14.5614 20.2479 14.3003 20.5106ZM7.28571 14.85C7.95873 14.85 8.60387 14.581 9.07929 14.1026C9.55465 13.6242 9.82143 12.9758 9.82143 12.3C9.82143 11.6242 9.55465 10.9758 9.07929 10.4974C8.60387 10.019 7.95873 9.75 7.28571 9.75C6.6127 9.75 5.96756 10.019 5.49214 10.4974C5.01678 10.9758 4.75 11.6242 4.75 12.3C4.75 12.9758 5.01678 13.6242 5.49214 14.1026C5.96756 14.581 6.6127 14.85 7.28571 14.85ZM7.28571 24.05C7.95873 24.05 8.60387 23.781 9.07929 23.3026C9.55465 22.8242 9.82143 22.1758 9.82143 21.5C9.82143 20.8242 9.55465 20.1758 9.07929 19.6974C8.60387 19.219 7.95873 18.95 7.28571 18.95C6.6127 18.95 5.96756 19.219 5.49214 19.6974C5.01678 20.1758 4.75 20.8242 4.75 21.5C4.75 22.1758 5.01678 22.8242 5.49214 23.3026C5.96756 23.781 6.6127 24.05 7.28571 24.05ZM7.28571 33.25C7.95873 33.25 8.60387 32.981 9.07929 32.5026C9.55465 32.0242 9.82143 31.3758 9.82143 30.7C9.82143 30.0242 9.55465 29.3758 9.07929 28.8974C8.60387 28.419 7.95873 28.15 7.28571 28.15C6.6127 28.15 5.96756 28.419 5.49214 28.8974C5.01678 29.3758 4.75 30.0242 4.75 30.7C4.75 31.3758 5.01678 32.0242 5.49214 32.5026C5.96756 32.981 6.6127 33.25 7.28571 33.25Z" fill="white" stroke="white" stroke-width="0.5"/>
            </svg>
          </div>
          <div class="contacts__place-title">Requisites</div>
          <div class="contacts__place-text">For transfers</div>
          <a href="#" class="btn btn-primary contacts__place-btn" data-bs-toggle="modal" data-bs-target="#modal-requisites">Show Requisites </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="contacts__place contacts__career contacts__place-bg">
          <div class="contacts__place-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
              <path d="M18.3337 29.3333V27.5H5.51866L5.50033 34.8333C5.50033 36.8683 7.13199 38.5 9.16699 38.5H34.8337C36.8687 38.5 38.5003 36.8683 38.5003 34.8333V27.5H25.667V29.3333H18.3337ZM36.667 12.8333H29.3153V9.16667L25.6487 5.5H18.3153L14.6487 9.16667V12.8333H7.33366C5.31699 12.8333 3.66699 14.4833 3.66699 16.5V22C3.66699 24.035 5.29866 25.6667 7.33366 25.6667H18.3337V22H25.667V25.6667H36.667C38.6837 25.6667 40.3337 24.0167 40.3337 22V16.5C40.3337 14.4833 38.6837 12.8333 36.667 12.8333ZM25.667 12.8333H18.3337V9.16667H25.667V12.8333Z" fill="white"/>
            </svg>
          </div>
          <div class="contacts__place-title">Career</div>
          <div class="contacts__place-text">Under Constructions</div>
          <a href="#" class="btn btn-primary contacts__place-btn">Show</a>
        </div>
      </div>
    </div>
    <div class="feedback question-form">
      <?
      $APPLICATION->IncludeComponent("bitrix:form.result.new","question",Array( 
        "SEF_MODE" => "N", 
        "WEB_FORM_ID" => "1", 
        "LIST_URL" => "", 
        "EDIT_URL" => "", 
        "SUCCESS_URL" => "", 
        "CHAIN_ITEM_TEXT" => "", 
        "CHAIN_ITEM_LINK" => "", 
        "IGNORE_CUSTOM_TEMPLATE" => "N", 
        "USE_EXTENDED_ERRORS" => "N", 
        "CACHE_TYPE" => "A", 
        "CACHE_TIME" => "3600", 
        "SEF_FOLDER" => "/", 
        "VARIABLE_ALIASES" => Array( 
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        ), 
        "AJAX_MODE" => "Y", // режим AJAX 
        "AJAX_OPTION_SHADOW" => "N", // затемнять область 
        "AJAX_OPTION_JUMP" => "Y", // скроллить страницу до компонента 
        "AJAX_OPTION_STYLE" => "Y", // подключать стили 
        "AJAX_OPTION_HISTORY" => "N", 
        
        ) 
        );
        ?>
    </div>
  </div>
</div>


<div class="modal fade" id="modal-requisites" tabindex="-1" aria-labelledby="requisitesModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="authModalLabel">Requisites</div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-subtitle -center">AEZ KİMYA SANAYi VE DIS TİCARET LTD. ŞTİ.</div>
        <p><b>Adres:</b> Yakuplu Mah. Dereboyu Cad. 23/1 Beylikdüzü / İSTANBUL TURKIYE</p>
        <p><b>Vergi Dairesi:</b> Beylikdüzü Vergi Dairesi</p>
        <p><b>Vergi Numarası:</b> 0081752828 </p>
        <p><b>Banka:</b> Garanti BBVA</p>
        <p><b>İban:</b> TR37 0006 2001 1510 0006 2929 95</p>
      </div>
    </div>
  </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>