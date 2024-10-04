<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

  </main>
  <footer class="footer white-text">
    <div class="container">
      <div class="footer__top">
        <div class="row">
          <div class="col-md-4">
            <div class="footer__phone ">
            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . "/inc/phone.php",
                "EDIT_TEMPLATE" => "include_areas_template.php"
                ), false
              );?>
              
            </div>
          </div>
          <div class="col-md-4">
            <div class="footer__address">
              <?/*
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                <path d="M12 14.1875C11.2583 14.1875 10.5333 13.9676 9.91661 13.5555C9.29993 13.1435 8.81928 12.5578 8.53545 11.8726C8.25162 11.1873 8.17736 10.4333 8.32206 9.70591C8.46675 8.97848 8.8239 8.3103 9.34835 7.78585C9.8728 7.2614 10.541 6.90425 11.2684 6.75956C11.9958 6.61486 12.7498 6.68912 13.4351 6.97295C14.1203 7.25678 14.706 7.73743 15.118 8.35411C15.5301 8.9708 15.75 9.69582 15.75 10.4375C15.7488 11.4317 15.3533 12.3848 14.6503 13.0878C13.9473 13.7908 12.9942 14.1863 12 14.1875ZM12 8.1875C11.555 8.1875 11.12 8.31946 10.75 8.5667C10.38 8.81393 10.0916 9.16533 9.92127 9.57646C9.75098 9.9876 9.70642 10.44 9.79323 10.8765C9.88005 11.3129 10.0943 11.7138 10.409 12.0285C10.7237 12.3432 11.1246 12.5575 11.561 12.6443C11.9975 12.7311 12.4499 12.6865 12.861 12.5162C13.2722 12.3459 13.6236 12.0575 13.8708 11.6875C14.118 11.3175 14.25 10.8825 14.25 10.4375C14.2494 9.84095 14.0122 9.269 13.5903 8.84717C13.1685 8.42534 12.5966 8.1881 12 8.1875Z" fill="white"/>
                <path d="M12 23.1875L5.67301 15.7257C5.58509 15.6137 5.49809 15.501 5.41201 15.3875C4.33124 13.9638 3.74739 12.2249 3.75001 10.4375C3.75001 8.24946 4.6192 6.15104 6.16638 4.60387C7.71355 3.05669 9.81197 2.1875 12 2.1875C14.188 2.1875 16.2865 3.05669 17.8336 4.60387C19.3808 6.15104 20.25 8.24946 20.25 10.4375C20.2526 12.2241 19.669 13.9622 18.5888 15.3853L18.588 15.3875C18.588 15.3875 18.363 15.683 18.3293 15.7228L12 23.1875ZM6.60901 14.4838C6.61051 14.4838 6.78451 14.7147 6.82426 14.7642L12 20.8685L17.1825 14.756C17.2155 14.7147 17.391 14.4823 17.3918 14.4815C18.2746 13.3183 18.7517 11.8978 18.75 10.4375C18.75 8.64729 18.0388 6.9304 16.773 5.66453C15.5071 4.39866 13.7902 3.6875 12 3.6875C10.2098 3.6875 8.49291 4.39866 7.22704 5.66453C5.96117 6.9304 5.25001 8.64729 5.25001 10.4375C5.24844 11.8987 5.72609 13.3201 6.60976 14.4838H6.60901Z" fill="white"/>
              </svg>
              <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . "/inc/address.php",
                "EDIT_TEMPLATE" => "include_areas_template.php"
                ), false
              );?>
              */?>
            </div>
          </div>
          <div class="col-md-4">
            <div class="footer__email">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M5.25 4H18.75C19.5801 3.99995 20.3788 4.31755 20.9822 4.88767C21.5856 5.45779 21.948 6.23719 21.995 7.066L22 7.25V16.75C22.0001 17.5801 21.6824 18.3788 21.1123 18.9822C20.5422 19.5856 19.7628 19.948 18.934 19.995L18.75 20H5.25C4.41986 20.0001 3.62117 19.6824 3.01777 19.1123C2.41437 18.5422 2.052 17.7628 2.005 16.934L2 16.75V7.25C1.99995 6.41986 2.31755 5.62117 2.88767 5.01777C3.45779 4.41437 4.23719 4.052 5.066 4.005L5.25 4H18.75H5.25ZM20.5 9.373L12.35 13.663C12.258 13.7116 12.1568 13.7405 12.053 13.7479C11.9492 13.7553 11.845 13.7411 11.747 13.706L11.651 13.664L3.5 9.374V16.75C3.50002 17.1892 3.66517 17.6123 3.96268 17.9354C4.26019 18.2585 4.6683 18.4579 5.106 18.494L5.25 18.5H18.75C19.1893 18.5 19.6126 18.3347 19.9357 18.037C20.2588 17.7392 20.4581 17.3309 20.494 16.893L20.5 16.75V9.373ZM18.75 5.5H5.25C4.81081 5.50002 4.38768 5.66517 4.06461 5.96268C3.74154 6.26019 3.54214 6.6683 3.506 7.106L3.5 7.25V7.679L12 12.152L20.5 7.678V7.25C20.5 6.81065 20.3347 6.38739 20.037 6.06429C19.7392 5.74119 19.3309 5.5419 18.893 5.506L18.75 5.5Z" fill="white"/>
              </svg>
              <?$APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_TEMPLATE_PATH . "/inc/email.php",
                "EDIT_TEMPLATE" => "include_areas_template.php"
                ), false
              );?>
              
            </div>
          </div>
        </div>
      </div>
      <div class="footer__bottom">
        <div class="row">
          <div class="col-6 col-lg col-logo">
            <div class="logo footer__logo">
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
            </div>
          </div>
          <div class="col-lg-8 col-menu">
            <nav class="footer__nav">
            <?
          $APPLICATION->IncludeComponent(
          "bitrix:menu", 
          "bottom", 
          array(
              "ROOT_MENU_TYPE" => "bottom",
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
              "COMPONENT_TEMPLATE" => "bottom"
          ),
          false
      );?>

          </div>
          <div class="col-6 col-lg col-social">
            <div class="social footer__social">
              <!-- <a href="#" class="social-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect x="3.71742" y="3.72328" width="16.56" height="16.56" rx="3.96" stroke="white" stroke-width="0.72"/>
                  <circle cx="11.9975" cy="11.9994" r="3.62769" stroke="white" stroke-width="0.72"/>
                  <circle cx="16.9813" cy="7.01645" r="0.636923" fill="white" stroke="white" stroke-width="0.72"/>
                </svg>
              </a>
              <a href="#" class="social-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <rect x="3.71742" y="3.72328" width="16.56" height="16.56" rx="3.96" stroke="white" stroke-width="0.72"/>
                  <circle cx="11.9975" cy="11.9994" r="3.62769" stroke="white" stroke-width="0.72"/>
                  <circle cx="16.9813" cy="7.01645" r="0.636923" fill="white" stroke="white" stroke-width="0.72"/>
                </svg>
              </a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="mobile-modal" data-type="menu">
    <div class="mobile-modal__bg js-menu-close"></div>
    <div class="mobile-modal__inner">
      <button class="mobile-modal__close js-menu-close"></button>
      <nav class="nav mobile__nav">
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
      <div class="mobile__lang">
        <a href="#" class="lang-item en">EN</a>
      </div>
      <?if ($USER->IsAuthorized()){?>
        <a class="login__link" href="/personal/private/">
          <span class="login__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
              <path d="M7.1875 6.23047C7.1875 8.60809 9.12238 10.543 11.5 10.543C13.8776 10.543 15.8125 8.60809 15.8125 6.23047C15.8125 3.85284 13.8776 1.91797 11.5 1.91797C9.12238 1.91797 7.1875 3.85284 7.1875 6.23047ZM19.1667 20.1263H20.125V19.168C20.125 15.4698 17.1149 12.4596 13.4167 12.4596H9.58333C5.88417 12.4596 2.875 15.4698 2.875 19.168V20.1263H19.1667Z" fill="white"/>
            </svg>
          </span>
          <span><?=($USER->GetFullName())?$USER->GetFullName():$USER->GetLogin()?></span>
        </a>
      <?}else{?>
        <a href="#" class="btn auth btn-primary">
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
        </a>
      <?}?>
    </div>
  </div>

