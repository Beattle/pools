var indexSlide=indexSlide2=indexSlide3=indexSlide4=indexSlide5=indBxSlide8=slider7=indBxSlide10=false;
var activeProjSlide=0;
jQuery(document).ready(function($){

    $(window).bind('contextmenu', function(e) {
        //return false;
    });


    allSliders();

    if($('.prosGalSm').length) actProdGal();

    $(".fancybox").fancybox();

    var histLink = $('.histMore');

    histLink.each(function () {
        var fullHistory = $(this).parent().find('section').clone();
        var title =$(this).parent().find('var').text();
        fullHistory.addClass('modal');
        fullHistory.wrapInner('<div class="modalForm histModalTxt"></div>');
        fullHistory.prepend('<strong>История компании: '+title+'</strong>');
       $(this).fancybox({
           padding: 0,
           fitToView    : false,
           autoSize    : true,
           closeClick    : false,
           content:fullHistory,
           maxWidth:770
       });
    });

    $.fancybox.open($('#modal_msg'));




    $(".inLine").fancybox({
        padding: 0,
        fitToView    : false,
        autoSize    : true,
        closeClick    : false
    });

    $(".fancyProd").fancybox({
        maxWidth	: 1000,
        maxHeight	: 600,
        fitToView	: false,
        width		: '80%',
        height		: '80%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
    });

    if($("#tabs").length) $("#tabs").tabs();
    if($('#search').length) actSearch()
    if($('#menuAcc').length) menuAccInit('menuAcc')
    if($('#acco').length) makeAcco('acco');
    if($('#acco2').length) makeAcco('acco2');
    if($('#gMap').length) startMap('gMap');
    if($('#bookIt').length) $('#bookIt').bind('click',bkmrk)
    if($('#date').length) $("#date").mask("99.99.9999");

    if($('#prodDescrSlWrap').length) {
        var sh = $('#prodDescrSl').height()
        var sw = $('#prodDescrSlWrap').height()
        if(sw>sh){
            moreToogle(sw,sh)
        }
    }

    $('.profileOrders.modalCart tr.order-row').click(function() {
        $(this).toggleClass('collapsed');
        $(this).nextUntil('tr.order-spacer').toggle();
    });
});

function moreToogle(sw,sh){
    $('#prodDescrShow').html('ааОаКаАаЗаАбб аПаОаЛаНаОбббб').show().unbind('click').bind('click',function(){
        $('#prodDescrSl').css('max-height',sw+"px").animate({height: sw+"px"},500,function(){
            //$('#prodDescrShow').hide()
            $('#prodDescrShow').html('аЁаКбббб').unbind('click').bind('click',function(){
                $('#prodDescrSl').css('max-height',sw+"px").animate({height: sh+"px"},500,function(){
                    moreToogle(sw,sh)
                })
            })
        })
    })
}

$(window).load(function() {
    if($('#scroller').length) $("#scroller").mCustomScrollbar({theme: 'dark'});
});

function showProdSl(){

}

/*
 jQuery(window).resize(function($){
 chSize()
 })
 */

function submitFiltr(ob){
    var url = document.location.href.split('?')
    if(ob==0) {
        document.location.href= url[0] + '#projFiltBox_'
        return
    }
    if($(ob).hasClass('act')){
        $(ob).removeClass('act')
        var str = 0
    }else var str = $(ob).attr('data-id')
    $.each($("#projFiltBox a"), function(i,el){
        if($(el).hasClass('act')) if($(el).attr('data-id') && $(el).attr('data-id')!='0') str += ','+$(el).attr('data-id')
    })
    document.location.href= url[0]+'?filter='+str+'#projFiltBox_'
}

function slideFilter(ob){
    if($(ob).hasClass('closed')){
        $( "#projFiltBox" ).animate({
            right: 0
        },1000);
        $(ob).removeClass('closed')
    }else{
        $( "#projFiltBox" ).animate({
            right: -1500
        },1000);
        $(ob).addClass('closed')
    }
}

