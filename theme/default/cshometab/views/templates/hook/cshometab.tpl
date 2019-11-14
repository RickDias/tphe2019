<!-- CS Home Tab module -->
<div class="home_top_tab">
{if count($tabs) > 0}
<div id="tabs">
	{foreach from=$tabs item=tab name=tabs}
	{if count($tab->product_list)>2 and $tab->product_list != false}
	<div class="box1">

	{*<div class="title"><a href="{$tab->view_more}" id="titulo">{$tab->title[(int)$cookie->id_lang]}  <span id="seta-titulo">&gt;</span> </a></div>	*}
	<div class="title">
		{if $tab->product_type == 'products_viewed'}
		<div id="titulo">{$tab->title[(int)$cookie->id_lang]}</div>
		{else}
		<a href="{$tab->view_more}" id="titulo">{$tab->title[(int)$cookie->id_lang]}<img src="/modules/cshometab/images/hand_cshometab.png" width="30px" height="26px" style=" margin-bottom: -10px; margin-left: 5px;"></a>
		{/if}
	</div>

	<div class="tabs-carousel" id="tabs-{$tab->id_tab}">

		<div ><a id="next{$tab->id_tab}" class="button-cshometab-next" href="#"><span id="seta-next">{if $theme == 'alexia'}<span alt="next" class="seta_hometab">&raquo;</span>{else}&gt;{/if}</span></a></div>
		<div ><a id="prev{$tab->id_tab}" class="button-cshometab-prev" href="#"><span id="seta-prev">{if $theme == 'alexia'}<span alt="prev" class="seta_hometab">&laquo;</span>{else}&lt;{/if}</span></a></div>

		<div class="cycleElementsContainer" id="cycle-{$tab->id_tab}" style="margin:0 30px">

			{*<div id="elements">*}


				{if count($tab->product_list)>2 and $tab->product_list != false}
				<div class="list_carousel responsive">


					<ul id="carousel{$tab->id_tab}" class="product-grid" style="height:300px;display:block;overflow:hidden">

					{foreach from=$tab->product_list item=product name=product_list key=delay}

						<li class="ajax_block_product not-animated" data-animate="bounceIn" data-delay="{$delay*200}">
							<div class="p_content">
								<div class="image">
									<a href="{$product.link}{if ($tab->title[(int)$cookie->id_lang]) == "Mais Vendidos"}?utm_source=site&utm_medium=home_mais_vendidos&utm_content=27012015_id_produto&utm_campaign=home_mais_vendidos{/if}" title="" class="product_image">
										<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'prod_slider_home')}" alt="{$product.name|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}" width=189px height=189px
										onmouseover="this.src='{$link->getImageLink($product.link_rewrite, $product.prox_image, 'prod_slider_home')}'"
										onmouseout="this.src='{$link->getImageLink($product.link_rewrite, $product.id_image, 'prod_slider_home')}'"
										/>
									</a>
									{if ((BlackFridayUS::getEtiquetaHome({$product.id_product}))&&(BlackFridayUS::ativaBlack()))}

											<span class="etiqueta-list" >
												<span>Black Friday</span>
											</span>

									{else}
										{if $product.specific_prices}

												{if $product.specific_prices.reduction>0}
													{if $product.specific_prices.reduction_type == 'percentage'}

														<span class="on_sale" >
															<span class="percen">
																{*-{$product.specific_prices.reduction*100}% ( z * y / x - 100)*}
																{if $product.preco_ilusorio != 0}
																{$desconto = {math equation="( z * y / x - 100)" x=$product.preco_ilusorio y=100 z=$product.price}}
																{$desconto|string_format:"%d"}%
																{else}
																-{$product.specific_prices.reduction*100}%
																{/if}
															</span>
														</span>

													{else}

														<!-- <span class="on_sale" > <!-- para mostrar a redu��o em pre�o
															<span class="amount">
															{*-{convertPrice price=$product.reduction}*}
															{if $product.preco_ilusorio != 0}
															-{convertPrice price={math equation="(x - z) " x=$product.preco_ilusorio z=$product.price}}
															{else}
															-R${$product.specific_prices.reduction|string_format:"%.2f"}
															{/if}
															</span>
														</span> -->
														<span class="on_sale" >
															<span class="amount">
																{*-{$product.specific_prices.reduction*100}% ( z * y / x - 100)*}
																{if $product.preco_ilusorio != 0}
																	{*$desconto = {math equation="( z * y / x - 100)" x=$product.preco_ilusorio y=100 z=$product.price}*}
                                                                    {assign var='desc' value=(($product.price * Configuration::get('USBOLETOSICOOB_DESCONTO'))/100)}
                                                                    {assign var='precoBoleto' value=($product.price - $desc)}
                                                                    {$desconto =((($precoBoleto/$product.preco_ilusorio)-1)*100)}
																	{$desconto|string_format:"%d"}%
																{else}
																	{$desconto = {math equation="( z * y / x - 100)" x=$product.price + $product.specific_prices.reduction y=100 z=$product.price}}
																	{$desconto|string_format:"%d"}%
																{/if}
															</span>
														</span>

													{/if}

											{/if}
										{else}
											{if (isset($product.new)) && ($product.new==1)}
												<span class="new"><span>{l s='Novo'}</span></span>
											{else}
												{if (isset($product.statusvendidos)) && ($product.statusvendidos == 1)}
												<span class="more_sale"><span>{l s='Mais vendido'}</span></span>{*more_sale*}
												{/if}
												{*{if !empty($aux)}
												<span class="more_sale"><span>{l s='Mais vendido'}</span></span>more_sale
												{/if}*}
											{/if}
										{/if}
									{/if}
								</div>
								{*<div class="name_product">
									<h3>
									<a href="{$product.link}" title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|truncate:90:'...'|escape:'htmlall':'UTF-8'}</a>
									</h3>
								</div>*}
								{*{$product|var_dump}*}

                                <!--  Mais vendidos  -->


								<div class="name_product"><h3><a href="{$product.link|escape:'htmlall':'UTF-8'}{if ($tab->title[(int)$cookie->id_lang]) == "Mais Vendidos"}?utm_source=site&utm_medium=home_mais_vendidos&utm_content=27012015_id_produto&utm_campaign=home_mais_vendidos{/if}" title="{$product.name|escape:'htmlall':'UTF-8'}"> {$product.name|escape:'htmlall':'UTF-8'|truncate:90}</a></h3></div>
								{if isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}{if ($product.allow_oosp || $product.quantity > 0)}
									<span class="availability">Dispon&iacute;vel</span>{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}<span class="availability">Dispon&iacute;vel</span>{else}
									<span class="cs_out_of_stock">Indispon&iacute;vel</span>{/if}
								{/if}
								{if isset($product.online_only) && $product.online_only}
									<span class="online_only">{l s='Online only!'}</span>
								{/if}

								{if $product.ratting>0}
                                    <p class="product_desc">{*$product.description_short|strip_tags:'UTF-8'|truncate:250:'...'*}</p>
								{else}
                                    <p class="product_desc">{*$product.description_short|strip_tags:'UTF-8'|truncate:250:'...'*}</p>
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

								<!-- Adicionado por mauro e modificado para pre�os de produtos indisponiveis n�o aparecerem-->
									{if ($product.allow_oosp || $product.quantity > 0)}
										{if $product.preco_ilusorio > $product.price_without_reduction}
											<div class='clearfix price old' style="margin-bottom:-8px">{convertPrice price=$product.preco_ilusorio}</div><br>
										{/if}



										{if $product.reduction && $product.preco_ilusorio == 0}
											<span class="price old">
											{convertPrice price=$product.price_without_reduction}</span>
										{/if}
										{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
                                        {assign var='desc' value=(($product.price * Configuration::get('USBOLETOSICOOB_DESCONTO'))/100)}
                                        {assign var='precoBoleto' value=($product.price - $desc)}
                                         <span class="price {if $product.reduction}{/if}">{convertPrice price=$precoBoleto}<br><div style="font-size:12px;margin-top:-3px"> no boleto</div></span>
                                     {*<span class="price {if $product.reduction}{/if}">{if $priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>*}
										{/if}
									{/if}
								</div>
								{*{if ($product.id_product_attribute == 0 OR (isset($add_prod_display) AND ($add_prod_display == 1))) AND $product.available_for_order == 1 AND !isset($restricted_country_mode) AND $product.minimal_quantity == 1 AND $product.customizable != 2 AND !$PS_CATALOG_MODE}
								{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
									{if $product.id_product == 3687}
										<a class="csbutton csdefault" href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">Tenho Interesse</a>
									{else}
										{if ($product.quantity > 0 OR $product.allow_oosp)}
											<a class="csbutton ajax_add_to_cart_button csdefault" rel="ajax_id_product_{$product.id_product}" href="{$link->getPageLink('cart.php')}?qty=1&amp;id_product={$product.id_product}&amp;token={$static_token}&amp;add" title=""><span class="in_button">{l s='Add to cart' mod='cshometab'}</span></a>
										{else}
											<span class="csbutton cssecond">{l s='Out of stock' mod='cshometab'}</span>
										{/if}
									{/if}

								{else}

									<!-- Adicionado por Daiane -->
									{if ($product.id_product_attribute != 0 && $product.available_for_order && $product.minimal_quantity <= 1)}
										{if ($product.allow_oosp || $product.quantity > 0)}
											{if $product.id_product == 3687}
												<a class="csbutton csdefault" href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">Tenho Interesse</a>
											{else}
												{if isset($static_token)}
													<a class="csbutton ajax_add_to_cart_button csdefault" rel="ajax_id_product_{$product.id_product}" href="{$link->getPageLink('cart.php')}?qty=1&amp;id_product={$product.id_product}&amp;token={$static_token}&amp;add" title=""><span class="in_button">{l s='Add to cart' mod='cshometab'}</span></a>
												{else}
													<span class="csbutton cssecond">{l s='Out of stock' mod='cshometab'}</span>
												{/if}
											{/if}
										{else}
											<span class="csbutton cssecond">{l s='Out of stock' mod='cshometab'}</span>
										{/if}
										{else}
										<div style="height:23px;"></div>
									{/if}


								{/if}*}
								{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
								{if ($product.allow_oosp || $product.quantity > 0)}
									{if $product.id_product == 3687}
										<a class="csbutton csdefault" href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">Tenho Interesse</a>
									{else}
										{if isset($static_token)}
											<a class="csbutton ajax_add_to_cart_button csdefault" rel="ajax_id_product_{$product.id_product|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)}" title="">Comprar</a>
										{else}
											<a class="csbutton ajax_add_to_cart_button csdefault" rel="ajax_id_product_{$product.id_product|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product.id_product|intval}", false)}" title="">Comprar</a>
										{/if}
									{/if}
								{else}

								{/if}
							{/if}
							</div>
					</li>

					{/foreach}

					</ul>

					<br />

					<div class="cclearfix"></div>
					{*{if count($tab->product_list)>4}
						<div class="controle">
							<span id="aux"><a id="prev{$tab->id_tab}" class="prev" href="#">&lt;</a><a id="next{$tab->id_tab}" class="next" href="#">&gt;</a></span>
						</div>
					{/if}*}
					{if isset($tab->sub_category)}

					{*<div class="sub_category">
						<h6 data-animate="fadeInUp" data-delay="100">{l s='Sub category' mod='cshometab'}</h6>
						{foreach from=$tab->sub_category item=sub_cat name=sub_cat key=delay}
							<a href="{$sub_cat.link_sub_cat}" data-animate="fadeInUp" data-delay="{$delay*150}">{$sub_cat.name}</a>
							{if !$smarty.foreach.sub_cat.last}<span class="opa" data-animate="fadeInUp" data-delay="{$delay*160}">&nbsp;|&nbsp;</span>{/if}
						{/foreach}
					</div>*}

					{else if ($tab -> product_type == 'products_viewed')}

					{*{else}
					<a class="csbutton cssecond" style="margin:10px;display:block;width:80px;" href="{$tab->view_more}">VER TODOS</a>*}
					{/if}
				</div>



				{/if}
			{*</div>*}
		</div>

	</div>


    </div>
	{/if}
	{/foreach}
</div>
{/if}
</div>
<!-- /CS Home Tab module -->
