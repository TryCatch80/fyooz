<?php
/**
 *
 *
 * This is the helper apphtml.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2010-04-16 19:42:38 -0500 (Fri, 16 Apr 2010) $
 * $Revision: 1784 $
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

 class appHTML
 {
     var $_html = null;

     function __construct()
     {
        $this->setHTML();
     }

     function setHTML($value=true)
     {
         $this->_html = $value;
     }

     function isHTML()
     {
         return $this->_html;
     }

     function outTitle($text)
     {
         if ($this->isHTML())
            $result = '<tr><th style="font-size: 16; font-family: arial,helvetica,sans-serif;" colspan="2"><br/>'.$text.'<br/><br/></th></tr>'."\n";
         else
            $result = $text."\n";
         return $result;
     }

     function outHeader($text)
     {
         if ($this->isHTML())
            $result = '<tr><td style="font-weight: bold; font-family: arial,helvetica,sans-serif; font-size: 14px;" colspan="2"><br/>'.$text.'<br/><br/></td></tr>'."\n";
         else
            $result = $text."\n";
         return $result;
     }

     function outCombo($field,$value)
     {
         if ($this->isHTML())
            $result = '<tr><td style="font-family: arial,helvetica,sans-serif; font-size: 12px; font-weight: bold; padding:3px 15px 0 0;" valign="top" width="10%" nowrap="nowrap">'.$field.'</td><td valign="top">'.$value.'</td>'."\n";
         else
            $result = $field.": ".$value."\n";
         return $result;
     }
     function outField($text)
     {
         if ($this->isHTML())
            $result = '<tr><td style="font-weight: bold; font-family: arial,helvetica,sans-serif; font-size: 12px;" colspan="2">'.$text.'</td></tr>'."\n";
         else
            $result = $text."\n";
         return $result;
     }
     function outValue($text,$link=null)
     {
         if ($link) $text = '<a href="'.$link.'">'.$text.'</a>';
         if ($this->isHTML())
            $result = '<tr><td style="font-family: arial,helvetica,sans-serif; font-size: 12px;" colspan="2">'.$text.'</td></tr>'."\n";
         else
            $result = $text."\n";
         return $result;
     }
 }