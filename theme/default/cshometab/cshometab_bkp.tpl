<!-- CS Home Tab module -->
<div class="home_top_tab">
{if count($tabs) > 0}
<div id="tabs">
	{foreach from=$tabs item=tab name=tabs}
	<div class="box1">
	<div class="title"><h3><a href="{$tab->view_more}">{$tab->title[(int)$cookie->id_lang]}</a></h3></div>	
	<div class="tabs-carousel" id="tabs-{$smarty.foreach.tabs.iteration}">
		<div class="cycleElementsContainer" id="cycle-{$smarty.foreach.tabs.iteration}">
			
			<div id="elements-{$smarty.foreach.tabs.iteration}">
				{if count($tab->product_list)>0}
				<div class="list_carousel responsive">
					<ul id="carousel{$smarty.foreach.tabs.iteration}" class="product-grid" style="height:300px;display:block;overflow:hidden">
					{foreach from=$tab->product_list item=product name=product_list key=delay}
					
						<li class="ajax_block_product not-animated" data-animate="bounceIn" data-delay="{$delay*200}">
							<div class="p_content">
								<div class="image">
									<a href="{$product.link}" title="" class="product_image">
										<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'prod_slider_home')}" alt="{$product.name|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}" />
									</a>
									
									{if $product.specific_prices}
										
											{if $product.specific_prices.reduction>0}
												{if $product.specific_prices.reduction_type == 'percentage'}
													
													<span class="on_sale">
														<span class="percen">
															-{$product.specific_prices.reduction*100}%
														</span>
													</span>
													
												{else}
												
													<span class="on_sale">
														<span class="amount">
														-{convertPrice price=$product.reduction}
														</span>
													</span>
												
												{/if}
											
										{/if}
									{else}
										{if $product.new==1}
											<span class="new"><span>{l s='Novo'}</span></span>
										{/if}
									{/if}
								</div>
								{*<div class="name_product">
									<h3>
									<a href="{$product.link}" title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|truncate:250:'...'|escape:'htmlall':'UTF-8'}</a>
									</h3>
								</div>*}
								<div class="name_product"><h3><a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|escape:'htmlall':'UTF-8'|truncate:245:'...'}</a></h3></div>
								{if isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}{if ($product.allow_oosp || $product.quantity > 0)}
									<span class="availability">{l s='Disponível'}</span>{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}<span class="availability">{l s='Disponível'}</span>{else}
									<span class="cs_out_of_stock">{l s='Indisponível'}</span>{/if}
								{/if}
								{if isset($product.online_only) && $product.online_only}
									<span class="online_only">{l s='Online only!'}</span>
								{/if}
								
								{if $product.ratting>0}	
								<p class="product_desc">{$product.description_short|strip_tags:'UTF-8'|truncate:250:'...'}</p>
								{else}
								<p class="product_desc">{$product.description_short|strip_tags:'UTF-8'|truncate:250:'...'}</p>
								{/if}
								
								{if $product.ratting>0}	
									<div class="star_content clearfix">
										{section name="i" start=0 loop=5 step=1}
											{if $product.ratting le $smarty.section.i.index}
												<div class="star"></div>
											{else}
												<div class="star star_on"></div>
											{/if}
										{/section}
									</div>
								{/if}
								
								<div class="content_price">
								
								<!-- Adicionado por mauro e modificado para preços de produtos indisponiveis não aparecerem-->
									{if ($product.allow_oosp || $product.quantity > 0)}
									{if !$product.reduction and $product.preco_ilusorio >0}
									<span class='price old'>{convertPrice price=$product.preco_ilusorio}</span>
									{/if}								
								
								
								
									{if $product.reduction}
									<span class="price old">
									{convertPrice price=$product.price_without_reduction}</span>{/if}	
									{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
									<span class="price {if $product.reduction}{/if}">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>	
									{/if} 
									{/if}
								</div>
								{*{if ($product.id_product_attribute == 0 OR (isset($add_prod_display) AND ($add_prod_display == 1))) AND $product.available_for_order == 1 AND !isset($restricted_country_mode) AND $product.minimal_quantity == 1 AND $product.customizable != 2 AND !$PS_CATALOG_MODE} 
								{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
									
									{if ($product.quantity > 0 OR $product.allow_oosp)}
									<a class="csbutton ajax_add_to_cart_button csdefault" rel="ajax_id_product_{$product.id_product}" href="{$link->getPageLink('cart.php')}?qty=1&amp;id_product={$product.id_product}&amp;token={$static_token}&amp;add" title=""><span class="in_button">{l s='Add to cart' mod='cshometab'}</span></a>
									{else}
									<span class="csbutton cssecond">{l s='Out of stock' mod='cshometab'}</span>
									{/if}
								{else}
									
									<!-- Adicionado por Daiane -->
									{if ($product.id_product_attribute != 0 && $product.available_for_order && $product.minimal_quantity <= 1)}
										{if ($product.allow_oosp || $product.quantity > 0)}
											{if isset($static_token)}
												<a class="csbutton ajax_add_to_cart_button csdefault" rel="ajax_id_product_{$product.id_product}" href="{$link->getPageLink('cart.php')}?qty=1&amp;id_product={$product.id_product}&amp;token={$static_token}&amp;add" title=""><span class="in_button">{l s='Add to cart' mod='cshometab'}</span></a>
											{else}
												<span class="csbutton cssecond">{l s='Out of stock' mod='cshometab'}</span>
											{/if}						
										{else}
											<span class="csbutton cssecond">{l s='Out of stock' mod='cshometab'}</span>
										{/if}
										{else}
										<div style="height:23px;"></div>
									{/if}
									
									
								{/if}*}
							
							</div>
					</li>
					{/foreach}
					</ul>
					<div class="cclearfix"></div>
					{if count($tab->product_list)>4}
						<div class="control">
							<a id="prev{$smarty.foreach.tabs.iteration}" class="prev" href="#">&lt;</a>
							<a id="next{$smarty.foreach.tabs.iteration}" class="next" href="#">&gt;</a>
						</div>
					{/if}
				</div>
				
					{if isset($tab->sub_category)}
					<div class="sub_category">
					<h6 data-animate="fadeInUp" data-delay="100">{l s='Sub category' mod='cshometab'}</h6>
					{foreach from=$tab->sub_category item=sub_cat name=sub_cat key=delay}
						<a href="{$sub_cat.link_sub_cat}" data-animate="fadeInUp" data-delay="{$delay*150}">{$sub_cat.name}</a>
						{if !$smarty.foreach.sub_cat.last}<span class="opa" data-animate="fadeInUp" data-delay="{$delay*160}">&nbsp;|&nbsp;</span>{/if}
					{/foreach}
					</div>
					{else}
					<a class="csbutton cssecond" style="margin:10px;display:block;width:80px;" href="{$tab->view_more}">VER MAIS</a>
					{/if}
				
				{/if} 
			</div>
		</div>
	</div> 
	</div>
	{/foreach}
</div>
<script type="text/javascript">
	$(window).load(function() {
		if(!isMobile())
		{
			initCarousel();
		}
		else
		{
			initCarouselMobile()
		}
		$('.home_top_tab .prev, .home_top_tab .next').click(function(){
			return removeApear($(this));});

	});
	
	function initCarousel() {
		{foreach from=$tabs item=tab name=tabs}		
		//	Responsive layout, resizing the items
		$('#carousel{$smarty.foreach.tabs.iteration}').carouFredSel({
			responsive: true,
			onWindowResize: 'debounce',
			width: '100%',
			height:'variable',
			prev: '#prev{$smarty.foreach.tabs.iteration}',
			next: '#next{$smarty.foreach.tabs.iteration}',
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
	{foreach from=$tabs item=tab name=tabs}
	//	Responsive layout, resizing the items
	$('#carousel{$smarty.foreach.tabs.iteration}').carouFredSel({
		responsive: true,
		onWindowResize: 'debounce',
		width: '100%',
		height:'variable',
		prev: '#prev{$smarty.foreach.tabs.iteration}',
		next: '#next{$smarty.foreach.tabs.iteration}',
		auto: false,
		swipe: {
			onTouch : true
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
	
	function isMobile() 
	{
		if(navigator.userAgent.match(/(iPhone)|(iPod)/i)){
				return true;
		}
		else
		{
			return false;
		}
		
	}
</script>
{/if}
</div>
<!-- /CS Home Tab module -->
