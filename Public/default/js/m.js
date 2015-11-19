$(function () {
  $('[data-toggle="tooltip"]').tooltip()
  //$('[data-toggle="popover"]').popover()
  $('[data-toggle="popover"]').popover({trigger:'hover'})
  $('[data-spy="scroll"]').each(function () {
	  var $spy = $(this).scrollspy('refresh')
	})
})
$(window).scroll(function () {
            var menu_top = $('#menu_wrap').offset().top;			
				if ($(window).scrollTop() >= 255) {
					$(".nav-bg").css("top",50);
					$(".nav-bg").css("position","fixed"); 
					$('#menu_wrap').addClass('menuFixed')  
				}	
				if($(window).scrollTop() < 255) {  
					$(".nav-bg").css("position","relative"); 
					$(".nav-bg").css("top",255); 	
					$('#menu_wrap').removeClass('menuFixed')			
				}  
			if(n==1){
				if ($(window).scrollTop() >= 30) {
					$(".nav-bg").css("top",50);
					$(".nav-bg").css("position","fixed"); 
					$('#menu_wrap').addClass('menuFixed')  
				}			
				if($(window).scrollTop() < 30) {  
			 		$(".nav-bg").css("position","relative"); 
                	
					$('#menu_wrap').removeClass('menuFixed')  					
            	}
			}
});  

jQuery(document).ready(function() {
        var qcloud = {};
        $('[_t_nav]').hover(function() {
            var _nav = $(this).attr('_t_nav');		
            clearTimeout(qcloud[_nav + '_timer']);
            qcloud[_nav + '_timer'] = setTimeout(function() {
                $('[_t_nav]').each(function() {
                    //$(this)[_nav == $(this).attr('_t_nav') ? 'addClass': 'removeClass']('nav-zibg');
                });
				$('#a' + _nav).addClass("nav-zibg");
                $('#' + _nav).stop(true, true).fadeIn(100);
                $('#zt').addClass('mh')
            },
            300);
        },
        function() {
            var _nav = $(this).attr('_t_nav');
            clearTimeout(qcloud[_nav + '_timer']);
            qcloud[_nav + '_timer'] = setTimeout(function() {
                $('[_t_nav]').removeClass('nav-zibg');
                $('#' + _nav).stop(true, true).fadeOut(0);
                $('#zt').removeClass('mh')
            },
            300);
        });
});

$(document).ready(function(){
  $(".nav-zi a").mouseover(function(){
    	$(this).children().removeClass("ls");
  });
  $(".nav-zi a").mouseout(function(){
    	$(this).children().addClass("ls");
  });
});

function login() {
    $("#ema").removeClass("dou");
    $("#pw").removeClass("dou");

    var em = $("#ema").val();
    var pw = $("#pw").val();
    var d1 = 0;
    var d2 = 0;

    if (em.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) && em.length > 6) {           
        $("#ema").css("background-color", "#ffffff");
        d1 = 1;
    } else {      
        $("#ema").addClass("dou");
        $("#ema").css("background-color", "#ffdfdf");
    }
   
    if (pw.length > 3) {
        $("#pw").css("background-color", "#ffffff");
        d2 = 1;
    } else {
        $("#pw").addClass("dou");
        $("#pw").css("background-color", "#ffdfdf");
    }
//先去掉正则判断d1==1 && d2==1
    if (1) {
        $("#pw").removeClass("dou");
        var yz = $.ajax({
            type: 'post',
            url: 'account/login',
            data: { em: em, pw: pw },
            cache: false,
            dataType: 'text',
            success: function (data) {
				 var obj=eval('('+data+')');  
				 alert(obj.message);
                if (obj.code == '200') {
						
                    window.location.href = window.location;
                } else {
                    $("#pw").addClass("dou");
                    $("#pw").css("background-color", "#ffdfdf");
                }
            },
            error: function () { }
        });
    }   
    
}
function myout() {
    if (n == 1) {
        window.location.href = "account/logout";
		
    } else {
        window.location.href = "account/logout";
    }
    
}