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


            <div class="sliderWrap histSlider">
                <div id="slider8">
                    <ul>
                    <?foreach($arResult["ITEMS"] as $key=> $arItem):?>
                        <?php if ($key > 0 && $key % 3 === 0){
                            echo '</ul><ul>';
                        }
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                    <li class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">


                        <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                            <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                                <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
                            <?else:?>
                                <var><?echo $arItem["NAME"]?></var><br />
                            <?endif;?>
                        <?endif;?>
                        <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                            <section>
                                <?echo $arItem["PREVIEW_TEXT"];?>
                            </section>
                            <a href="javascript:void();" class="histMore">Подробнее</a>
                        <?endif;?>
                    </li>

                    <?endforeach;?>
                </ul>


            </div>
                <a href="javascript:void(0)" onclick="indBxSlide8.goToNextSlide();" class="feedNext opac" id="histNext"></a> <a href="javascript:void(0)" onclick="indBxSlide8.goToPrevSlide();" class="feedPrev" id="histPrev"></a>
        </div>




