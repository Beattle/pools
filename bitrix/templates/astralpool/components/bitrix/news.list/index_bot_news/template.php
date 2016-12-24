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


            <div class="latest-news">
                    <ul>
                    <?foreach($arResult["ITEMS"] as $key=> $arItem):

                        $time_created = MakeTimeStamp($arItem['DATE_CREATE']);
                        $time_format = FormatDate('d<b\r\/>M.',$time_created);

                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                    <li class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                            <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                                <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                                    <p class="img-intro">
                                        <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"/>
                                        <span class="date"><?=$time_format?></span>
                                    </p>
                                    <p class="intro-name"><?echo $arItem["NAME"]?></p>
                                </a>
                            <?endif;?>
                        <?endif;?>
                            <p class="inf">
                                <i class="news_m"></i><span class="name"><?=$arResult['NAME']?></span>
                                <i class="comms"></i><span class="count">0</span>
                            </p>
                    </li>
                    <?endforeach;?>
                </ul>
        </div>
<? // echo '<pre>'.print_r($arResult['ITEMS'],true).'</pre>';



