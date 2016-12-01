<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));

use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>favicon.ico" />

	<?$APPLICATION->ShowHead();
//---------------------------------JS--------------------------------------------------------
    Asset::getInstance()->addJs("//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/bx/jquery.bxslider.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.pack.js");

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/main.js");
//--------------------------------CSS-----------------------------------------------
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/bx/jquery.bxslider.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/colors.css");
    Asset::getInstance()->addCss("/bitrix/css/main/font-awesome.css");
    ?>

	<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>

<div id="panel"><? $APPLICATION->ShowPanel(); ?>
</div>

<div class="fixHead">
    <div class="fixHeadIn">
        <span class="prof">
                            <a href="#modalLogin" class="blue inLine" id="mLogTrig">Войти</a> или <a href="#modalRegister" class="inLine" id="mRegTrig">Зарегистрироваться</a>
                        <span style="display: block;margin-left: 5px;" id="bookID"> | <a href="bookmarks">Закладки</a></span>
                    </span>
        <p>Компания Astralpool технологии для бассейнов и велнесс +7 (495) 645-45-51</p>
    </div>
</div>
<header class="bx-header">

</header>

<div class="content">