function bkmrk(){
    var coo = $.cookie("bkmrks") ? $.cookie("bkmrks") : '';
    var o = $('#bookIt')
    var id = parseInt(o.attr('data-id'))

    if(o.hasClass('active')){
        var a = coo.split(',')
        var s = ''
        for(i=0; i< a.length; i++){
            if(id!=a[i]) s += (s?',':'') + a[i]
        }
        coo = s
        $(o).html('аЁаОаЗаДаАбб аЗаАаКаЛаАаДаКб')
        $(o).removeClass('active')
    }else{
        coo += (coo?',':'') + id
        $(o).html('аЃаБбаАбб аЗаАаКаЛаАаДаКб')
        $(o).addClass('active')
        var now = $.datepicker.formatDate('dd.mm.yy', new Date())
        $.cookie("bkmrks_"+id, now, { expires: 365, path: '/' })
    }

    $('#bookID').css('display',coo ? 'block' : 'none')
    $.cookie("bkmrks", coo, { expires: 365, path: '/' })

}
function actProdGal(){
    $('.prosGalSm li a').bind('click',function(){
        $('#bigImg img').attr('src',$(this).attr('href'))
        $('.prosGalSm li').removeClass('act')
        $(this).parent().addClass('act')
        return false;
    })
}

function printMap(){
    printMap_(map)/*
     setTimeout(function(){
     printMap_(map)
     }, 1000);*/

}

var printMap_ = function(map) {
    map.setOptions({
        mapTypeControl: false,
        zoomControl: false,
        streetViewControl: false,
        panControl: false
    });

    var popUpAndPrint = function() {
        dataUrl = [];

        $('#gMap canvas').filter(function() {
            dataUrl.push(this.toDataURL("image/png"));
        })

        var container = document.getElementById('gMap');
        var clone = $(container).clone();

        console.log(container)

        var width = container.clientWidth
        var height = container.clientHeight

        $(clone).find('canvas').each(function(i, item) {
            $(item).replaceWith(
                $('<img>')
                    .attr('src', dataUrl[i]))
                .css('position', 'absolute')
                .css('left', '0')
                .css('top', '0')
                .css('width', width + 'px')
                .css('height', height + 'px');
        });

        var printWindow = window.open('', 'PrintMap',
            'width=' + width + ',height=' + height);
        printWindow.document.writeln($(clone).html());
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();

        map.setOptions({
            mapTypeControl: true,
            zoomControl: true,
            streetViewControl: true,
            panControl: true
        });
    };

    setTimeout(popUpAndPrint, 500);
};

function projPrev(){
    var c = $('.projectGal li.act')
    var n = $(c).prev('li')
    var li = n.length ? n : $('.projectGal li')[$('.projectGal li').length - 1]
    setProjSlide(li)
}
function projNext(){
    var c = $('.projectGal li.act')
    var n = $(c).next('li')
    var li = n.length ? n : $('.projectGal li')[0]
    setProjSlide(li)
}
function setProjSlide(li){
    $('.projectGal li').removeClass('act')
    $(li).addClass('act')
    var src = $('.projectGal li.act a img').attr('data-rel')
    $('#projectBig').attr('src',src)
}

var items=[]
var itemsRel=[]
function changeSlide(id, desc_li, li){
    var title = $(desc_li).children('p').html();

    $('#iTitle').html(title)
    $("#slider3 li").removeClass('act')
    $(li).addClass('act')
    $('#slider5').html($('#iSliderWr_'+id).html())
    $('#fNext').css('visibility','visible')
    $('#fPrev').css('visibility','visible')
    indBxSlide5 = $('#slider5').bxSlider({
        pager:false,
        slideSelector: 'div',
        adaptiveHeight: false,
        startSlide: 0,
        controls: false
    });

    if($('#iSliderWr_'+id+' div').length<2){
        $('#fNext').css('visibility','hidden')
        $('#fPrev').css('visibility','hidden')
    }

    if(itemsRel[id]){
        map.setCenter(itemsRel[id].latlng);
        map.setZoom(itemsRel[id].z);
    }

}

