//==================================================
// - common.js
//==================================================

//jQuery.noConflict();

//初期化処理
jQuery(function($){
//========================================================

/* ----------------------------------------------------------------------------------
　マウスオーバー
---------------------------------------------------------------------------------- */	
	
/* 画像ボタン */
$(function(){
	 $('a img').hover(function(){
		$(this).attr('src', $(this).attr('src').replace('_off.', '_on.'));
		  }, function(){
			 if (!$(this).hasClass('current')) {
			 $(this).attr('src', $(this).attr('src').replace('_on.', '_off.'));
		}
   });
});

/* フェード */
$(function(){	
	$('.fade').hover(function() {
		$(this).stop().animate({opacity:0.7}, 100);
	}, function() {
		$(this).stop().animate({opacity:1}, 500);
	});	
});

/* ----------------------------------------------------------------------------------
　タブ切替
---------------------------------------------------------------------------------- */
$(function() {  
  $('.accordion li').click(function() {
    $(this)
      .children('.resultList').slideToggle();
    if ($(this).children('.menu').hasClass('active')) {
        $(this).children('.menu').removeClass('active');
     } else {
        $(this).children(".menu").addClass("active");
        }
    return false;
  });
});


/* ----------------------------------------------------------------------------------
　ウィンドウサイズによって読み込む画像を切り替える
---------------------------------------------------------------------------------- */
$(function(){
	var $setElem = $('.switchImg'),
	pcName = '_pc',
	spName = '_sp',
	replaceWidth = 768;

	$setElem.each(function(){
		var $this = $(this);
		function imgSize(){
			if(window.innerWidth > replaceWidth) {
				$this.attr('src',$this.attr('src').replace(spName,pcName)).css({visibility:'visible'});
			} else {
				$this.attr('src',$this.attr('src').replace(pcName,spName)).css({visibility:'visible'});
			}
		}
		$(window).resize(function(){imgSize();});
		imgSize();
	});
});


/* ----------------------------------------------------------------------------------
　グローバルナビ（レスポンシブ）
---------------------------------------------------------------------------------- */
$(function(){
var menu = $('#gnavi'), 
    menuBtn = $('#menu,#gnavi a'), 
    body = $(document.body),     
    menuWidth = menu.outerWidth(); 
    menuBtn.click(function(){
    body.toggleClass('open');
        if(body.hasClass('open')){
			menu.animate({opacity:1.0}, 0); 
            menu.animate({'right' : 0 }, '700');
            body.animate({'right': menuWidth }, '700'); 
			                
        } else {
            menu.animate({'right' : -menuWidth }, '700');
            body.animate({'right':0 }, '700');
			menu.animate({opacity:0}, 700); 
        }             
    });
});



/*$(function(){
	$("#menu").click(function(){
		if($('#gnaviCol ul').css("display")=="none"){
			$("#gnaviCol ul").slideDown("fast");
		}else{
			$("#gnaviCol ul").slideUp("fast");
		}
	});
});*/

$(window).resize(function(){
    /*var w = document.body.scrollWidth || document.documentElement.scrollWidth;
    var x = 767;
    if (w > x) {
        $('#gnaviCol ul').css({
            display: 'block'
        });
		$("#menu").addClass("active");
    } else {
        $('#gnaviCol ul').css({
            display: 'none'
        });
		$("#menu").removeClass("active");
    }*/
	
	/*var hsize = $('h1').height();
	$("#menu").css("height", hsize + "px");*/
});

$(function(){
	$('#menu,#gnavi a').click(function(){
    	$('#menu').toggleClass('active');
    });
});

/* PCのみ */
$("header #headCol #navi #appsItemCategoryTag > li").hover(function() {
    $(this).children('ul').fadeIn(300);
}, function() {
    $(this).children('ul').fadeOut(100);
});

/* ----------------------------------------------------------------------------------
　メニュー（アクティブ）
---------------------------------------------------------------------------------- */
$(function() {
    if(location.pathname != "/") {
        $('#gnaviCol li a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
    } //else $('#gnaviCol li a:eq(0)').addClass('active');
});

/* ----------------------------------------------------------------------------------
　ページトップへ戻るボタン
---------------------------------------------------------------------------------- */
//■page topボタン
$(function(){
var topBtn=$('#pageTop');
topBtn.hide();
 
//◇ボタンの表示設定
$(window).scroll(function(){
  if($(this).scrollTop()>80){
    //---- 画面を80pxスクロールしたら、ボタンを表示する
    topBtn.fadeIn();
  }else{
    //---- 画面が80pxより上なら、ボタンを表示しない
    topBtn.fadeOut();
  } 
});
 
// ◇ボタンをクリックしたら、スクロールして上に戻る
topBtn.click(function(){
  $('body,html').animate({
  scrollTop: 0},500);
  return false;
});

// ◇ボタンをロールオーバーでアニメーション
$('#pageTop').hover(function() {
	$(this).stop().animate({"bottom": "25px"}, 200);
	}, function() {
	$(this).stop().animate({"bottom": "20px"}, 200);
	});

});

/* ----------------------------------------------------------------------------------
　スムーズスクロール
---------------------------------------------------------------------------------- */
$(function() {
  // スクロールのオフセット値
  var offsetY = -100;
  // スクロールにかかる時間
  var time = 500;

  // ページ内リンクのみを取得
  $('a[href^=#]').click(function() {
    // 移動先となる要素を取得
    var target = $(this.hash);
    if (!target.length) return ;
    // 移動先となる値
    var targetY = target.offset().top+offsetY;
    // スクロールアニメーション
    $('html,body').animate({scrollTop: targetY}, time, 'swing');
    // ハッシュ書き換えとく
    window.history.pushState(null, null, this.hash);
    // デフォルトの処理はキャンセル
    return false;
  });
});

/* ----------------------------------------------------------------------------------
　ヘッダー追従
---------------------------------------------------------------------------------- */
$(function () {

  // scrollイベントを取得した際の処理を定義
  $(window).on("scroll", function () {
    // scrollTop()が0より大きい場合
    if ($(this).scrollTop() > 200) {
      // ヘッダーバーをslideDownして表示
      $("#cb-header").slideDown();
    // scrollTop()が0の場合
    } else {
      // ヘッダーバーをslideUpして非表示
      $("#cb-header").slideUp();
    }
  });

});

// ナビゲーション（追従型）
$(function() {
    var nav = $('header');
    //表示位置
    var navTop = nav.offset().top+120;
    //ナビゲーションの高さ（シャドウの分だけ足してます）
    var navHeight = nav.height()+10;
    var showFlag = false;
    nav.css('top', -navHeight+'px');
    //ナビゲーションの位置まできたら表示
    $(window).scroll(function () {
        var winTop = $(this).scrollTop();
        if (winTop >= navTop) {
            if (showFlag == false) {
                showFlag = true;
                nav
                    .addClass('fixed')
                    .stop().animate({'top' : '0px'}, 200);
            }
        } else if (winTop <= navTop) {
            if (showFlag) {
                showFlag = false;
                nav.stop().animate({'top' : -navHeight+'px'}, 200, function(){
                    nav.removeClass('fixed');
                });
            }
        }
    });
});

//========================================================	
});



