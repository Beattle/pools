<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?$APPLICATION->SetTitle("Оборудование для бассейна и фонтаны | Астралпул");?>
<div class="slider-container">
<?$APPLICATION->IncludeComponent(
    "bitrix:highloadblock.list",
    "home_slider",
    Array(
        "BLOCK_ID" => "4",
        "DETAIL_URL" => ""
    )
);?>
</div>


<div class="tb1">
    <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","home_carousel",
        Array(
            "VIEW_MODE" => "LINE",
            "SHOW_PARENT_NAME" => "N",
            "IBLOCK_TYPE" => "catalog",
            "IBLOCK_ID" => "6",
            "COUNT_ELEMENTS" => "N",
            "TOP_DEPTH" => "1",
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_CODE" => "",
            "SECTION_URL" => "",
            "SECTION_FIELDS" => "",
            "SECTION_USER_FIELDS" => array("UF_HOVER_DIR"),
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_NOTES" => "",
            "CACHE_GROUPS" => "Y"
        )
    );?>
</div>
<div class="tb2">
    <h3>Последние новости</h3>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "index_bot_news",
        Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "CREATE_DATE_FORMAT" =>"d.m.Y",
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
            "SORT_BY1" => "CREATED",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "ASC"
        )
    );?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

