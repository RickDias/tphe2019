{capture name=path}{l s='Novidade'}{/capture}
{include file="{$tpl_dir}breadcrumb.tpl"}

<div class="boxus"><h1>Novidades Ferramentas</h1></div>

{if $products}
	<div class="content_sortPagiBar top">
		<div class="sortPagiBar clearfix">
			<div style="display:none">{include file="{$tpl_dir}product-compare.tpl"}</div>
			{include file="{$tpl_dir}product-sort.tpl"}
			<div style="display:none">{include file="{$tpl_dir}nbr-product-page.tpl"}</div>
		</div>
	</div>

	{include file="{$tpl_dir}product-list.tpl" products=$products}

	<div class="content_sortPagiBar bottom">

		<div style="display:none">{include file="{$tpl_dir}pagination.tpl" paginationId='bottom'}</div>
	</div>
	{else}
	<p class="warning">{l s='Nenhum produto encontrado!'}</p>
{/if}
