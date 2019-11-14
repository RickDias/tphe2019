<script type="text/javascript">
	$(window).load(function() {
		if(!isMobile())
		{
			initCarousel();
			initCarouselBlog();
		}
		else
		{
			initCarouselMobile();
			initCarouselBlogMobile();
		}
		$('.home_top_tab .prev, .home_top_tab .next').click(function(){
			return removeApear($(this));});
	});

	function initCarousel() {
	        {foreach from=$tabsFull item=tabFull_unique name=tabfull_unique }
			$('#carousel{$tabFull_unique->id_tab}').carouFredSel({
				responsive: true,
				onWindowResize: 'debounce',
				width: '100%',
				height:'variable',
				prev: '#prev{$tabFull_unique->id_tab}',
				next: '#next{$tabFull_unique->id_tab}',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width: 220,
					height: 'auto',	//	optionally resize item-height
					visible: {
						min: 1,
						max: 3
					}
				},
				scroll: {
					items:3,
					duration  : 1000   //  The duration of the transition.
				}
			});
			{/foreach}
	}
// blog
	function initCarouselBlog() {
			$('#carousel-blogpost').carouFredSel({
				responsive: true,
				onWindowResize: 'debounce',
				width: '100%',
				height:'variable',
				prev: '#prevBlog',
				next: '#nextBlog',
				auto: false,
				swipe: {
					onTouch : true
				},
				items: {
					width: 220,
					height: 'auto',	//	optionally resize item-height
					visible: {
						min: 1,
						max: 3
					}
				},
				scroll: {
					items:3,
					duration  : 1000   //  The duration of the transition.
				}
			});
	}

// /blog
	function removeApear(element){
		var id_tab = element.attr('id').substring(4);
		var tab = '#tabs-'+id_tab;
		if(touch == false){
            var that = $(tab);
            var items = that.find('.not-animated');
            items.removeClass('not-animated').unbind('appear');

            items = that.find('.animated');
            items.removeClass('animated').unbind('appear');
          }
	}

	function initCarouselMobile() {
	        {foreach from=$tabsFull item=tabFull_unique name=tabfull_unique }
				$('#carousel{$tabFull_unique->id_tab}').carouFredSel({
					responsive: true,
					onWindowResize: 'debounce',
					width: '100%',
					height:'variable',
					prev: '#prev{$tabFull_unique->id_tab}',
					next: '#next{$tabFull_unique->id_tab}',
					auto: false,
					swipe: {
						onTouch : false
					},
					items: {
						width: 320,
						height: 'auto',	//	optionally resize item-height
						visible: {
							min: 1,
							max: 2
						}
					},
					scroll: {
						items:1,
						direction : 'left',    //  The direction of the transition.
						duration  : 300   //  The duration of the transition.
					}
				});
	{/foreach}
	}

	function initCarouselBlogMobile() {
			$('#carousel-blogpost').carouFredSel({
					responsive: true,
					onWindowResize: 'debounce',
					width: '100%',
					height:'variable',
					prev: '#prevBlog',
					next: '#nextBlog',
					auto: false,
					swipe: {
						onTouch : false
					},
					items: {
						width: 320,
						height: 'auto',	//	optionally resize item-height
						visible: {
							min: 1,
							max: 2
						}
					},
					scroll: {
						items:1,
						direction : 'left',    //  The direction of the transition.
						duration  : 300   //  The duration of the transition.
					}
				});
	}

	function isMobile()
	{
		if(navigator.userAgent.match(/(iPhone)|(iPod)|(Android)|(webOS)|(iPad)|(BlackBerry)|(Windows Phone)|(Opera Mini)|(IEMobile)|(Nokia)|(MeeGo)/i)){
			return true;
		}else{
			return false;
		}

	}

</script>
