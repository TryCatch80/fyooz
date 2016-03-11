<?php
/**
 *
 *
 * This is the view.jgpdf.php file for jobgrokapp
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

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');
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
        $application = $this->get('Application');
        $viewtype = 'pdf';
        //$pdf = new JGPdf();
        //$pdf->factory('p','letter');
        $pdf = JGPdf::factory('p','letter');

        $this->assignRef('application', $application);
        $this->assignRef('viewtype', $viewtype);
        $this->assignRef('pdf',$pdf);

        $params = JComponentHelper::getParams('com_jobgrokapp');
        $db = JFactory::getDBO();
        if (isset($application->Itemid) && $application->Itemid !='')
        {
            $query = "SELECT params FROM #__menu WHERE id=".$application->Itemid;
        }
        else
        {
            $query = "SELECT params FROM #__extensions WHERE `name`='com_jobgrokapp';";
        }
        $db->setQuery($query);
        $menuparams = new JRegistry($db->loadResult());
        $params->merge($menuparams);
        $this->assignRef('params',$params);

        $document = JFactory::getDocument();

        $pdf = JGPdf::factory('p','letter');
        $pdf->setConvertFrom($params->get('convert_from','UTF-8'));
        $pdf->setConvertTo($params->get('convert_to','ISO-8859-1'));
        $pdf->setConversion($params->get('convert_encoding','0')=='0'?false:true);
        //$pdf->factory('p','letter');

        JResponse::setHeader('Content-Disposition','attachment; filename="'.$application->last_name.'_'.$application->first_name.'.pdf"',true);
        $document->setMimeEncoding('application/pdf');
        $document->setType('application/pdf');
        $document->setLink($application->last_name.'_'.$application->first_name.'.pdf"');

        parent::display('raw');

    }
}
?>