<?php
/**
 * @name MOOJ Proforms
 * @version 1.5
 * @package proforms
 * @copyright Copyright (C) 2008-2013 Mad4Media. All rights reserved.
 * @author Dipl. Inf.(FH) Fahrettin Kutyol
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * Please note that some Javascript files are not under GNU/GPL License.
 * These files are under the mad4media license
 * They may edited and used infinitely but may not repuplished or redistributed.
 * For more information read the header notice of the js files.
 **/

defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

$document=JFactory::getDocument();
$document->addStyleSheet(M4J_CSS);

$this->setMetaTitle(M4J_LANG_FORM_CATEGORIES);
?>

<?php echo $this->htmlHeading(M4J_LANG_FORM_CATEGORIES); ?>
<?php echo implode("\n", $this->list); ?>
