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

  namespace ClicShopping\OM\Module\Hooks\Shop\Header;

  use ClicShopping\OM\Registry;

  class HeaderOutputBootstrap
  {
    /**
     * @return bool|string
     */
    public function display()
    {
      $CLICSHOPPING_Template = Registry::get('Template');

//Note : Could be relation with a meta tag allowing to implement a new boostrap theme : Must be installed
      if (!defined('MODULE_HEADER_TAGS_BOOTSTRAP_SELECT_THEME') || MODULE_HEADER_TAGS_BOOTSTRAP_SELECT_THEME == 'False') {
        $output = '<link rel="stylesheet preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css" integrity="sha384-vXOtxoYb1ilJXRLDg4YD1Kf7+ZDOiiAeUwiH9Ds8hM8Paget1UpGPc/KlaO33/nt" crossorigin="anonymous">' . "\n";
        $output .= '<link rel="stylesheet preload" as="style" media="screen, print" href="' . $CLICSHOPPING_Template->getTemplategraphism() . '" />' . "\n";

        return $output;
      } else {
        return false;
      }
    }
  }