var map = false;
function startMap(id){
    if(!items.length) {
        //$('#'+id).css('display','none')
        return;
    }

    var mapWidth = $('.contaRight').width() - $('#mapList').outerWidth();
    var mapHeight = $('#mapList').outerHeight();
    $('#gMap').css({width: mapWidth, height: mapHeight});
    map = new google.maps.Map(document.getElementById(id));

    var bounds = new google.maps.LatLngBounds();
    for(i=0; i<items.length; i++){
        var m = items[i]
        var tmp = m.latlng.split(',')
        var myLatlng = new google.maps.LatLng(parseFloat(tmp[0]),parseFloat(tmp[1]));

        itemsRel[m.index] = {latlng: myLatlng, z: m.z}

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: m.name,
            icon: 'img/gm.png'
        });

        bounds.extend(myLatlng);
    }

    map.fitBounds(bounds);
}

function collapseAll(){
    $.each($("#menuAcc .ui-accordion-header"), function(i,el){
        if($(el).next("div").is(":visible")){
            $(el).next("div").slideUp("slow");
        } else {
            $("#menuAcc .ui-accordion-content").slideUp("slow");
            $(el).next("div").slideToggle("slow");
        }
    });
    //$("#menuAcc .accord-header:eq(1)").trigger('click');
}
var accStart=0
var menuAcc=false
function menuAccInit(id){
    menuAcc = $( "#"+id ).accordion({heightStyle:'content',collapsible: true, active:accStart, animate:false});

    $.each($('#'+id+' a'), function(i,el){
        var ul = $(el).next('ul')
        if(ul.length){
            $(el).html($(el).html()+'<i></i>')
            $(el).bind('click',function(e){
                e.preventDefault();

                if($(el).attr('data-link')) document.location.href = $(el).attr('data-link')
                if($(ul).is(':visible')){
                    $(ul).slideUp()
                    $(this).removeClass('act')
                }else{
                    $(ul).slideDown()
                    $(this).addClass('act')
                }

                return false;
            })

            $(ul).hide()
        }
    })


    //if(!$('#'+id).hasClass('libMenuAcc')){
    $.each($('#'+id+' h5'), function(i,el){
        $(el).html($(el).html()+'<i></i>')
        //if($(el).hasClass('openItH')) $(el).trigger('click')
    })
    //}

    $('.openIt').next('ul').slideDown()
    $('.openIt').addClass('act')
    //$('.openIt').trigger('click')


}

function countUp(ob){
    var inp = $($(ob).parent().find('input'))
    var v = parseInt(inp.val())
    inp.val(v+1)
}

function countDown(ob){
    var inp = $($(ob).parent().find('input'))
    var v = parseInt(inp.val())
    if(v<2) return;
    inp.val(v-1);
}

function modelChange(ob){
    $(ob).parents('.order').find('.price span').text($(ob).val() || '(аПаО аЗаАаПбаОбб)');
    $(ob).parents('.order').find('.oldPrice span').text($(ob).find(':selected').data('oldprice'));

    $('#code_id').val($(ob).find(':selected').data('art'));

    storeStatusChange();
}

function storeChange(selEl){
    storeStatusChange();
}

function storeStatusChange() {
    var availability = $('#modelSelect :selected').data('store');
    if(!availability) {
        $('#storeStatus').text('ббаОбаНбаЙбаЕ б аМаЕаНаЕаДаЖаЕбаА');
        return;
    }

    var store = $('#storeSelect').val();
    var storeAv = availability.filter(function(a) { return a['id'] == store });
    var isAvailable = storeAv && storeAv.length > 0 && storeAv[0]['amount'] > 0;

    if (isAvailable) {
        $('.product').addClass('inStore');
        $('#storeStatus').text('а аНаАаЛаИбаИаИ');
    }
    else {
        $('.product').removeClass('inStore');
        $('#storeStatus').text('ааЖаИаДаАаЕаМ аПаОбббаПаЛаЕаНаИаЕ аВ ' + $('#storeSelect :selected').text());
    }
}
$(function() {
    storeStatusChange();
});

function makeAcco(id){
    $('#'+id+' dd').hide()
    $.each($('#'+id+' dt'), function(i,el){
        $(el).bind('click',function(){
            var dd = $(this).next('dd')
            var html = $(this).html().slice(0,-1)
            if($(dd).is(':visible')){
                $(dd).slideUp()
                html+='+'
            }else{
                $(dd).slideDown()
                html+='-'
            }
            $(this).html(html)
        })
    })
}

var Sspeed = 500
var SinProg =false

