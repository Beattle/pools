<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$rows = ($arResult['rows']);

if (!empty($arResult['ERROR']))
{
	echo $arResult['ERROR'];
	return false;
}

?>
<div id="slider6">
    <? $rows = $arResult['rows'];?>

	<? foreach ($rows as $row): ?>
        <div>
            <a  href="<?=$row['UF_LINK']?>">
                <?=$row['UF_SLIDER_IMAGE']?>
                <div class="centerAbsInd">
                    <h1><?=$row['UF_HEADER1']?></h1>
                    <h2><?=$row['UF_HEADER2']?></h2>
                </div>
            </a>
            <div class="bLinkWraper">
                <a title="UF_SBUTTON" href="<?=$row['UF_LINK']?>" class="indMore"><?=$row['UF_SBUTTON']?></a>
            </div>
        </div>
	<? endforeach; ?>
    <script type="text/javascript">
        var slider = $('#slider6');
        if(slider.length) {
            indBxSlide6 = slider.bxSlider({
                pager:true,
                slideSelector: 'div',
                adaptiveHeight: false,
                startSlide: 0,
                controls: false,
                pause: 6000,
                auto: true
            });
        }
    </script>

</div>
