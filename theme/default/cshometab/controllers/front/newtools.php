<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class cshometabNewToolsModuleFrontController extends ModuleFrontController 
{

    public $auth = FALSE;
    public $authRedirection = 'newtools';
    public $ssl = FALSE;
    public $direction;

    protected $_module = NULL;

    public function __construct()
    {
        parent::__construct();

        $this->context = Context::getContext();
    }

    public function getModule()
    {
        if (is_NULL($this->_module)) {
            $this->_module = new cshometab;
        }

        return $this->_module;
    }

    protected function l($string, $class = 'newtools', $addslashes = FALSE, $htmlentities = TRUE)
    {
        return $this->getModule()->l($string, $class, $addslashes, $htmlentities);
    }

    public function init()
    {
        parent::init();
        //require_once ($this->module->getLocalPath() . 'includer.php');
    }

    public function initContent()
    {
        parent::initContent();

   		$this->productSort();
		$nbProducts = Product::getNewProductsTools($this->context->language->id, null, null, true);
		$this->pagination($nbProducts);


		$products = Product::getNewProductsTools((int)$this->context->language->id, (int)$this->p - 1, (int)$this->n, false,'date_add', 'DESC');
		$this->addColorsToProductList($products);

		$this->context->smarty->assign(array(
			'products' => $products,
			'add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
			'testimonials_tpl_dir' => _PS_ROOT_DIR_ . '/modules/cshometab/views/templates/front',
			'theme_uri' => _THEME_DIR_,
			'nbProducts' => $nbProducts,
			'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
			'comparator_max_item' => Configuration::get('PS_COMPARATOR_MAX_ITEM')
		));

        $this->setTemplate('newtools.tpl');
    }

 

}