function actSearch(){
    $('#search').bind('click',function(){
        if($(this).hasClass('sAct')){
            //searchClose()
        }else{
            $( "#search").css('background-position','270px 50%')
            $( "#search" ).animate({
                width: 320,
                'background-color': '#000',
                queue:false
            }, Sspeed, function() {
                if(!SinProg) $('#searchInp').css('display', 'block')
                $(this).addClass('sAct')
            });
        }
    })

    $('#searchMa').bind('click',function(){
        searchClose()
    })
    /*
     $('#search').mouseenter(function() {
     $( "#search").css('background-position','270px 50%')
     $( "#search" ).animate({
     width: 320,
     'background-color': '#000',
     queue:false
     }, speed, function() {
     if(!inProg) $('#searchInp').css('display', 'block')
     });
     })
     */
    var timeoutID = false
    $('#search').mouseleave(function() {
        timeoutID = setTimeout(searchClose, 1000)
    })
    $('#search').mouseenter(function() {
        if(timeoutID) clearTimeout(timeoutID)
    })

}

function searchClose(){
    SinProg=true
    $('#searchInp').css('display', 'none')
    $( "#search").css('background-position','50% 50%')
    $( "#search" ).animate({
        width: 68,
        'background-color': 'rgba(0,0,0,.56)',
        queue:false
    }, Sspeed, function() {
        $('#searchInp').css('display', 'none')
        SinProg=false
        $(this).removeClass('sAct')
    });
}



function allSliders(){
    if($('#slider').length) {
        indBxSlide = $('#slider').bxSlider({
            pager:false,
            slideSelector: 'ul',
            adaptiveHeight: false,
            startSlide: 0,
            controls: false
        });
    }

    if($('#slider2').length) {
        indBxSlide2 = $('#slider2').bxSlider({
            pager:false,
            slideSelector: 'ul',
            adaptiveHeight: false,
            startSlide: 0,
            controls: false
        });
    }

    if($('#slider3').length) {
        /*indBxSlide3 = $('#slider3').bxSlider({
         pager:false,
         slideSelector: 'ul',
         adaptiveHeight: false,
         startSlide: 0,
         controls: false
         });*/

        if($('#slider3 li').length>3){
            indBxSlide3 = $('#slider3').bxSlider({
                pager:false,
                slideSelector: 'li',
                adaptiveHeight: false,
                startSlide: activeProjSlide,
                controls: false,
                minSlides: 3,
                maxSlides: 4,
                moveSlides: 1,
                slideWidth: 268,
                slideMargin: 20,
                onSlideAfter: function(el, oldIndex, newIndex){
                    $.cookie("projslide", newIndex, { expires: 365, path: '/' })
                }
            });
        }
    }

    if($('#slider10').length) {
        indBxSlide10 = $('#slider10').bxSlider({
            pager:false,
            slideSelector: 'li',
            adaptiveHeight: false,
            startSlide: 0,
            moveSlides: 1,
            slideWidth: 239,
            slideMargin: 20,
            minSlides: 3,
            maxSlides: 4,
            controls: false
        });
    }

    if($('#slider4').length) {
        indBxSlide4 = $('#slider4').bxSlider({
            pager:false,
            slideSelector: 'li',
            adaptiveHeight: false,
            moveSlides: 1,
            startSlide: 0,
            slideWidth: 239,
            slideMargin: 20,
            minSlides: 3,
            maxSlides: 4,
            controls: false
        });
    }

    if($('#slider5').length) {
        indBxSlide5 = $('#slider5').bxSlider({
            pager:false,
            slideSelector: 'div',
            adaptiveHeight: false,
            startSlide: 0,
            controls: false
        });
    }

    if($('#slider6').length) {
        indBxSlide6 = $('#slider6').bxSlider({
            pager:true,
            slideSelector: 'div',
            adaptiveHeight: false,
            startSlide: 0,
            controls: false,
            pause: 6000,
            auto: true
        });
    }

    if($('#slider7').length) {
        indBxSlide7 = $('#slider7').bxSlider({
            pager:false,
            slideSelector: 'ul',
            adaptiveHeight: false,
            startSlide: 0,
            mode: 'vertical',
            controls: false
        });
    }

    if($('#slider8').length) {
        var l = Math.ceil($('#slider8 ul li').length / 3) - 1
        if(l<0) l = 0
        indBxSlide8 = $('#slider8').bxSlider({
            pager:false,
            startSlide: l,
            infiniteLoop: false,
            hideControlOnEnd: true,
            slideSelector: 'ul',
            adaptiveHeight: false,
            controls: false,
            onSlideAfter: function($el, oldIndex, newIndex){
                if(newIndex==0){
                    $('#histNext').removeClass('opac')
                }else{
                    $('#histNext').addClass('opac')
                }

                if(l==newIndex){
                    $('#histPrev').removeClass('opac')
                }else{
                    $('#histPrev').addClass('opac')
                }

            }
        });
    }

    if($('#slider9').length) {
        indBxSlide9 = $('#slider9').bxSlider({
            pager:false,
            slideSelector: 'li',
            adaptiveHeight: false,
            startSlide: 0,
            controls: false
        });
    }
}


