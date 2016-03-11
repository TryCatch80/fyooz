<?php
/**
 *
 *
 * This is the view.raw.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-03-09 19:23:16 -0500 (Sun, 09 Mar 2014) $
 * $Revision: 5850 $
 * $Author: bobsteen $
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
jimport('joomla.application.component.helper');
JLoader::import('helpers.pdf',JPATH_COMPONENT);

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
        $app = JFactory::getApplication();
        $params = $app->getPageParameters();
        
        $db = JFactory::getDBO();
        $agreement_article = $params->get('agreement_article','0');
        if ($agreement_article > 0) {
            $query = "SELECT `introtext`, `fulltext` FROM #__content WHERE id=".$agreement_article;
            $db->setQuery($query);
            $agreement = $db->loadObject();
            $agreement->introtext = JHTML::_('content.prepare',$agreement->introtext);
            $agreement->fulltext = JHTML::_('content.prepare',$agreement->fulltext);
        } else {
            $agreement = null;
        }
        
        $viewtype = 'raw';
        $options = $this->get('Options');
        // $params = JComponentHelper::getParams('com_jobgrokapp');
        $uid = $this->get('Uid');
        $id = $this->get('Id');
        $application = $this->get('Applicationbyuid');

        $this->assignRef('application', $application);
        $this->assignRef('options', $options);
        $this->assignRef('params', $params);
        $this->assignRef('viewtype', $viewtype);
        $this->assignRef('uid', $uid);
        $this->assignRef('id', $id);

        $posting_id = $this->get('PostingId');
        $this->assignRef('posting_id',$posting_id);

        $document = JFactory::getDocument();

        $pdf = JGPdf::factory('p','letter');
        $pdf->setConvertFrom($params->get('convert_from','UTF-8'));
        $pdf->setConvertTo($params->get('convert_to','ISO-8859-1'));
        $pdf->setConversion($params->get('convert_encoding','0')=='0'?false:true);        
        
        $uid = JRequest::getVar('uid',0);

        $this->assignRef('pdf',$pdf);
        $this->assignRef('uid',$uid);

        $stamp = "";
        if ($params->get('file_datetime_stamp','0') == '1') {
            $current_date = new JDate();
            $stamp = $current_date->format($params->get('file_datetime_stamp_format','Y-m-d_H-M-S'))."_";
        }
        
        JResponse::setHeader('Content-Disposition','attachment; filename="'.$stamp.$application->last_name.'_'.$application->first_name.'.pdf"',true);
        $document->setMimeEncoding('application/pdf');
        $document->setType('application/pdf');
        $document->setLink($application->last_name.'_'.$application->first_name.'.pdf"');

        parent::display('raw');

    }
}
?>