$(window).scroll(function(){
	if($(this).scrollTop() > 350){
		var li = $('.help-you li').toArray();
		$(li[0]).show().addClass('fadeInLeft');
		$(li[1]).show().addClass('fadeInRight');
		$(li[2]).show().addClass('fadeInLeft');
		$('.help-title').show().addClass('fadeIn');
		
	}
	if($(this).scrollTop() > 800){
		var me_item = $('.method-item').toArray();
		$(me_item[0]).show().addClass('fadeInUpBig');
		$(me_item[1]).show().addClass('fadeInLeft');
		$(me_item[2]).show().addClass('fadeInRight');
		$('.method-title').show().addClass('fadeInDown');
	}
	if($(this).scrollTop() > 1500){
		var tar_item = $('.tar').toArray();
		$('.tar-title').show().addClass('rotateIn');
		$(tar_item[0]).show().addClass('fadeInDown');
		$(tar_item[1]).show().addClass('fadeInLeft');
		$(tar_item[2]).show().addClass('fadeInRight');
	}

	if($(this).scrollTop() > 2200){
		$('.scene-5 .container').show().addClass('fadeIn');
	}
})

$('.help-title').hide();
$('.help-you li').hide();

$('.method-title').hide();
$('.method-item').hide();

$('.tar-title').hide();
$('.tar').hide();

$('.scene-5 .container').hide();

$(window).scroll(function(){
				if($(this).scrollTop() > 100){
					$('.main-menu').addClass('menu-small');
					$('.main-menu').addClass('navbar-fixed-top');
					$('.main-menu').addClass('fadeInDown');
				}
				else{
					$('.main-menu').removeClass('menu-small');
					$('.main-menu').removeClass('navbar-fixed-top');
					$('.main-menu').removeClass('fadeInDown');
				}

					
			})

