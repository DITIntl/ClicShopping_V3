<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT
   * @licence MIT - Portion of osCommerce 2.4
   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */


  namespace ClicShopping\Apps\Configuration\ProductsLength\Classes\ClicShoppingAdmin;

  use ClicShopping\OM\Registry;

  class ProductsLengthAdmin extends \ClicShopping\Apps\Configuration\ProductsLength\Classes\Shop\ProductsLength
  {

    protected $products_length_classes = [];
    protected $precision = 2;

    public function __construct($precision = null)
    {
    }

    public static function getTitle($id, $language_id = null)
    {
      return parent::getTitle($id, $language_id);
    }

    public static function getClasses()
    {
      return parent::getClasses();
    }

    public function display($value, $class)
    {
      return parent::display($value, $class);
    }

    /**
     * Drop down of the class title
     *
     * @param string $parameters , $selected
     * @return string $select_string, the drop down of the title class
     * @access public
     *
     */
    public static function getClassesPullDown(): array
    {
      $CLICSHOPPING_Language = Registry::get('Language');
      $CLICSHOPPING_Db = Registry::get('Db');

      $Qclasses = $CLICSHOPPING_Db->prepare('select products_length_class_id, 
                                                    products_length_class_title 
                                              from :table_products_length_classes 
                                              where language_id = :language_id 
                                              order by products_length_class_title
                                            ');
      $Qclasses->bindInt(':language_id', $CLICSHOPPING_Language->getID());
      $Qclasses->execute();

      while ($Qclasses->fetch() !== false) {
        $classes[] = ['id' => $Qclasses->valueInt('products_length_class_id'),
          'text' => $Qclasses->value('products_length_class_title')
        ];
      }

      return $classes;
    }

    /**
     * Display a products_length title
     *
     * @param int $id the products_length_class_id
     * @param string $result length title
     * @access public
     */
    public static function getLengthProductsTitle(int $id = null): string
    {
      $CLICSHOPPING_Db = Registry::get('Db');
      $CLICSHOPPING_Language = Registry::get('Language');

      if (!is_null($id)) {
        $Qlength = $CLICSHOPPING_Db->prepare('select products_length_class_title
                                               from :table_products_length_classes
                                               where products_length_class_id = :products_length_class_id
                                               and language_id = :language_id
                                               ');
        $Qlength->bindInt(':products_length_class_id', $id);
        $Qlength->bindInt(':language_id', $CLICSHOPPING_Language->getID());

        $Qlength->execute();

        $result = $Qlength->value('products_length_class_title');

        return $result;
      }
    }
  }