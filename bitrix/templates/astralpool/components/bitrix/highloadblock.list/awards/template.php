<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult['ERROR']))
{
	echo $arResult['ERROR'];
	return false;
}

?>
<div id="slider">
    <? $sort = array_reverse($arResult['rows']);?>
        <ul>
	<? foreach ($sort as $row): ?>
        <?
        $doc = new DOMDocument();
        $doc->loadHTML($row['UF_AWARD_PIC']);
        $xpath = new DOMXPath($doc);
        $src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"




         ?>
        <li>
            <a class="fancybox" href="<?=$src;?>">
                <?=$row['UF_AWARD_PIC']?>
            </a>
            <h4><?=$row['UF_AWARD_NAME']?></h4>
        </li>
	<? endforeach; ?>
        </ul>
</div>
