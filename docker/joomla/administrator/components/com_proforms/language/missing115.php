<?php/*** @name MOOJ Proforms * @version 1.5* @package proforms* @copyright Copyright (C) 2008-2010 Mad4Media. All rights reserved.* @author Dipl. Inf.(FH) Fahrettin Kutyol* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.mad4media.de Mad4Media Software Development - Softwareentwicklung* Please note that some Javascript files are not under GNU/GPL License.* These files are under the mad4media license* They may edited and used infinitely but may not repuplished or redistributed.  * For more information read the header notice of the js files.**/	/**  MISSING LANGUAGE PARTS FOR BUILD 115 IN ENGLISH. NEEDS TO BE ADDED AND TRANSLATED IN YOUR NATIVE LANGUAGE FILE */	defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );		//New to Proforms V1.5		define('M4J_LANG_CHAR_LEFT' , 'Characters left');	define('M4J_LANG_EDITOR', 'Editor');	define('M4J_LANG_EDITOR_DESC', 'You can apply a custom editor for Proforms only.');	define('M4J_LANG_SYSTEMCONFIG', 'System configuration');	define('M4J_LANG_USE_TIMETRAP', 'Use sending time validation');	define('M4J_LANG_USE_TIMETRAP_DESC', 'If you enable sending time validation Proforms will check if a submission duration used to be shorter than the appropriate value below. If this used to be shorter the submission will be rejected because probably of being a spam bot.');		define('M4J_LANG_RESPONSIVE_LAYOUT', 'Responsive Layout');	define('M4J_LANG_NEW_RESPONSIVE_TEMPLATE_SHORT', 'New Responsive');	define('M4J_LANG_NEW_RESPONSIVE_TEMPLATE', 'New Responsive Template');	define('M4J_LANG_APPLY', 'Apply');	define('M4J_LANG_EDIT_RESPONSIVELAYOUT', 'Edit Responsive Template');	define('M4J_LANG_ASK_DELETE', 'Do you really want to delete?');	define('M4J_LANG_ADD_ROW', 'Add Row');	define('M4J_LANG_XCOLUMNS_ROW', '%s Colums / Row');	define('M4J_LANG_SLOTID', 'Unique Slot Id');	define('M4J_LANG_SLOTTITLE', 'Slot Title');	define('M4J_LANG_SLOT_CONTAINS_ELMENTS', 'Contains %s form elements');	define('M4J_LANG_FIELD_ARRANGEMENT', 'Field Arrangement');	define('M4J_LANG_LAYOUT_WIDTH_QUESTIONS', 'Division of Questions');	define('M4J_LANG_LAYOUT_WIDTH_FIELDS', 'Division of Form Elements');	define('M4J_LANG_MINHEIGHT', 'Minimum Height');	define('M4J_LANG_LAYOUTWIDTH', 'Layout Width');	define('M4J_LANG_NEW_ELEMENT', 'New Element');	define('M4J_LANG_BATCH', 'Batch');	define('M4J_LANG_DISPLAYONLY', 'Display Only');	define('M4J_LANG_DISPLAYONLY_DESC', 'Elements which are only intended to display and not for processing data');	define('M4J_LANG_ENDPOSITION', 'END-POSITION<br/>Drop your element(s) here for placing at end.');	define('M4J_LANG_QUESTIONSRIGHT', 'Question left - Field right');	define('M4J_LANG_QUESTIONSABOVE', 'Question on top - Field below');	define('M4J_LANG_NOQUESTIONRIGHT', 'No question - Field placed right (if possible)');	define('M4J_LANG_NOQUESTION', 'No question - Field placed over the whole range');	define('M4J_LANG_DROPHERETOMOVE', 'Drop your elements here for moving to this slot');	define('M4J_LANG_UNSELECTALL', 'Unselect all');	define('M4J_LANG_CONVERTTO', 'Convert to');	define('M4J_LANG_ELEMENTCONVERTNO', 'This element can not be converted to another type');	define('M4J_LANG_UNIQUEMAILEXISTS', 'There is already a unique email address assigned for this form template !');	define('M4J_LANG_UNIQUEMAIVALIDATION', 'This form element is the respresentative of the unique email address. It doesn\'t need to be validated because it always checks for a valid email address.');	define('M4J_LANG_PLACEHOLDER', 'Placeholder');	define('M4J_LANG_PLACEHOLDER_DESC', 'Proforms has own JS functions which enable placeholder support on browsers which normally do not. But please note that the JS workaround for old browsers do not apply for password fields!');	define('M4J_LANG_PLACEHOLDER_ADVICE', 'Enter a placeholder text which is displayed inside of the element while empty such as this text');	define('M4J_LANG_EMPTY_QUESTION', '[ -- No question applied - click to edit -- ]');	define('M4J_LANG_ADJUSTMENT_FORM', 'Adjustment of the form');	define('M4J_LANG_ADJUSTMENT_FORM_WIDTH', 'Form Width');	define('M4J_LANG_ADJUSTMENT_FORM_WIDTH_DESC', 'You can apply a fixed width for the form. You can use units in pixel and percent. If you leave this blank the width will be set automatically to 100% and is as wide as the content area of your Joomla template. Please note that the form templates may not be larger than the value of this width. The best (for responsive form temmplates) you apply 100% width on responsive templates.');	define('M4J_LANG_ADJUSTMENT_FORM_ALIGNMENT', 'Horizontal Alignment');	define('M4J_LANG_ADJUSTMENT_FORM_ALIGNMENT_DESC', 'If the form width is not set to 100% or the form\'s form-templates are not larger than your Joomla templates\'s width; you can set up a horizontal alignment for the whole form and its contents');		define('M4J_LANG_BATCH_HEADER', 'Batch Processing');	define('M4J_LANG_BATCH_DESC', 'Please note that `batch` only processes the selected items of the selected (visible) slot tab.<br/>If there are selected items in other (hidden) slot tabs those will not be processed.');		define('M4J_LANG_NOITEMSSELECTED', 'You must select at least one item for batch processing in this slot tab.');	define('M4J_LANG_SELECTED_ITEMS', 'Selected Items');	define('M4J_LANG_ACTIVATE', 'Activate');	define('M4J_LANG_DEACTIVATE', 'Deactivate');	define('M4J_LANG_SET_REQUIRED', 'Set to `required`');	define('M4J_LANG_SET_NOTREQUIRED', 'Set to `not required`');	define('M4J_LANG_MAIN_CSS', 'Main CSS');	define('M4J_LANG_RESPONSIVE_CSS', 'Responsive CSS');		define('M4J_LANG_PAYPAL_CONDITIONAL', 'Conditional usage');	define('M4J_LANG_PAYPAL_CONDITIONAL_DESC', 'When Paypal is enabled this function gives you an additional opportunity for using the PayPal function only if a form element has a certain value.<br/>You just can use <b>SINGLE</b> selection fields, all text input fields and the yes/no fields.If using yes/no fields the value can only be 1 or 0.<br/>You must activate this function below, enter the element id (`eid`) and set a value. If the user input matches the value the user will be redirected to Paypal.<br/> This function is intended for payment forms where you might also offer a payment by bank transfer or something similar.');	define('M4J_LANG_PAYPAL_USE_CONDITIONAL', 'Apply conditional usage');	define('M4J_LANG_PAYPAL_CONDITIONAL_EID', 'Form element id');	define('M4J_LANG_PAYPAL_CONDITIONAL_VALUE', 'Required value');		define('M4J_LANG_ONLYPRO','Only for PRO version!');	define('M4J_LANG_ONLYPRO_DESC','<span style=\'color:red; font-weight:bold\'>This function is only available for the PRO version!</span>');	define('M4J_LANG_ONLYONETEMPLATE','The Basic version allows you to assign only ONE form template. <br> In the PRO version you can compile your form from several templates!');	define('M4J_LANG_UPDATEBYINSTALL','If you like to upgrade to Proforms Advance you need to download the Advance installer package and install it over the existing Basic version.<br>YOU CAN NOT UPGRADE BY ENTERING A SERVICE KEY HERE!');		