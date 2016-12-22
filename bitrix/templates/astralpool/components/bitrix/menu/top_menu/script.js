var jshover = function()
{
	var menuDiv = document.getElementById("horizontal-multilevel-menu")
	if (!menuDiv)
		return;

	var sfEls = menuDiv.getElementsByTagName("li");
	for (var i=0; i<sfEls.length; i++) 
	{
		sfEls[i].onmouseover=function()
		{
			this.className+=" jshover";
		}
		sfEls[i].onmouseout=function() 
		{
			this.className=this.className.replace(new RegExp(" jshover\\b"), "");
		}
	}
}

if (window.attachEvent) 
	window.attachEvent("onload", jshover);





jQuery(document).ready(function ($) {
    var listMenu = $("#horizontal-multilevel-menu");
    listMenu.prepend("<li id='magic-line'></li>");

    /* Cache it */
    var
        $magicLine = $("#magic-line"),
        $curPage = $(".current_page_item"),
        $curWidth = $curPage.length?$curPage.width():0,
        $curPosition = $curPage.length?$curPage.find('a').position().left:0;
    console.log($curWidth,$curPosition);

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



