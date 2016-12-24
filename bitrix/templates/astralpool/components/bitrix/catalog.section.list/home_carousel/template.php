<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul id="homeCarousel">
<?/** @var array $arResult */
foreach ($arResult['SECTIONS'] as $key => $SECTION):?>
    <li class="home-sel">
        <a class="link" href="<?=$SECTION['SECTION_PAGE_URL']?>" title="<?=$SECTION['NAME']?>">
            <div>
                <p class="img-block">
                    <img class="default" src="<?=$SECTION['RESIZED_PICTURE']['src']?>" />
                    <img class="hover" src="<?=$SECTION['RESIZED_HOVER_PICTURE']['src']?>"
                </p>
                <p class="name-block">
                    <span class="name"><?=$SECTION['NAME']?></span>
                </p>
                <p class="desc-block">
                    <span class="text"><?=$SECTION['DESCRIPTION']?></span>
                </p>
            </div>
        </a>
    </li>
<? endforeach;?>
</ul>
    <script type="text/javascript">
        $('.home-sel').hover(function () {
            $(this).find('.hover')
                .finish()
                .fadeIn()
        },function () {
            $(this).find('.hover')
                .finish()
                .fadeOut()
        });

        $('#homeCarousel').bxSlider({
            minSlides: 4,
            maxSlides: 4,
            infiniteLoop:false,
            slideWidth:200,
            slideMargin:30

        });
    </script>
