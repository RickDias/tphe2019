{*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{capture name=path}{l s='Novidades em Arduino/Raspberry'}{/capture}
{include file="{$tpl_dir}breadcrumb.tpl"}

<div class="boxus"><h1>{l s='Novidades Arduino e Robótica'}</h1></div>

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