function msg(title,msg){
    $('#msgTitle').html(title)
    $('#msgBody').html(msg)
    $('#msgModal').trigger('click')
}







// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

function goSlide(n){
    $($('.indSliderWrap .nivo-controlNav a')[n]).trigger('click')
    console.log($('.indSliderWrap .nivo-controlNav a')[n])
    //$('#indSlider').show(n)
}

function chSize(){
    w = $('html, window').width()
    if(w<1210){
        $('body').addClass('small')
    }else{
        $('body').removeClass('small')
    }
}

var sl = false
function actToTop(){
    $(window).scroll(function() {
        var scrTop=$(window).scrollTop()
        if(scrTop){
            if(!sl) sl = ($('html, window').width() - 960) / 2 - 70

            $('#goTop').css({'right': sl+'px','display': 'block'})
        }else $('#goTop').css('display','none')
    })
}

function actCatalog(){
    $.each($('.catalogList .btnLo'), function(i,el){
        $(el).bind('click',function(){
            $(this).css('display','none')
            $(this).parent().parent().append('<div class="steperList noSelect gradientRed"><i onclick=\'prodDw(this)\' class=\'fa fa-minus\'></i> <input type=\'text\' value=\'1\' onchange=\'unitChange(this,"1","5")\' /> <i onclick=\'prodUp(this)\' class=\'fa fa-plus\'></i></div>')
        })
    })
}

function actRangeSlider(){
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ 0, 500],
        slide: function( event, ui ) {
            $( "#amount" ).html(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        }
    });

    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );
}

function startFilter(){
    $.each($('.recList li'), function(index, li) {
        $(li).click(function( event ) {
            if($(this).hasClass('act')){
                $(this).removeClass('act')
            }else{
                $(this).addClass('act')
            }
        })

    })
}

function toTop(){
    $('html, body').animate({scrollTop: 0})
}

function actTopHover(){
    $.each($('.headHover'),function(i,el){
        $(el).bind('mouseenter', function(){
            //e.stopPropagation();
            var id = this.id.replace('headHover_','')
            h = id == 'hwPhone' ? 'hwLogin' : 'hwPhone'
            $('#'+h).fadeOut()
            $('#'+id).fadeIn()

            $('#'+id).bind('mouseleave', function(){
                $(this).fadeOut()
            })
        })
    })
}

function cartToogle(){
    $('#cartToogler').bind('mouseenter',function(){
        if($('#cart ul li').length){
            $('#cart').fadeIn()
        }
    })
    $('#cart').bind('mouseleave',function(){
        $('#cart').fadeOut()
    })
    $('#cartToogler').bind('click',function(){
        $('#cart').fadeOut()
    })
}

function toogleTop(id){
    h = id == 'hwPhone' ? 'hwLogin' : 'hwPhone'
    $('#'+h).fadeOut()
    $('#'+id).fadeToggle()
}

function prodUp(ob){
    input = $(ob).parent().find('input')
    input.val(parseInt(input.val())+1)
}

function prodDw(ob){
    input = $(ob).parent().find('input')
    val = parseInt(input.val())
    if(val>1) input.val(val-1)
}

