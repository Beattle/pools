<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?$APPLICATION->SetTitle("Оборудование для бассейна и фонтаны | Астралпул");?>

<?$APPLICATION->IncludeComponent(
    "bitrix:highloadblock.list",
    "HomeSlider",
    Array(
        "BLOCK_ID" => "4",
        "DETAIL_URL" => ""
    )
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

