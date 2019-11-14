<?php

class TabClass extends ObjectModel
{
	public $id_tab;
	public $product_type;
	public $position;
	public $display;
	public $title;
	public $product_type_menu;
	public $product_list = false;
	public $usetax;

	public static $definition = array(
		'table' => 'cshometab',
		'primary' => 'id_tab',
		'multilang' => true,
		'multilang_shop' => true,
		'fields' => array(
			// Lang fields
			'title' =>			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => true, 'size' => 255),
			//Shop fields
			'product_type' => 	array('type' => self::TYPE_STRING,'shop' => true, 'validate' => 'isString', 'size' => 100),
			'position' =>		array('type' => self::TYPE_INT,'shop' => true, 'validate' => 'isunsignedInt'),
			'display'  => 		array('type' => self::TYPE_BOOL,'shop' => true),
		)
	);

	public	function __construct($id_tab = null, $id_lang = null, $id_shop = null, Context $context = null)
	{
		parent::__construct($id_tab, $id_lang, $id_shop);
		$this->product_type_menu = (int)(preg_replace("/[^0-9]/", '', $this->product_type));
		Shop::addTableAssociation('cshometab', array('type' => 'shop'));
		Shop::addTableAssociation('cshometab_lang', array('type' => 'fk_shop'));
	}
	public function copyFromPost()
	{
		foreach ($_POST AS $key => $value)
			if (key_exists($key, $this) AND $key != 'id_'.$this->table)
				$this->{$key} = $value;
		$this->product_type_menu = Tools::getValue('categories-tree');
		if($this->product_type == "choose_the_category")
			$this->product_type .= '_'.$this->product_type_menu;

		if (sizeof($this->fieldsValidateLang))
		{
			$languages = Language::getLanguages(false);
			foreach ($languages AS $language)
				foreach ($this->fieldsValidateLang AS $field => $validation)
					if (isset($_POST[$field.'_'.(int)($language['id_lang'])]))
						$this->{$field}[(int)($language['id_lang'])] = $_POST[$field.'_'.(int)($language['id_lang'])];
		}

	}
	public function add($autodate = true, $null_values = false)
	{
		parent::add($autodate, true);
		if (Shop::getContext() != Shop::CONTEXT_SHOP)
		{
			foreach (Shop::getContextListShopID() as $id_shop)
			{
				$this->updatePositionMax($id_shop);
			}

		}
		else
		{
			$id_shop = (int)Context::getContext()->shop->id;
			$this->updatePositionMax($id_shop);
		}
	}

	public function updatePositionMax($id_shop)
	{
		$sql = 'UPDATE `'._DB_PREFIX_.'cshometab_shop`
					SET `position`='.$this->getNextPosition($id_shop).'
					WHERE `id_shop` = '.$id_shop.' AND `id_tab`='.(int)($this->id);
		$result = (Db::getInstance()->Execute('
					UPDATE `'._DB_PREFIX_.'cshometab_shop`
					SET `position`='.$this->getNextPosition($id_shop).'
					WHERE `id_shop` = '.$id_shop.' AND `id_tab`='.(int)($this->id)));
		return $result;
	}

	public static function getNextPosition($id_shop)
	{
		$max = Db::getInstance()->getValue('SELECT MAX(position)+1 FROM `'._DB_PREFIX_.'cshometab_shop` WHERE '.($id_shop ? ' `id_shop` = '.$id_shop : '1').' ');
		return ($max ? $max : 0);
	}

	public function validateController($htmlentities = true)
	{
		$errors = array();

		if($this->product_type == "choose_the_category_" AND (!isset($this->product_type_menu) or $this->product_type_menu == ""))
			$errors[] = '<b>Get Product From</b>: '.Tools::displayError('Choose a category.');

		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$field = "title";
		if (!$this->{$field} OR !sizeof($this->{$field}) OR ($this->{$field}[$defaultLanguage] !== '0' AND empty($this->{$field}[$defaultLanguage])))
			$errors[] = '<b>Title</b> '.Tools::displayError('is empty for default language.');

		$validate = new Validate();
		foreach ($this->fieldsValidateLang as $fieldArray => $method)
		{
			if (!is_array($this->{$fieldArray}))
				continue ;
			foreach ($this->{$fieldArray} as $k => $value)
				if (!method_exists($validate, $method))
					die (Tools::displayError('Validation function not found.').' '.Tools::safeOutput($method));
				elseif (!empty($value) AND !call_user_func(array('Validate', $method), $value))
				{
					$errors[] = Tools::displayError('The following field is invalid according to the validate method ').'<b>'.$method.'</b>:<br/> ('.self::displayFieldName($fieldArray, get_class($this), $htmlentities).' = '.$value.' '.Tools::displayError('for language').' '.$k;
				}
		}

		return $errors;
	}

	public function updatePosition($way, $position)
	{
		if (!isset($position))
			return false;
			$id = (int)Context::getContext()->shop->id;
			$id_shop = $id ? $id: Configuration::get('PS_SHOP_DEFAULT');
			$tab_move = Db::getInstance()->getRow(
					'SELECT ts.* FROM `'._DB_PREFIX_.'cshometab_shop` ts
					WHERE (ts.id_shop = '.(int)$id_shop.')
					AND ts.`id_tab` = '.(int)($this->id_tab));

			$result = (Db::getInstance()->Execute('
				UPDATE `'._DB_PREFIX_.'cshometab_shop`
				SET `position`= `position` '.($way ? '- 1' : '+ 1').'
				WHERE `id_shop` = '.$id_shop.' AND `position`
				'.($way
					? '> '.(int)($tab_move['position']).' AND `position` <= '.(int)($position)
					: '< '.(int)($tab_move['position']).' AND `position` >= '.(int)($position)))
			AND Db::getInstance()->Execute('
				UPDATE `'._DB_PREFIX_.'cshometab_shop`
				SET `position` = '.(int)($position).'
				WHERE `id_shop` = '.$id_shop.' AND `id_tab`='.(int)($this->id_tab)));
		return $result;
	}

	public function updateStatus($status)
	{
		$id = (int)Context::getContext()->shop->id;
		$id_shop = $id ? $id: Configuration::get('PS_SHOP_DEFAULT');
		if (!isset($status))
			return false;
		if($status == 0)
			$status = 1;
		else
			$status = 0;
		$result = (Db::getInstance()->Execute('
			UPDATE `'._DB_PREFIX_.'cshometab_shop`
			SET `display`='.$status.'
			WHERE `id_shop` = '.$id_shop.' AND `id_tab`='.(int)($this->id_tab)));
		return $result;
	}


	public static function cleanPositions()
	{
		$return = true;
		$id = (int)Context::getContext()->shop->id;
		$id_shop = $id ? $id: Configuration::get('PS_SHOP_DEFAULT');
		$result = Db::getInstance()->ExecuteS('
		SELECT `id_tab`
		FROM `'._DB_PREFIX_.'cshometab_shop`
		WHERE `id_shop` = '.$id_shop.'
		ORDER BY `position`');
		$sizeof = sizeof($result);
		for ($i = 0; $i < $sizeof; $i++){
				$sql = '
				UPDATE `'._DB_PREFIX_.'cshometab_shop`
				SET `position` = '.(int)($i).'
				WHERE `id_shop` = '.$id_shop.' AND `id_tab` = '.(int)($result[$i]['id_tab']);
				//echo $sql;
				$return &= Db::getInstance()->Execute($sql);
			}
		//die();
		return $return;
	}

	public function delete()
	{
		parent::delete();
		$this->cleanPositions();
	}

	/*get ratting*/
	/**
	 * Get Grade By product
	 *
	 * @return array Grades
	 */
	public static function getGradeByProduct($id_product, $id_lang)
	{
		if (!Validate::isUnsignedId($id_product) ||
			!Validate::isUnsignedId($id_lang))
			die(Tools::displayError());
		$validate = Configuration::get('PRODUCT_COMMENTS_MODERATE');


		return (Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT pc.`id_product_comment`, pcg.`grade`, pccl.`name`, pcc.`id_product_comment_criterion`
		FROM `'._DB_PREFIX_.'product_comment` pc
		LEFT JOIN `'._DB_PREFIX_.'product_comment_grade` pcg ON (pcg.`id_product_comment` = pc.`id_product_comment`)
		LEFT JOIN `'._DB_PREFIX_.'product_comment_criterion` pcc ON (pcc.`id_product_comment_criterion` = pcg.`id_product_comment_criterion`)
		LEFT JOIN `'._DB_PREFIX_.'product_comment_criterion_lang` pccl ON (pccl.`id_product_comment_criterion` = pcg.`id_product_comment_criterion`)
		WHERE pc.`id_product` = '.(int)$id_product.'
		AND pccl.`id_lang` = '.(int)$id_lang.
		($validate == '1' ? ' AND pc.`validate` = 1' : '')));
	}

	/**
	 * Return number of comments and average grade by products
	 *
	 * @return array Info
	 */
	public static function getGradedCommentNumber($id_product)
	{
		if (!Validate::isUnsignedId($id_product))
			die(Tools::displayError());
		$validate = (int)Configuration::get('PRODUCT_COMMENTS_MODERATE');

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
		SELECT COUNT(pc.`id_product`) AS nbr
		FROM `'._DB_PREFIX_.'product_comment` pc
		WHERE `id_product` = '.(int)($id_product).($validate == '1' ? ' AND `validate` = 1' : '').'
		AND `grade` > 0');
		return (int)($result['nbr']);
	}

	public static function getAveragesByProduct($id_product, $id_lang)
	{
		/* Get all grades */
		$grades = TabClass::getGradeByProduct((int)$id_product, (int)$id_lang);
		$total = TabClass::getGradedCommentNumber((int)$id_product);
		if (!count($grades) || (!$total))
			return array();

		/* Addition grades for each criterion */
		$criterionsGradeTotal = array();
		$count_grades = count($grades);
		for ($i = 0; $i < $count_grades; ++$i)
			if (array_key_exists($grades[$i]['id_product_comment_criterion'], $criterionsGradeTotal) === false)
				$criterionsGradeTotal[$grades[$i]['id_product_comment_criterion']] = (int)($grades[$i]['grade']);
			else
				$criterionsGradeTotal[$grades[$i]['id_product_comment_criterion']] += (int)($grades[$i]['grade']);

		/* Finally compute the averages */
		$averages = array();
		foreach ($criterionsGradeTotal as $key => $criterionGradeTotal)
			$averages[(int)($key)] = (int)($total) ? ((int)($criterionGradeTotal) / (int)($total)) : 0;
		return $averages;
	}
	/*end get ratting*/

	public function getProductList($nb = 10)
	{
		global $cookie;
		$usetax = '';
		//$mais_vendidos = $this -> retornamaisvendidos();
//		var_dump($mais_vendidos);

		if(strpos($this->product_type, "featured_products") !== false)
		{
			$category = new Category(Context::getContext()->shop->getCategory(), (int)Context::getContext()->language->id);
			$this->product_list = $category->getProductsHomeTab((int)Context::getContext()->language->id, 1, $nb);
			$link=new Link();
			$this->view_more=$link->getCategoryLink(2);
		}
		elseif(strpos($this->product_type, "special_products") !== false)
		{
			$aux = Product::getPricesDropHomeTab((int)($cookie->id_lang), 0, $nb, false,'id_specific_price', 'DESC');
			$count = count($aux);
			for ($x=0; $x<$count; $x++){
				$aux[$x]['link']=$aux[$x]['link'];
			}
			$this->product_list = $aux;


			$link=new Link();
			$this->view_more=$link->getPageLink("prices-drop",true)."?orderby=quantity&orderway=desc";
		}
		elseif(strpos($this->product_type, "topseller_products") !== false)
		{
			$this->product_list = ProductSale::getBestSales((int)($cookie->id_lang), 0, $nb);
			$link=new Link();
			$this->view_more=$link->getPageLink("best-sales",true);
		}
		elseif(strpos($this->product_type, "new_products") !== false)
		{
			$aux = Product::getNewProductsTools((int)($cookie->id_lang), 0, $nb, false,'date_add', 'DESC');
			$count = count($aux);
			for ($x=0; $x<$count; $x++){
				$aux[$x]['link']=$aux[$x]['link'];
			}
			$this->product_list = $aux;
			$link=new Link();
			$params = array();
			// $this->view_more=$link->getPageLink("new-products",true);
			$this->view_more=$link->getModuleLink("cshometab","newtools", $params);
		}
		elseif(strpos($this->product_type, "choose_the_category") !== false)
		{
			$cat_child=array();

			$category = new Category((int)$this->product_type_menu, (int)Context::getContext()->language->id);
			$aux = $category->getProductsHomeTab((int)($cookie->id_lang), 1, $nb);
			$count = count($aux);
			for ($x=0; $x<$count; $x++){
				if(strpos($this->product_type, "choose_the_category_363") !== false)
					$aux[$x]['link']=$aux[$x]['link'];
				else if(strpos($this->product_type, "choose_the_category_398") !== false)
					$aux[$x]['link']=$aux[$x]['link'];
				else if(strpos($this->product_type, "choose_the_category_364") !== false)
					$aux[$x]['link']=$aux[$x]['link'];
			}
			$this->product_list = $aux;

			$link=new Link();
			$this->view_more=$link->getCategoryLink((int)$this->product_type_menu);

			$cat_child=Category::getChildren((int)$this->product_type_menu,(int)(Context::getcontext()->language->id));

			if(count($cat_child)>0)
			{
				$link=new Link();
			foreach($cat_child as $key=>$child)
			{
				$cat_child[$key]["link_sub_cat"]=$link->getCategoryLink($child["id_category"],$child["link_rewrite"]);
			}
			$this->sub_category=$cat_child;
			}
		}
		elseif(strpos($this->product_type, "products_viewed") !== false)
		{
			//$this->product_list = BlockViewed::getProductsViewed((int)($cookie->id_lang), 0, $nb);
			//$link=new Link();
			//$this->view_more= '';
			//$this->_clearCache('cshometab.tpl');
			unset($this->product_list);

			//echo "<br><br>bosta";
			/*$this->product_list = BlockViewed::getProductsViewed((int)($cookie->id_lang), 0, $nb);
			$link=new Link();
			$this->view_more= '';*/

			$productsViewed = (isset($cookie->viewed) && !empty($cookie->viewed)) ? array_slice(array_reverse(explode(',', $cookie->viewed)), 0, Configuration::get('PRODUCTS_VIEWED_NBR')) : array();

			if (count($productsViewed))
			{
				$defaultCover = Language::getIsoById($cookie->id_lang).'-default';

				$productIds = implode(',', array_map('intval', $productsViewed));
				$count = count($productsViewed);
				for($i = 0; $i < $count; $i++){
					$productsImages[] = Db::getInstance()->getRow('
					SELECT MAX(image_shop.id_image) id_image, p.*, il.legend, product_shop.active, pl.name, sa.quantity, pl.description_short, pl.link_rewrite, cl.link_rewrite AS category_rewrite
					FROM '._DB_PREFIX_.'product p
					'.Shop::addSqlAssociation('product', 'p').'
					LEFT JOIN '._DB_PREFIX_.'product_lang pl ON (pl.id_product = p.id_product'.Shop::addSqlRestrictionOnLang('pl').')
					LEFT JOIN '._DB_PREFIX_.'image i ON (i.id_product = p.id_product)'.'
					LEFT JOIN '._DB_PREFIX_.'product_attribute pa ON (pa.id_product = p.id_product)'.'
					LEFT JOIN '._DB_PREFIX_.'stock_available sa ON (sa.id_product = p.id_product)'.
					Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
					LEFT JOIN '._DB_PREFIX_.'image_lang il ON (il.id_image = image_shop.id_image AND il.id_lang = '.(int)($cookie->id_lang).')
					LEFT JOIN '._DB_PREFIX_.'category_lang cl ON (cl.id_category = product_shop.id_category_default'.Shop::addSqlRestrictionOnLang('cl').')
					WHERE p.id_product = '.$productsViewed[$i].'
					AND pl.id_lang = '.(int)($cookie->id_lang).'
					AND cl.id_lang = '.(int)($cookie->id_lang).'
					GROUP BY product_shop.id_product'
					);
				}

				$productsImagesArray = array();
				foreach ($productsImages as $pi){

					if(isset($pi['id_product_attribute']))
					{
						$id_product_attribute = (int)$pi['id_product_attribute'];
					}else{
						$id_product_attribute = '';
					}

					$productsImagesArray[$pi['id_product']] = $pi;
					$productsImagesArray[$pi['id_product']]['link'] = _PS_BASE_URL_.'/'.$pi['category_rewrite'].'/'.$pi['link_rewrite'].'-'.$pi['id_product'].'.html';
					$productsImagesArray[$pi['id_product']]['quantity_all_versions'] = $pi['quantity'];
					$productsImagesArray[$pi['id_product']]['allow_oosp'] = Product::isAvailableWhenOutOfStock($pi['out_of_stock']);
					$productsImagesArray[$pi['id_product']]['reduction'] = Product::getPriceStatic((int)$pi['id_product'],(bool)$usetax, $id_product_attribute,
					6,null,true,true,1,true,null,null,null,$specific_prices);
					$productsImagesArray[$pi['id_product']]['specific_prices'] = $specific_prices;
					$productsImagesArray[$pi['id_product']]['preco_ilusorio'] = $pi['preco_ilusorio'];
					$ipa_default = Product::getDefaultAttribute($pi['id_product']);
					$productsImagesArray[$pi['id_product']]['id_product_attribute'] = $ipa_default;
					//echo "<br><br><br>".$pi['preco_ilusorio']."<br><br><br>";
					$productsImagesArray[$pi['id_product']]['price_tax_exc'] =  Product::getPriceStatic($pi['id_product'], false, null, 2);
					$productsImagesArray[$pi['id_product']]['price'] =  Product::getPriceStatic($pi['id_product'], false, null, 2);
					$productsImagesArray[$pi['id_product']]['price_without_reduction'] = Product::getPriceStatic((int)$pi['id_product'],false,
					((isset($ipa_default) && !empty($ipa_default)) ? (int)$ipa_default : null),2,null,false,false);
				}
				$this->productsViewed = count($productsViewed);

				foreach($productsImagesArray as $item)
				{
					$this->product_list[] = $item;
				}

				//var_dump($this->product_list);
				//var_dump($this->product_list);

			}
		}
		elseif(strpos($this->product_type, "arduinos_raspberry") !== false)
		{
			//echo "<br><br>bosta";
			$aux = Product::getNewProductsSpecialsHomeTab((int)($cookie->id_lang), 0, $nb, false,'date_add', 'DESC');
			$count = count($aux);
			for ($x=0; $x<$count; $x++){
				$aux[$x]['link']=$aux[$x]['link'];
			}
			$this->product_list = $aux;
			$link=new Link();
			$params = array();
			$this->view_more=$link->getModuleLink("cshometab","view", $params);
		}

		if(count($this->product_list)>0)
		{
            for($i=0;$i<count($this->product_list); $i++)
			{	$averageTotal = 0;
				//$averages=TabClass::getAveragesByProduct($this->product_list[$i]["id_product"],(int)($cookie->id_lang));
				$averages = array();
				if(count($averages)>0)
				{
					foreach ($averages as $average)
						$averageTotal += (float)($average);
					$averageTotal = count($averages) ? ($averageTotal / count($averages)) : 0;
				}
				$this->product_list[$i]["ratting"]=$averageTotal;

			}
		}

		//foreach ($this->product_list as $product)
		if(isset($this->product_list) && $this->product_list != null)
		{
			foreach ($this->product_list as &$product)
			{
				$product['prox_image'] = Product::getProxImage($product['id_product']);
			}
		}
	}

}

?>