<!--modal-login-->
<div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="authModalLabel">Log In</div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?$APPLICATION->IncludeComponent(
          "bitrix:system.auth.form",
          "default",
          Array(
              "REGISTER_URL" => "",
              "FORGOT_PASSWORD_URL" => "",
              "PROFILE_URL" => "/personal/profile/",
              "SHOW_ERRORS" => "Y",
  
          )
      );?>
      </div>
    </div>
  </div>
</div>
<!--//modal-login-->

<!--modal-register-->
<div class="modal fade" id="modal-register" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="registerModalLabel">Registration</div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?$APPLICATION->IncludeComponent(
          "bitrix:main.register",
          "default",
          Array(
              "SHOW_FIELDS" => array("EMAIL","NAME","LAST_NAME","PERSONAL_PHONE","PERSONAL_COUNTRY", "WORK_COMPANY"),
              "REQUIRED_FIELDS" => array("EMAIL","NAME","LAST_NAME"),
              "AUTH" => "Y",
              "USE_BACKURL" => "Y",
              "SUCCESS_PAGE" => "",
              "SET_TITLE" => "N",
              "USER_PROPERTY" => array(),
              "USER_PROPERTY_NAME" => ""
          )
      );?>
      </div>
    </div>
  </div>
</div>
<!--//modal-register-->

<!--modal-forgot-password-->
<div class="modal fade" id="modal-forgot-password" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="forgotModalLabel">Password Recovery</div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?$APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd","default",Array());?>
      </div>
    </div>
  </div>
</div>
<!--//modal-forgot-password-->


<div class="modal fade" id="success" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal__icon"><img src="<?=SITE_TEMPLATE_PATH?>/i/ok.svg" alt="modal-icon"></div>
        <div class="modal__title title title--second">Your request is accepted!</div>
        <div class="modal__text">
          We will contact you shortly to clarify the details of the request.<br>
          Notification of acceptance of the request will be sent to your email
        </div>
        <a class="button" href="/">Home</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="error" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal__icon"><img src="<?=SITE_TEMPLATE_PATH?>/i/error.svg" alt="modal-icon"></div>
        <div class="modal__title title title--second">Error!</div>
        <div class="modal__text">
          
        </div>
        <a class="button" href="/">Home</a>
      </div>
    </div>
  </div>
</div>






  <div class="cookies white-text" id="cookies">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="cookies__text">This website uses cookies. By continuing to browse this website, you agree to the use of cookies.</div>
        </div>
        <div class="col-lg-3">
          <div class="cookies__btn">
            <button class="btn btn-secondary btn-agree" id="cookie_close">agree</button>
            <a href="/policy/" class="btn btn-policy">privacy policy</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>