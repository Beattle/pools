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
<body class="<?=$USER->IsAuthorized()? 'authorized':'guest'?>">

<?if($USER->IsAuthorized()):?>
    <div id="panel"> <? $APPLICATION->ShowPanel(); ?></div>
<?endif;?>

<header class="bx-header">
    <div class="inner-row">
        <div class="cell-l cells">
            <div class="phone">
                <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_DIR."include/phone.php",
                        "EDIT_TEMPLATE" => ""
                    )
                );?>
            </div>
            <div class="logo">
                <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_DIR."include/logo.php",
                        "EDIT_TEMPLATE" => ""
                    )
                );?>
            </div>
        </div>
        <div class="cell-r cells">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "horizontal_multilevel",
                Array(
                    "ROOT_MENU_TYPE" => "top",
                    "MAX_LEVEL" => "3",
                    "CHILD_MENU_TYPE" => "left",
                    "USE_EXT" => "Y"
                )
            );?>
        </div>
    </div>
</header>

<div class="content">