function fixedHead(){
    $(window).scroll(function() {
        var scrTop=$(window).scrollTop()

        if(scrTop){
            $('body').addClass('fixHead')
            //$('.header').animate({'height':96}, 500,function(){
            //$(this).animate({opacity:100},200)
            //$('.head .logo').animate({opacity:0},200)
            //});
        }else{
            $('body').removeClass('fixHead')
        }
    })
}


// OLD <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

function checkSubmit(cl,form){
    ret = true
    $.each($(cl), function(index, am) {
        mark=false

        if(am.type=='radio'){
            v=$('input[name='+am.name+']:checked', '#'+form).val()
            if(!v) {ret=false;mark=true;}
        }else if(am.nodeName.toLowerCase()=='select'){
            if($(am).val()=='0') {ret=false;mark=true;}
        }else if(am.type=='text'){
            if((am.title && am.value==am.title) || !am.value) {ret=false;mark=true;}
        }
        if(mark) $(am).addClass('marked')
        else $(am).removeClass('marked')
    })

    if(ret){
        $('#'+form+'_error').html('').css('display','none')
        $('#'+form).submit()
    }else{
        $('#'+form+'_error').html('<p>Please</p><p>fill in the required fields!</p>').css('display','block').addClass('errorStyle')
    }
}

function removeFromCart(id,ob){
    $.ajax({
        url: "mods/a.function.php",
        //context: ob,
        data: {aj:2, id:id, sid:SID},
        success: function(data, textStatus, jqXHR){
            $('#cartAj').html(data)
        }
    })
}

function removeFromCartRT(id,ob){
    $.ajax({
        url: "mods/a.function.php",
        //context: ob,
        data: {aj:2, id:id, sid:SID},
        success: function(data, textStatus, jqXHR){
            $('#cartAj').html(data)
            ul = $(ob).parent().parent().parent()
            $(ob).parent().parent().remove()
            if($(ul).find('li').length)
                changeTotal()
            else $('#recalc').html('<h3 class="bagMsg">Your Shopping Bag is Empty</h3>')
        }
    })
}

stickCart=false
function toCart(id){
    var model=$('#code_id').val()
    var store = '';
    if($('#storeSelect').length) store=$('#storeSwitch').val()
    if(id && model){
        $.ajax({
            url: "mods/a.function.php",
            //context: ob,
            data: {aj:1, id:id, model: model, store: store, sid:SID},
            success: function(data, textStatus, jqXHR){
                $('#cartAj').html(data)
                $('#modalOrderTrigger').trigger('click')
                //toogleCart()
            }
        })
    }else{
        //$('#selectSize').fadeIn().delay(3000).fadeOut()
    }
}

function addNotification(id){
    var model = $('#code_id').val()
    var store = '';
    if($('#storeSelect').length) store=$('#storeSelect').val()

    if(!id || !model) return;

    $.ajax({
        url: "mods/a.function.php",
        //context: ob,
        data: {aj:7, id:id, model: model, store: store, sid:SID},
        success: function(data, textStatus, jqXHR){
        }
    });
}

function addZeros(s){
    a=(s+'').split('.')
    r=a[0]+'.'
    if(a.length==1) r+='00'
    else if(a[1].length==1) r+=a[1]+'0'
    else r+=a[1]

    return r
}

function changeTotal(){
    sum=0
    $.each($('.cartList li'), function(index, li) {
        count = $(li).find('.countID').val()
        price = $(li).find('.prodPriceValue').val()
        psum = price*count
        $(li).find('.suma').html(addZeros(psum))
        sum+=psum
    })
    $('#cartoTotalID').html(addZeros(sum))
}

function newUr(el){
    var val = el.options[el.selectedIndex].value
    $('#fil_sub_new').css('display',val=='new' ? 'block':'none')
}

function rmail(el){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(regex.test(el.value)) { try {rrApi.setEmail(el.value);}catch(e){}}
}

function setClndT(id,name){
    $('#'+id).html(name)
}

function navClndr(d,o,i){
    var b = $(o).parent().parent()
    console.log(b)
    console.log(b.prev('.clndrWrap'))
    if(d=='l'){
        $('.clndrWrap').css('display','none')
        $('#clndrw_'+i).css('display','block')

    }else{
        $('.clndrWrap').css('display','none')
        $('#clndrw_'+i).css('display','block')
    }
}