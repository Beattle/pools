<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<section>
    <dl></dl>
<div class="bx_mfeedback jForm">
	<?if(!empty($arResult["ERROR_MESSAGE"]))
	{
		foreach($arResult["ERROR_MESSAGE"] as $v)
			ShowError($v);
	}
	if(strlen($arResult["OK_MESSAGE"]) > 0)
	{
		?>
        <div class="modal" id="modal_msg" style="display: block;">
            <strong id="msgTitle">Стань частью команды Astralpool</strong>
            <div id="msgBody">Наш мендежер перезвонит Вам через пару минут<br><br></div>
        </div>
        <?
	}
	?>
	<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
		<?=bitrix_sessid_post()?>
		<label for="pro-name"><?=GetMessage("MFT_NAME")?></label>
		<input  required id="pro-name" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>"/><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?><br/>

		<label for="pro-email"><?=GetMessage("MFT_EMAIL")?></label>
		<input required id="pro-email" type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>"/><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?><br/>

		<label for="pro-phone"><?=GetMessage("MFT_MESSAGE")?></label>
		<input type="text" placeholder="(495) 123-456-78" id="pro-phone" name="MESSAGE" value="<?=$arResult["MESSAGE"]?>" /><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?><br/>

		<?if($arParams["USE_CAPTCHA"] == "Y"):?>
			<strong><?=GetMessage("MFT_CAPTCHA")?></strong><br/>
			<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA"><br/>
			<strong><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></strong><br/>
			<input type="text" name="captcha_word" size="30" maxlength="50" value=""/><br/>
		<?endif;?>

		<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
		<input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>" class="bBtn">
	</form>
</div>
<br clear="all">
</section>