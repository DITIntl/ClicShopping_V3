<?php
/**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT
 *  @licence MIT - Portion of osCommerce 2.4
 *  @Info : https://www.clicshopping.org/forum/trademark/
 *
 */

  use ClicShopping\OM\CLICSHOPPING;

  if ( $CLICSHOPPING_MessageStack->exists('main') ) {
    echo $CLICSHOPPING_MessageStack->get('main');
  }

  require_once($CLICSHOPPING_Template->getTemplateFiles('breadcrumb'));
?>
<section class="password_reset" id="password_reset">
  <div class="contentContainer">
    <div class="contentText">
      <div class="page-title modulesAccountCustomersPasswordResetPageHeader"><h1><?php echo CLICSHOPPING::getDef('heading_title'); ?></h1></div>
      <?php echo $CLICSHOPPING_Template->getBlocks('modules_login'); ?>
      <div class="separator"></div>
    </div>
  </div>
</section>
<?php
  require_once($CLICSHOPPING_Template->getTemplateHeaderFooter('footer'));

