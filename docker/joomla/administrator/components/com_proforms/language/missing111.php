<?php/*** @name MOOJ Proforms * @version 1.0* @package proforms* @copyright Copyright (C) 2008-2010 Mad4Media. All rights reserved.* @author Dipl. Inf.(FH) Fahrettin Kutyol* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.mad4media.de Mad4Media Software Development - Softwareentwicklung* Please note that some Javascript files are not under GNU/GPL License.* These files are under the mad4media license* They may edited and used infinitely but may not repuplished or redistributed.  * For more information read the header notice of the js files.**/	/**  MISSING LANGUAGE PARTS FOR BUILD 111 IN ENGLISH. NEEDS TO BE ADDED AND TRANSLATED IN YOUR NATIVE LANGUAGE FILE */	defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );		//New to Proforms V1.3	define('M4J_LANG_CUSTOMIZE','Customize');	define('M4J_LANG_SUBMISSIONFEATURES','Submission Features');	define('M4J_LANG_JOBS_INTROTEXT_CUSTOMIZE','In this section you can customize special features of the form.');	define('M4J_LANG_CAPTCHA_INFO','Determine if you like to use captcha for the form');	define('M4J_LANG_ALIGN_SUBMITAREA','Align Submitarea');	define('M4J_LANG_LEFT','Left');	define('M4J_LANG_CENTER','Center');	define('M4J_LANG_RIGHT','Right');	define('M4J_LANG_SUBMIT_TEXT','Submit Text');	define('M4J_LANG_SUBMIT_TEXT_INFO','You can apply a custom text for the submit button. If you leave this blank the default text will be used.');	define('M4J_LANG_USE_RESET','Use Reset');	define('M4J_LANG_RESET_TEXT','Reset Text');	define('M4J_LANG_RESET_TEXT_INFO','You can apply a custom text for the reset button. If you leave this blank the default text will be used.');	define('M4J_LANG_USE_META_TITLE','Use Meta-Title');	define('M4J_LANG_USE_META_TITLE_DESC','By this option you can turn off the useage of a meta title for this form. This can be necessary if you display the form via the form in content plugin and just want to use the article\'s Meta Title.');	define('M4J_LANG_HELPDESK_404','If you get an 404 error while connecting to the helpdesk, please change your browser\'s security settings to ALLOW cookie usage inside of iFrames!');	define('M4J_LANG_IS_TEXTAREA_MAXCHARS','JavaScript max chars?');	define('M4J_LANG_IS_TEXTAREA_MAXCHARS_DESC','Maximum character limitation isn\'t given for text areas by default HTML4. By this option you can use JavaScript for applying a limitation. Enter the maximum characters in the appropriate field below.');	define('M4J_LANG_PLEASE_SELECT_OPTION','Please select option text');	define('M4J_LANG_PLEASE_SELECT_OPTION_DESC','You can apply a custom text for the `Please select` option. If you leave this field blank the system text will be used.');	define('M4J_LANG_FEED_OPTIONS','Feed options');	define('M4J_LANG_FEED_OPTIONS_DESC','By this feature you can generate options out of lists.');		define('M4J_LANG_ASK_EMPTY_OPTIONS','Do you really want to remove all options?');	define('M4J_LANG_REPLACE','Replace');	define('M4J_LANG_FEED_SINGLE','Single value separated by line breaks.');	define('M4J_LANG_FEED_SINGLE_SEMICOLON','Single value separated by semicolons.');	define('M4J_LANG_FEED_MULTI','Text and differing value separated by semicolon and option items separated by line breaks.');	define('M4J_LANG_FEED_MULTI_COMMA','Text and differing value separated by comma and option items separated by line breaks.');	define('M4J_LANG_FEED_PARSE_TYPE','List Type');	define('M4J_LANG_FEED_ADD_TYPE','Adding Type');	define('M4J_LANG_LIST','List');	define('M4J_LANG_GENERATE','Generate');	define('M4J_LANG_ADD_OPTION_DESC','Adds an empty option mask at the end of the option list.');	define('M4J_LANG_OPTIONS_DATA_TYPE_MANUAL','Enter options manually');	define('M4J_LANG_OPTIONS_DATA_TYPE_SQL','Generate options out of a SQL query');	define('M4J_LANG_OPTIONS_SQL_WARNING','WARNING! YOU NEED TO BE ADVANCED IN SQL FOR USING THIS FEATURE! MISAPLICATION CAN LEAD TO CRASHES!');	define('M4J_LANG_OPTIONS_SQL_DESC','SQL queries are applying only for the Joomla database.<br/>Your SQL query must return two values for the text and value. The names of the variables must be `text` and `value`.<br/>Please study the examples below.');	define('M4J_LANG_TAX','Tax');	define('M4J_LANG_TAXTYPE','Tax Type');	define('M4J_LANG_OVERALL','Overall');	define('M4J_LANG_TAXFIXED','Fixed per unit');	define('M4J_LANG_PERCENT','Percent');	define('M4J_LANG_PAYPAL_ADDITIONAL_INFO','You can use alias placeholders for using sumbission values instead of fixed values.<br/>You can use the alias placeholders on all input fields but not `Currency code`, `Tax Type` and `Language code`.<br/>E.g. if you have created a form element for quantity and the form element\'s alias is ` qty ` you can place the alias placeholder ` {qty} ` at the quantity field below.');			?>