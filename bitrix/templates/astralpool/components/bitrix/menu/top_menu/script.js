jQuery(document).ready(function ($) {
    var listMenu = $("#horizontal-multilevel-menu");

    if(listMenu.length<0)return;

// drop down menu

    var
        sfEls = listMenu.find('li'),
        m_line = $('.menu-line');

    sfEls.hover(function (e) {
        if($(this).hasClass('parent')){
            $(this).addClass('jshover');
            var $this = $(this);
            m_line.finish().slideToggle('normal',function () {
                $this.find('ul').fadeIn('300');
            });

        }
    },function (e) {
        if($(this).hasClass('parent')){
             $(this).removeClass('jshover');
            var $this = $(this);
            $this.find('ul').fadeOut('fast',function () {
                m_line.finish().slideToggle('normal',function () {
                })
            });
        }
    });

// magic line

    listMenu.prepend("<li id='magic-line'></li>");
    /* Cache it */
    var
        $magicLine = $("#magic-line"),
        $curPage = $(".current_page_item"),
        $curWidth = $curPage.length?$curPage.width():0,
        $curPosition = $curPage.length?$curPage.find('a').position().left:0;


    $magicLine
        .width($curWidth)
        .css("left", $curPosition)
        .data("origLeft", $magicLine.position().left)
        .data("origWidth", $magicLine.width());

    listMenu.find(" li a").hover(function() {
        $el = $(this);
        leftPos = $el.position().left;
        newWidth = $el.parent().width();

        $magicLine.stop().animate({
            left: leftPos,
            width: newWidth
        });
    }, function() {
        $magicLine.stop().animate({
            left: $magicLine.data("origLeft"),
            width: $magicLine.data("origWidth")
        });
    });
});



