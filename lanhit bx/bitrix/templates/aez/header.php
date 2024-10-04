<?
define ("NEED_AUTH", true);
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

$page = $APPLICATION->GetCurPage(false); ?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">

<head>
  <meta charset="utf-8">
  <title><? $APPLICATION->ShowTitle(); ?></title>
  <? $APPLICATION->ShowHead(); ?>
  <link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/i/logo.ico" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-TL7F7WMKMW"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-TL7F7WMKMW');
  </script>
  <!-- style -->
  <?
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/libs/bootstrap/bootstrap.min.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/libs/swiper/swiper-bundle.min.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/libs/fancybox/fancybox.css');
    $APPLICATION->SetAdditionalCSS('https://unpkg.com/tippy.js@6/animations/scale.css');

    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/common.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/media.css');


    $APPLICATION->AddHeadScript('https://code.jquery.com/jquery-3.7.0.min.js"');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/libs/bootstrap/bootstrap.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/libs/swiper/swiper-bundle.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/libs/fancybox/fancybox.umd.js');
    $APPLICATION->AddHeadScript('https://unpkg.com/@popperjs/core@2');
    $APPLICATION->AddHeadScript('https://unpkg.com/tippy.js@6');

    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/form.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/script.js');
  ?>
  
</head>

<body class="<?$APPLICATION->AddBufferContent('body_class');?>">
<div id="panel"><?$APPLICATION->ShowPanel();?></div>

  <div class="search-panel">
    <div class="container">
    <?$APPLICATION->IncludeComponent("bitrix:search.form","search",Array(
            "USE_SUGGEST" => "N",
            "PAGE" => "#SITE_DIR#search/index.php"
        )
    );?> 


     
    </div>
  </div>
  <header class="header">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-auto col-sm-4 col-xl-auto col-logo">
          <a href="/" class="logo header__logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="53" height="51" viewBox="0 0 53 51" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M36.2464 19.5035C36.2466 19.5031 36.2469 19.5027 36.2471 19.5022C39.13 14.5035 37.4192 8.11164 32.4259 5.22561C27.4326 2.33959 21.0477 4.05228 18.1649 9.05102C17.9655 9.3968 17.788 9.74924 17.6321 10.1067C17.0477 11.3738 16.2126 13.571 16.3753 15.5005C16.4645 16.5583 16.5669 17.8679 16.6611 19.1077C16.852 21.6172 15.5068 23.9913 13.2512 25.1025C12.1014 25.6689 10.8811 26.2633 9.90262 26.7237C8.14946 27.5487 6.66446 29.3756 5.8614 30.5154C5.632 30.8273 5.41752 31.155 5.21956 31.4983C2.3367 36.497 4.04752 42.8889 9.04079 45.7749C14.0338 48.6608 20.4184 46.9484 23.3014 41.9502L23.3019 41.9505C23.3019 41.9505 23.3133 41.9308 23.3342 41.8929C23.6007 41.4242 23.8271 40.9434 24.0143 40.4547C24.5226 39.2238 25.113 37.3816 25.0917 35.5028C25.0802 34.4858 25.0075 33.3336 24.9127 32.2279C24.6742 29.4453 26.1445 26.7585 28.6852 25.6052C29.6983 25.1453 30.726 24.674 31.5644 24.2795C33.3596 23.4347 34.8737 21.5393 35.6622 20.4069C35.8482 20.1492 36.0239 19.8809 36.1888 19.6022C36.2273 19.5386 36.2473 19.504 36.2473 19.504L36.2464 19.5035Z"
                fill="url(#paint0_linear_1_174)" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M46.74 30.1897C48.5147 27.1124 47.4615 23.1775 44.3875 21.4008C41.3136 19.6241 37.3829 20.6785 35.6081 23.7558C35.4845 23.9702 35.3746 24.1888 35.2781 24.4105C34.9184 25.1913 34.407 26.5404 34.5069 27.7254C34.5533 28.2762 34.6152 28.9449 34.6787 29.6074C34.8487 31.3804 33.8858 33.0706 32.2712 33.8191C31.6534 34.1055 31.0299 34.3958 30.5222 34.6347C29.4539 35.1374 28.5474 36.2444 28.0496 36.9474C27.9023 37.1458 27.7649 37.3549 27.6384 37.5741C25.8636 40.6515 26.9169 44.5865 29.9908 46.3632C33.0648 48.1399 36.9955 47.0855 38.7702 44.0081C38.7702 44.0081 38.7702 44.0081 38.7702 44.0081L38.7711 44.0086C38.7711 44.0086 38.7859 43.9829 38.8121 43.9344C38.9621 43.6664 39.0909 43.3921 39.199 43.1135C39.5142 42.3559 39.8862 41.2091 39.8729 40.0393C39.8654 39.3745 39.8414 38.6326 39.8126 37.9364C39.7459 36.3208 40.58 34.7899 42.0152 34.0482C42.645 33.7226 43.3045 33.3903 43.8576 33.13C44.961 32.6108 45.8918 31.4469 46.378 30.7494C46.4931 30.59 46.6019 30.4241 46.7039 30.2516C46.728 30.2117 46.7405 30.19 46.7405 30.19L46.74 30.1897Z"
                fill="url(#paint1_linear_1_174)" />
              <ellipse cx="4.26854" cy="4.27088" rx="4.26854" ry="4.27088"
                transform="matrix(0.865788 0.500411 -0.499589 0.866262 45.6094 37.207)"
                fill="url(#paint2_linear_1_174)" />
              <defs>
                <linearGradient id="paint0_linear_1_174" x1="32.4263" y1="5.22586" x2="9.00245" y2="45.7528"
                  gradientUnits="userSpaceOnUse">
                  <stop stop-color="#B8A4FF" />
                  <stop offset="0.411458" stop-color="#8D71F0" />
                  <stop offset="1" stop-color="#412E83" />
                </linearGradient>
                <linearGradient id="paint1_linear_1_174" x1="44.3876" y1="21.4008" x2="29.9676" y2="46.3497"
                  gradientUnits="userSpaceOnUse">
                  <stop stop-color="#B8A4FF" />
                  <stop offset="0.411458" stop-color="#8D71F0" />
                  <stop offset="1" stop-color="#412E83" />
                </linearGradient>
                <linearGradient id="paint2_linear_1_174" x1="4.26854" y1="0" x2="4.26854" y2="8.54176"
                  gradientUnits="userSpaceOnUse">
                  <stop stop-color="#B8A4FF" />
                  <stop offset="0.411458" stop-color="#8D71F0" />
                  <stop offset="1" stop-color="#412E83" />
                </linearGradient>
              </defs>
            </svg>
            <div class="logo__text">AEZ <span>KIMYA</span></div>
          </a>
        </div>
        <div class="col-auto col-md-12 col-xl-auto col-menu">
          <nav class="nav header__nav">
          <?
              $APPLICATION->IncludeComponent(
              "bitrix:menu", 
              "top", 
              array(
                  "ROOT_MENU_TYPE" => "top",
                  "MAX_LEVEL" => "1",
                  "CHILD_MENU_TYPE" => "left",
                  "USE_EXT" => "N",
                  "DELAY" => "N",
                  "ALLOW_MULTI_SELECT" => "N",
                  "MENU_CACHE_TYPE" => "N",
                  "MENU_CACHE_TIME" => "3600",
                  "MENU_CACHE_USE_GROUPS" => "Y",
                  "MENU_CACHE_GET_VARS" => array(
                  ),
                  "COMPONENT_TEMPLATE" => "top"
              ),
              false
          );?>

          </nav>
        </div>
        <div class="col-auto col-sm-8 col-xl-auto col-right">
          <div class="header__right d-flex align-items-center justify-content-end">
            <div class="header__lang">
              <a href="#" class="lang-item en">EN</a>
            </div>
            <div class="header__search">
              <a href="#" class="btn-search"></a>
            </div>

            <?if ($USER->IsAuthorized()){?>
              <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line", 
	"top", 
	array(
		"HIDE_ON_BASKET_PAGES" => "N",
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"POSITION_FIXED" => "N",
		"POSITION_HORIZONTAL" => "right",
		"POSITION_VERTICAL" => "top",
		"SHOW_AUTHOR" => "N",
		"SHOW_DELAY" => "N",
		"SHOW_EMPTY_VALUES" => "N",
		"SHOW_IMAGE" => "Y",
		"SHOW_NOTAVAIL" => "N",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_PERSONAL_LINK" => "N",
		"SHOW_PRICE" => "Y",
		"SHOW_PRODUCTS" => "N",
		"SHOW_SUMMARY" => "Y",
		"SHOW_TOTAL_PRICE" => "N",
		"COMPONENT_TEMPLATE" => "top",
		"PATH_TO_AUTHORIZE" => "",
		"SHOW_REGISTRATION" => "N",
		"MAX_IMAGE_SIZE" => "70"
	),
	false
);?>
              <!-- <a class="card__link" href="/personal/cart/">

              </a> -->
              <a class="login__link" href="/personal/private/">
                <span class="login__icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                    <path d="M7.1875 6.23047C7.1875 8.60809 9.12238 10.543 11.5 10.543C13.8776 10.543 15.8125 8.60809 15.8125 6.23047C15.8125 3.85284 13.8776 1.91797 11.5 1.91797C9.12238 1.91797 7.1875 3.85284 7.1875 6.23047ZM19.1667 20.1263H20.125V19.168C20.125 15.4698 17.1149 12.4596 13.4167 12.4596H9.58333C5.88417 12.4596 2.875 15.4698 2.875 19.168V20.1263H19.1667Z" fill="white"/>
                  </svg>
                </span>
                <span><?=($USER->GetFullName())?$USER->GetFullName():$USER->GetLogin()?></span>
              </a>
            <?}else{?>
              <button class="btn auth btn-primary" data-bs-toggle="modal" data-bs-target="#modal-login">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                  <g clip-path="url(#clip0_1_208)">
                    <path d="M1.71319 7.3314L15.8531 3.21035C15.9302 3.18788 16.0145 3.18824 16.0963 3.21141C16.1781 3.23457 16.2542 3.2796 16.316 3.34141C16.3778 3.40321 16.4228 3.47932 16.446 3.56112C16.4691 3.64292 16.4695 3.72714 16.447 3.80425L12.3254 17.9448C12.3022 18.0239 12.2559 18.0922 12.1921 18.1416C12.1282 18.191 12.0494 18.2193 11.9651 18.2232C11.8808 18.2272 11.7946 18.2065 11.7166 18.1637C11.6386 18.121 11.5723 18.0579 11.5254 17.982L8.62607 13.2738C8.57918 13.1976 8.55394 13.1118 8.55337 13.0266C8.5528 12.9415 8.57692 12.8606 8.62285 12.7937L11.955 7.94267C11.9749 7.9138 11.9867 7.87961 11.9894 7.84322C11.992 7.80682 11.9854 7.76936 11.9702 7.73422L11.9411 7.68379C11.9099 7.64142 11.8663 7.60938 11.8174 7.59288C11.7685 7.57638 11.7172 7.57638 11.6719 7.59289L11.628 7.6156L6.75035 10.9664C6.68345 11.0121 6.60265 11.0361 6.51762 11.0354C6.43259 11.0347 6.34691 11.0094 6.27083 10.9626L1.67601 8.13264C1.59994 8.08588 1.53666 8.01953 1.49372 7.94153C1.45078 7.86352 1.43 7.77715 1.43386 7.69272C1.43772 7.6083 1.46605 7.5294 1.51548 7.46543C1.5649 7.40147 1.63334 7.35514 1.7126 7.33199L1.71319 7.3314Z" fill="white"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_1_208">
                      <rect width="20" height="20" fill="white" transform="translate(0 0.5)"/>
                    </clipPath>
                  </defs>
                </svg>
                Sing In
              </button>
            <?}?>
            <button class="btn header__burger js-show-menu" data-type="menu">
              <span></span><span></span><span></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="main">
    <?if($page != "/"){?>

    <div class="breadcrumbs">
      <div class="container">
        <? $APPLICATION->IncludeComponent(
          "bitrix:breadcrumb",
          "main",
          array(
            "START_FROM" => "0",
            "PATH" => "",
            "SITE_ID" => "s1"
          )
        ); ?>
      </div>
		</div>
  <?}?>