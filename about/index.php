<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?>
<div class="center">
<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"nav",
	Array(
		"PATH" => "",
		"SITE_ID" => "-",
		"START_FROM" => "0"
	)
);?>
<div class="newsRight">
	<div class="newsListRight aboutListRight">
 <strong class="hdr">Новости</strong>
		<div class="indNews">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"newsLeft",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "1000",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
		</div>
	</div>
</div>
<div class="newsLeft txtFrmt">
	<h1>О компании</h1>
	<p>
		 АО "Астрал СНГ" является частью транснациональной корпорации Fluidra, деятельность которой ориентирована на создание решений для оптимального использования водных ресурсов. Fluidra имеет более 40 производственных площадок (в Испании, США, Франции, Австралии и других странах), порядка 170 собственных представительств в 43 странах мира.&nbsp;
	</p>
	<p>
		 На российском рынке АО "Астрал СНГ" работает с 2000 года. За это время компания зарекомендовала себя в качестве ответственного партнера и надежного поставщика качественной продукции.
	</p>
	<p>
		 На сегодняшний день компания имеет собственные филиалы в таких городах как:<a href="http://astralpool.ru/contact/moskva-3/"> Москва</a>, <a href="http://astralpool.ru/contact/sankt-peterburg-1/">Санкт-Петербург</a>, <a href="http://astralpool.ru/contact/ekaterinburg-4/">Екатеринбург</a>, <a href="http://astralpool.ru/contact/krasnodar-2/">Краснодар</a>,- и официальные представительства в <a href="http://astralpool.ru/contact/novosibirsk-5/">Новосибирске</a> и &nbsp;<a href="http://astralpool.ru/contact/rostov-na-donu-6/">Ростове-на-Дону</a>.
	</p>
	<p>
		 Деятельность компании АО «Астрал СНГ» включает следующие направления: проектирование и оснащение бассейнов, велнес- и СПА комплексов оборудованием под брендом Astralpool; организация систем орошения и реализация трубопроводного оборудования под торговой маркой Cepex.
	</p>
	<p style="text-indent: 0;">
 <img alt="2(2).jpg" src="/upload/medialibrary/9ce/9ce77734b82ba8c03b26b4c801f46f52.jpg" style="width: 690px; height: 350px;" title="2(2).jpg" width="690" height="350">
	</p>
</div>
</div>
<div class="aboutPr">
	<div class="center">
		<h3>Премии и награды</h3>
 <span class="abSep"></span>
		<div class="abLid">
		</div>
		<div class="sliderWrap premSlider">
<?$APPLICATION->IncludeComponent(
"bitrix:highloadblock.list",
"awards",
Array(
"BLOCK_ID" => "3",
"DETAIL_URL" => ""
)
);?>
 <a href="javascript:void(0)" onclick="indBxSlide.goToNextSlide();" class="feedNext"></a> <a href="javascript:void(0)" onclick="indBxSlide.goToPrevSlide();" class="feedPrev"></a>
		</div>
	</div>
</div>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"history", 
	array(
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "Y",
		"IBLOCK_ID" => "5",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "DESCRIPTION",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"PARENT_SECTION" => "31",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "Y",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK" => "",
		"PAGER_PARAMS_NAME" => "arrPager",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "history",
		"IBLOCK_TYPE" => "references",
		"FILE_404" => ""
	),
	false
);?>

<div class="aboutJo">
	<div class="center">
		<h3>Стань частью команды Astralpool</h3>
 <span class="abSep"></span>
		<div class="abLid">
		</div>
 <section>
		<dl>
		</dl>
		<div class="jForm">
			<form method="post" enctype="multipart/form-data">
 <label>Имя и фамилия</label> <input name="name" required="" type="text"><br>
 <label>Эл. почта</label> <input name="jemail" required="" placeholder="E-mail" type="text"><br>
 <label>Телефон</label> <input style="width: 200px;" name="phone" placeholder="(495) 123-456-78" type="text"><br>
				 <!--                        <input type="file" name="resume_f" /> <span>Вы можете прикрепить файл не более 90 Mb</span><br/>--> <input class="bBtn" value="Отправить резюме" type="submit"> <input name="resume" value="1" type="hidden">
			</form>
		</div>
 <br clear="all">
 </section>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>