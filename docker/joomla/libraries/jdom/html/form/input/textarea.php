<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <     JDom Class - Cook Self Service library    |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.5
* @package		Cook Self Service
* @subpackage	JDom
* @license		GNU General Public License
* @author		Jocelyn HUARD
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


class JDomHtmlFormInputTextarea extends JDomHtmlFormInput
{
	var $level = 4;			//Namespace position
	var $last = true;		//This class is last call

	var $cols;
	var $rows;

	/*
	 * Constuctor
	 * 	@namespace 	: requested class
	 *  @options	: Configuration
	 * 	@dataKey	: database field name
	 * 	@dataObject	: complete object row (stdClass or Array)
	 * 	@dataValue	: value  default = dataObject->dataKey
	 * 	@domID		: HTML id (DOM)  default=dataKey
	 *
	 *
	 * 	@cols		: Textarea width (in caracters)
	 * 	@rows		: Textarea height (in caracters)
	 * 	@domClass	: CSS class
	 * 	@selectors	: raw selectors (Array) ie: javascript events
	 */
	function __construct($args)
	{

		parent::__construct($args);

		$this->arg('cols'		, 6, $args, '32');
		$this->arg('rows'		, 7, $args, '4');
		$this->arg('domClass'	, 8, $args);
		$this->arg('selectors'	, 9, $args);


	}

	function build()
	{
		$html =	'<textarea id="<%DOM_ID%>" name="<%INPUT_NAME%>"<%STYLE%><%CLASS%><%SELECTORS%>'
			.	' cols="' . $this->cols . '"'
			.	' rows="' . $this->rows . '"'
			.	'>'
			.	'<%VALUE%>'
			.	'</textarea>' .LN
			.	'<%VALIDOR_ICON%>'.LN
			.	'<%MESSAGE%>';


		return $html;
	}


}