</div> <!-- //content -->
</div> <!--/wrap container-->
<footer>
    <div class="partners">
        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_DIR."include/partners/astral.php",
                "EDIT_TEMPLATE" => ""
            )
        );?>
        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_DIR."include/partners/cepex.php",
                "EDIT_TEMPLATE" => ""
            )
        );?>
        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_DIR."include/partners/rainbird.php",
                "EDIT_TEMPLATE" => ""
            )
        );?>
    </div>
    <div class="subf-cont">
        <div class="subf">
            <div class="contacts">
                <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_DIR."include/footer/contacts.php",
                        "EDIT_TEMPLATE" => ""
                    )
                );?>
            </div>
            <div class="socsub">
                <?$APPLICATION->IncludeComponent("bitrix:subscribe.form","footer_sub",Array(
                        "USE_PERSONALIZATION" => "Y",
                        "PAGE" => "#SITE_DIR#personal/subscribe/subscr_edit.php",
                        "SHOW_HIDDEN" => "Y",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "3600"
                    )
                );?>
            </div>
        </div>
    </div>
</footer>
</body>
</html>