<?php
/**
 *
 *
 * This is the view.captcha.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2009-10-05 23:05:13 -0500 (Mon, 05 Oct 2009) $
 * $Revision: 553 $
 * $Author: jobgrok $
 *
 * @author TK Tek, LLC. info@jobgrok.com
 * @version 3.1-1.2.55
 * @package com_jobgrokapp
 *
 * @copyright Copyright {c} 2008-2014
 * @license GNU Public License Version 2
 *
 * This file is part of JobGrok.
 *
 * JobGrok is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * JobGrok is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with JobGrok.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
 *
 * Posting View
 *
 */
class JobgrokappViewApplication extends JViewLegacy

{
/**
 *
 * Renders the View
 *
 */
    function display($tpl = null)
    {
        $document = JFactory::getDocument();
  		JResponse::setHeader('Content-Disposition','attachment; filename="jobgrokaptcha.png"',true);
        $document->setMimeEncoding('image/png');
        $document->setType('image/png');
        $document->setLink('jobgrokaptcha.png');
        $this->image();
    }

    function image_old()
    {
        /*$width = 80;
        $height = 20;
		*/
		$width = 80;
        $height = 20;
        $im = @imagecreate($width, $height)
            or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 255, 255);
        //$color = imagecolorallocate($im, 150, 150, 150);
		$color = imagecolorallocate($im, 0, 0, 0);
        // $border = imageline($im, $x1, $y1, $x2, $y2, $color);
        imageline($im,0,0,0,$height-1,$color);
        imageline($im,0,$height-1,$width-1,$height-1,$color);
        imageline($im,$width-1,$height-1,$width-1,0,$color);
        imageline($im,$width-1,0,0,0,$color);
        imagestring($im, 5, 5, 2, $this->secret(), $color);
        imagepng($im);
        imagedestroy($im);
    }
	function image()
	{
	 	$width = 50;
        $height = 20;
	    $im = @imagecreate($width, $height) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 255, 255);
        $color = imagecolorallocate($im, 0, 0, 0);
        //$border = imageline($im, $x1, $y1, $x2, $y2, $color);
        //imageline($im,0,0,0,$height-1,$color);
        //imageline($im,0,$height-1,$width-1,$height-1,$color);
        //imageline($im,$width-1,$height-1,$width-1,0,$color);
        //imageline($im,$width-1,0,0,0,$color);
		$font = JURI::root().'modules/mod_qlform/captcha/fonts/LS-Bold.otf';
        imagestring($im, 5, 5, 2, $this->secret(), $color);
        imagepng($im);
        imagedestroy($im);
	}
    function secret()
    {
        $session = JFactory::getSession();
        $value = $session->get('captcha',null,'application');
        return $value;
    }
}
?>