<?php
/**
 *
 *
 * This is the jobgrok.php controller for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2014-10-01 21:18:29 -0500 (Wed, 01 Oct 2014) $
 * $Revision: 6318 $
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
jimport('joomla.utilities.string');

class JHTMLJobgrokapp extends JHTML {

    public static function lists($tags, $data = null) {
        
        $html = "";
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
                
        $t = explode(",",$tags);
        foreach ($t as $tt) { $r[] = $db->quoteName('tags') . ' LIKE ' . '\'%"'. trim($tt) . '"%\''; }
        
        $query->select($db->quoteName(array('id', 'user_id', 'list', 'description', 'list_text', 'tags')));
        $query->from($db->quoteName('#__tst_jgapp_lists'));
        $query->where(implode(' OR ', $r));
        
        $db->setQuery($query);
        $results = $db->loadObjectList();
        
        if ($data) { $lists = json_decode($data, true); }
        
        $count_list = 0;
        foreach ($results as $rr) {
            $count_list++;
            $html .= '<h4>'.$rr->list.'</h4>';
            $html .= '<h6>'.$rr->description.'</h6>';
            $html .= '<fieldset>';
            $texts = null;
            if (isset($rr->list_text)) {
                 $v = json_decode($rr->list_text, true);
                 foreach ($v as $vv) { $texts[] = trim($vv,'"'); }
            }
            $count = 0;
            foreach ($texts as $text) {
                $count++;
                $checked = '';
                if (isset($lists[$count_list])) {
                    if (in_array($text, $lists[$count_list])) $checked = ' checked="checked" ';
                }
                $html .= '<label class="checkbox inline">';
                $html .= '<input style="width: auto;" type="checkbox" '.$checked.' name="lists['.$rr->id.'][]" id="lists['.$rr->id.']['.$count.']" value="'.htmlentities($text).'"> '.htmlentities($text);
                $html .= '</label>';
            }
            $html .= '</fieldset>';
        }
        
        return $html;
        
    }
    
    public static function renderLists($json) {
        
        $html = "";
        $result = json_decode($json, true);
        
        $db = JFactory::getDbo();
        $rows = null;
        
        foreach ($result as $key => $value) {
            $query = $db->getQuery(true);
            $query->select('*');
            $query->from('#__tst_jgapp_lists');
            $query->where($db->quoteName('id') . " = ". (int)$key);
            $db->setQuery($query);
            $record = $db->loadObject();
            
            $html .= "<h4>".$record->list."</h4>";
            $html .= implode(" - ", $value);
        }

        return $html;
    }
    public static function panelnews() {
    
        $datafile = "http://www.tk-tek.com/data/panelnews.php";

        if (($data = file_get_contents($datafile)) === false) {
            $result = "<p class='bg-danger'>Error fetching news feed.<p>";
        } else {
            $result = $data;
        }

        return $result;
    }

    public static function static_jobtype($filter_jobtype = '*', $js = '', $name = 'code', $limit = 'no') {
        $db = JFactory::getDBO();

        $jobtypes[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_JOB_TYPE') . ' -');

        $query = "SELECT id AS value, jobtype AS text FROM #__tst_jgapp_static_jobtype";
        $db->setQuery($query);
        $jobtypes = array_merge($jobtypes, $db->loadObjectList());

        $jobtypes = JHTML::_('select.genericlist', $jobtypes, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_jobtype);

        return $jobtypes;
    }

    public static function static_company_size($filter_company = '*', $js = '', $name = 'code', $limit = 'no') {
        $db = JFactory::getDBO();

        $companys[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_COMPANY_SIZE') . ' -');

        $query = "SELECT id AS value, size AS text FROM #__tst_jgapp_static_companysize";
        $db->setQuery($query);
        $companys = array_merge($companys, $db->loadObjectList());

        $companys = JHTML :: _('select.genericlist', $companys, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_company);

        return $companys;
    }

    public static function static_company_revenue($filter_company = '*', $js = '', $name = 'code', $limit = 'no') {
        $db = JFactory::getDBO();

        $companys[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_COMPANY_REVENUE') . ' -');

        $query = "SELECT id AS value, revenue AS text FROM #__tst_jgapp_static_companyrevenue";
        $db->setQuery($query);
        $companys = array_merge($companys, $db->loadObjectList());

        $companys = JHTML :: _('select.genericlist', $companys, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_company);

        return $companys;
    }

    public static function static_education($filter_education = '*', $js = '', $name = 'code', $limit = 'no') {
        $db = JFactory::getDBO();

        $educations[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_EDUCATION') . ' -');

        $query = "SELECT id AS value, education AS text FROM #__tst_jgapp_static_education";
        $db->setQuery($query);
        $educations = array_merge($educations, $db->loadObjectList());

        $educations = JHTML :: _('select.genericlist', $educations, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_education);

        return $educations;
    }

    public static function static_yesno($static_yesno = null, $js = '', $name = 'id', $limit = 'no', $filter_value = '*') {

        $no_check = ($static_yesno == 0 ? 'checked="checked"' : '');
        $yes_check = ($static_yesno == 1 ? 'checked="checked"' : '');

        $html = '<label class="checkbox-inline">';
        $html .= '<input type="radio" class="btn-group" id="' . $name . '0" name="' . $name . '" value="0" ' . $no_check . ' />&nbsp;No&nbsp;';
        $html .= '</label>';
        $html .= '<label class="checkbox-inline">';
        $html .= '<input type="radio" class="btn-group" id="' . $name . '1" name="' . $name . '" value="1" ' . $yes_check . ' />&nbsp;Yes&nbsp;';
        $html .= '</label>';

        return $html;
    }

    public static function static_category($static_category = '*', $js = '', $name = 'code', $limit = 'no', $filter_value = '*') {
        $db = JFactory::getDBO();

        $categorys[] = JHTML::_('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_CATEGORY') . ' -');

        switch ($limit) {
            case 'companies':
                $query = 'SELECT DISTINCT c.id AS value, IF(c.use_description,c.description,sc.category) AS text FROM #__tst_jgapp_static_category sc ' .
                        'JOIN #__tst_jgapp_categories c ON sc.id=c.code ' .
                        ($filter_value == '*' ? 'WHERE 1=2 ' : 'WHERE c.company_id=' . $filter_value) . ' ' .
                        'ORDER BY IF(c.use_description,c.description,sc.category)';
                break;
            case 'jobs':
                $query = 'SELECT DISTINCT sc.id AS value, sc.category AS text FROM #__tst_jgapp_static_category sc ' .
                        'JOIN #__tst_jgapp_categories c ON sc.id=c.code ' .
                        'JOIN #__tst_jgapp_jobs j ON c.id=j.category_id ORDER BY sc.category';
                break;
            case 'applications':
                $query = 'SELECT DISTINCT sc.id AS value, sc.category AS text ' .
                        'FROM #__tst_jgapp_applications a ' .
                        'JOIN #__tst_jgapp_postings_appliedfor af ON a.uid=af.uid ' .
                        'JOIN #__tst_jgapp_postings p ON af.posting_id=p.id ' .
                        'JOIN #__tst_jgapp_jobs j ON p.job_id=j.id ' .
                        'JOIN #__tst_jgapp_categories c ON j.category_id=c.id ' .
                        'JOIN #__tst_jgapp_static_category sc ON c.code=sc.id ORDER BY sc.category';
                break;
            case 'categories':
                //$query = 'SELECT DISTINCT IF(c.use_description,c.description,sc.category) AS value, IF(c.use_description,c.description,sc.category) AS text FROM #__tst_jgapp_static_category sc '.
                //			'JOIN #__tst_jgapp_categories c ON sc.id=c.code ';
                $query = 'SELECT DISTINCT sc.id AS value, sc.category as text FROM #__tst_jgapp_static_category sc ' .
                        'JOIN #__tst_jgapp_categories c ON sc.id=c.code ORDER BY sc.category';
                break;
            case 'no':
            default:
                $query = 'SELECT id AS value, category AS text FROM #__tst_jgapp_static_category ORDER BY category';
        }

        $db->setQuery($query);
        $categorys = array_merge($categorys, $db->loadObjectList());

        $categorys = JHTML::_('select.genericlist', $categorys, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $static_category);

        return $categorys;
    }

    public static function static_country($static_country = '*', $js = '', $name = 'code', $limit = 'no') {
        global $mainframe;
        $db = JFactory::getDBO();

        $countrys[] = JHTML::_('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_COUNTRY') . ' -');

        switch ($limit) {
            case 'locations':
                $query = 'SELECT ctry.id as value, ctry.country as text FROM #__tst_jgapp_static_country ctry ' .
                        'JOIN #__tst_jgapp_locations l ON l.country_id=ctry.id GROUP BY ctry.id, ctry.country ORDER BY ctry.country';
                break;
            case 'jobs':
                break;
            case 'categories':
                break;
            case 'no':
            default:
                if ($static_country == '' || $static_country == '*' || (int) $static_country == 0) {
                    $params = JComponentHelper::getParams('com_jobgrokapp');
                    $default_code = $params->get('default_country_code');
                    $query = 'SELECT id FROM #__tst_jgapp_static_country WHERE `code`="' . $default_code . '"';
                    $db->setQuery($query);
                    $tmp = $db->loadAssoc();
                    $static_country = $tmp['id'];
                }
                $query = 'SELECT id AS value, country AS text FROM #__tst_jgapp_static_country ORDER BY country';
        }

        $db->setQuery($query);
        $countrys = array_merge($countrys, $db->loadObjectList());

        $countrys = JHTML::_('select.genericlist', $countrys, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $static_country);

        return $countrys;
    }

    public static function shift($filter_shift = '*', $js = '', $name = 'filter_shift', $limit = 'no', $filter_value = '*') {
        $db = JFactory :: getDBO();

        $shifts[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_SHIFT') . ' -');

        switch ($limit) {
            case 'companies':
                $query = 'SELECT id AS value, shift AS text ' .
                        'FROM #__tst_jgapp_shifts s ' .
                        ($filter_value == '*' ? 'WHERE 1=2 ' : 'WHERE s.company_id IN (' . $filter_value . ') ') .
                        'OR s.company_id=0 ORDER BY s.shift';
                break;
            case 'jobs':
                $query = 'SELECT DISTINCT s.shift AS value, s.shift AS text FROM #__tst_jgapp_shifts s ' .
                        'JOIN #__tst_jgapp_jobs j ON j.shift_id=s.id';
                break;
            case 'shift':
                $query = 'SELECT id AS value, shift AS text ' .
                        'FROM #__tst_jgapp_shifts GROUP BY shift ORDER BY shift';
                break;
            case 'no':
            default:
                $query = 'SELECT shift AS value, shift AS text ' .
                        'FROM #__tst_jgapp_shifts GROUP BY shift ORDER BY shift';
                break;
        }

        $db->setQuery($query);
        $sections = array_merge($shifts, $db->loadObjectList());

        $shifts = JHTML :: _('select.genericlist', $sections, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_shift);

        return $shifts;
    }

    public static function location($filter_location = '*', $js = '', $name = 'filter_location', $limit = 'no', $filter_value = '*') {
        $db = JFactory :: getDBO();

        $locations[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_LOCATION') . ' -');

        switch ($limit) {
            case 'companies':
                $query = 'SELECT l.id AS value, CONCAT(l.location,\' (\', if(l.loc_address=\'\',\'\',CONCAT(l.loc_address,\' - \')), ' .
                        'if(l.loc_description=\'\',\'\',CONCAT(l.loc_description,\' - \')),' .
                        'ifnull(c.company,\'[global]\'),\')\') AS text ' .
                        'FROM #__tst_jgapp_locations l LEFT OUTER JOIN #__tst_jgapp_companies c ON c.id=l.company_id ' .
                        ($filter_value == '*' ? 'WHERE 1=2 ' : 'WHERE l.company_id IN (' . $filter_value . ') ') .
                        'OR l.company_id=0 ORDER BY l.location';
                break;
            case 'applications':
                $query = 'SELECT l.location As value, location as text ' .
                        ' FROM #__tst_jgapp_locations l ' .
                        ' JOIN #__tst_jgapp_postings p ON p.location_id=l.id ' .
                        ' JOIN #__tst_jgapp_postings_appliedfor pa ON pa.posting_id=p.id ' .
                        ' JOIN #__tst_jgapp_applications a ON a.uid=pa.uid ' .
                        ' GROUP BY l.location ORDER BY l.location';
                break;
            case 'postings':
                $query = 'SELECT l.id as value, l.location AS text ' .
                        'FROM #__tst_jgapp_locations l ' .
                        'JOIN #__tst_jgapp_postings p ON l.id=p.location_id ' .
                        'GROUP BY location ORDER BY location';
                break;
            case 'shift':
                $query = 'SELECT id AS value, location AS text' .
                        ' FROM #__tst_jgapp_locations GROUP BY location ORDER BY location';
                break;
            case 'location':
                $query = 'SELECT id AS value, CONCAT(location,\' (\',loc_description,\')\') AS text ' .
                        ' FROM #__tst_jgapp_locations GROUP BY location ORDER BY location';
                break;
            case 'no':
                break;
            default:
                $query = 'SELECT location AS value, location AS text' .
                        ' FROM #__tst_jgapp_locations GROUP BY location ORDER BY location';
                break;
        }
        $db->setQuery($query);
        $sections = array_merge($locations, $db->loadObjectList());

        $locations = JHTML :: _('select.genericlist', $sections, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_location);

        return $locations;
    }

    public static function category($filter_category = '*', $js = '', $name = 'filter_category', $limit = 'no', $filter_value = '*') {
        $db = JFactory::getDBO();

        $categorys[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_CATEGORY_DESCRIPTION') . ' -');
        switch ($limit) {
            case 'companies':
                $query = 'SELECT cat.id as value, if(cat.description<>\'\',CONCAT(sc.category,\' (\',cat.description,\')\'),CONCAT(sc.category,\' (no description) \')) As text' .
                        ' FROM #__tst_jgapp_categories cat ' .
                        ' JOIN #__tst_jgapp_static_category sc ON cat.code=sc.id ' .
                        ($filter_value == '*' ? 'WHERE 1=2 ' : 'WHERE cat.company_id IN (' . $filter_value . ') ') .
                        ' OR cat.company_id=0 ORDER BY sc.category';
                break;
            case 'jobs':
                $query = 'SELECT DISTINCT description as value, description as text' .
                        ' FROM #__tst_jgapp_categories c ' .
                        ' JOIN #__tst_jgapp_jobs j ON j.category_id=c.id' .
                        ' WHERE description <> "" ';
                break;
            case 'applications':
                $query = 'SELECT DISTINCT description as value, description as text ' .
                        'FROM #__tst_jgapp_applications a ' .
                        'JOIN #__tst_jgapp_postings_appliedfor af ON a.uid=af.uid ' .
                        'JOIN #__tst_jgapp_postings p ON af.posting_id=p.id ' .
                        'JOIN #__tst_jgapp_jobs j ON p.job_id=j.id ' .
                        'JOIN #__tst_jgapp_categories c ON j.category_id=c.id ';
                break;
            case 'category':
                $query = 'SELECT cat.id as value, if(cat.description<>\'\',CONCAT(sc.category,\' (\',cat.description,\')\'),CONCAT(sc.category,\' (no description) \')) As text' .
                        ' FROM #__tst_jgapp_categories cat ' .
                        ' JOIN #__tst_jgapp_static_category sc ON cat.code=sc.id ' .
                        ' ORDER BY cat.description';
                break;
            case 'no':
            default:
                $query = 'SELECT description as value, description As text' .
                        ' FROM #__tst_jgapp_categories ' .
                        ' where description <> "" GROUP BY description ORDER BY description';
                break;
        }
        $db->setQuery($query);
        $categorys = array_merge($categorys, $db->loadObjectList());
        $categorys = JHTML::_('select.genericlist', $categorys, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_category);
        return $categorys;
    }

    public static function status_description($id) {
        if (!isset($id))
            return "";
        $db = JFactory::getDBO();
        $query = "SELECT status FROM #__tst_jgapp_static_applicationstatus WHERE id=" . $id;
        $db->setQuery($query);
        $result = $db->loadResult();
        return $result;
    }

    public static function static_companyrevenue_description($id) {
        if (!isset($id))
            return "";
        $db = JFactory::getDBO();
        $query = "SELECT revenue FROM #__tst_jgapp_static_companyrevenue WHERE id=" . $id;
        $db->setQuery($query);
        $result = $db->loadResult();
        return $result;
    }

    public static function static_companysize_description($id) {
        if (!isset($id))
            return "";
        $db = JFactory::getDBO();
        $query = "SELECT size FROM #__tst_jgapp_static_companysize WHERE id=" . $id;
        $db->setQuery($query);
        $result = $db->loadResult();
        return $result;
    }

    public static function static_jobtype_description($id) {
        if (!isset($id))
            return "";
        $db = JFactory::getDBO();
        $query = "SELECT jobtype FROM #__tst_jgapp_static_jobtype WHERE id=" . $id;
        $db->setQuery($query);
        $result = $db->loadResult();
        return $result;
    }

    public static function jobtype($filter_jobtype = '*', $js = '', $name = 'filter_jobtype', $limit = 'no', $filter_value = '*') {
        $db = JFactory :: getDBO();

        switch ($limit) {
            case 'companies':
                $jobtypes[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_JOB_TYPE') . ' -');
                $query = "SELECT jt.id AS value, CONCAT(IF(jt.code = 0, CONCAT( jt.jobtype, ' (no static jobtype)'), CONCAT(jt.jobtype, ' (', sjt.jobtype, ')')), IF(jt.company_id = 0,' (any company)',CONCAT(' (',c.company,')'))) AS text" .
                        " FROM #__tst_jgapp_jobtypes jt " .
                        "LEFT JOIN #__tst_jgapp_static_jobtype sjt ON sjt.id=jt.code " .
                        "LEFT JOIN #__tst_jgapp_companies c ON jt.company_id=c.id " .
                        ($filter_value == "*" ? "WHERE 1=2 " : "WHERE jt.company_id IN (" . $filter_value . ") ") .
                        "OR jt.company_id=0 ORDER BY IF (jt.use_description, jt.jobtype, sjt.jobtype)";
                break;
            case 'jobs':
                $jobtypes[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_JOB_TYPE') . ' -');
                $query = "SELECT DISTINCT jt.code AS value, sjt.jobtype AS text" .
                        " FROM #__tst_jgapp_jobtypes jt " .
                        " JOIN #__tst_jgapp_jobs j ON j.jobtype_id=jt.id" .
                        " LEFT JOIN #__tst_jgapp_static_jobtype sjt ON sjt.id=jt.code";
                break;

            case 'applications':
                $jobtypes[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_JOB_TYPE') . ' -');
                $query = "SELECT DISTINCT jt.code AS value, sjt.jobtype AS text" .
                        " FROM #__tst_jgapp_applications a " . // #__tst_jgapp_jobtypes jt ".
                        ' JOIN #__tst_jgapp_postings_appliedfor af ON a.uid=af.uid ' .
                        ' JOIN #__tst_jgapp_postings p ON af.posting_id=p.id ' .
                        ' JOIN #__tst_jgapp_jobs j ON p.job_id=j.id ' .
                        ' JOIN #__tst_jgapp_jobtypes jt ON j.jobtype_id=jt.id ' .
                        ' LEFT JOIN #__tst_jgapp_static_jobtype sjt ON sjt.id=jt.code';
                break;
            case 'jobs_desc':
                $jobtypes[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_JOBTYPE_DESCRIPTION') . ' -');
                $query = 'SELECT DISTINCT jt.jobtype as value, jt.jobtype as text ' .
                        "FROM #__tst_jgapp_jobtypes jt " .
                        "JOIN #__tst_jgapp_jobs j ON j.jobtype_id=jt.id " .
                        " WHERE jt.jobtype <> ''" .
                        " ORDER BY jt.jobtype ";
                break;
            case 'applications_desc':
                $jobtypes[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_JOBTYPE_DESCRIPTION') . ' -');
                $query = 'SELECT DISTINCT jt.jobtype as value, jt.jobtype as text ' .
                        "FROM #__tst_jgapp_applications a " . // #__tst_jgapp_jobtypes jt ".
                        'JOIN #__tst_jgapp_postings_appliedfor af ON a.uid=af.uid ' .
                        'JOIN #__tst_jgapp_postings p ON af.posting_id=p.id ' .
                        'JOIN #__tst_jgapp_jobs j ON p.job_id=j.id ' .
                        'JOIN #__tst_jgapp_jobtypes jt ON j.jobtype_id=jt.id ' .
                        'ORDER BY jt.jobtype';
                break;
            case 'jobtype':
                $jobtypes[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_JOB_TYPE') . ' -');
                //$query = 'SELECT id AS value, jobtype AS text '.
                //    ' FROM #__tst_jgapp_jobtypes GROUP BY jobtype ORDER BY jobtype';
                $query = 'SELECT jt.id AS value, if(isnull(sjt.jobtype), jt.jobtype, CONCAT(sjt.jobtype,\' - \',jt.jobtype)) AS text FROM ' .
                        ' #__tst_jgapp_jobtypes jt LEFT JOIN ' .
                        ' #__tst_jgapp_static_jobtype sjt ON jt.code=sjt.id ' .
                        ' ORDER BY if(isnull(sjt.jobtype), jt.jobtype, CONCAT(sjt.jobtype, \' - \', jt.jobtype));';
                break;
            case 'no':
            default:
                $jobtypes[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_JOB_TYPE') . ' -');
                $query = 'SELECT jobtype AS value, jobtype AS text ' .
                        ' FROM #__tst_jgapp_jobtypes ' .
                        ' WHERE jobtype <> "" GROUP BY jobtype ORDER BY jobtype';
                break;
        }

        $db->setQuery($query);
        $sections = array_merge($jobtypes, $db->loadObjectList());

        $jobtypes = JHTML :: _('select.genericlist', $sections, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_jobtype);

        return $jobtypes;
    }

    public static function department($filter_department = '*', $js = '', $name = 'filter_department', $limit = 'no', $filter_value = '*') {
        $db = JFactory :: getDBO();

        $departments[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_DEPARTMENT') . ' -');

        switch ($limit) {
            case 'companies':
                $query = 'SELECT id AS value, department AS text ' .
                        'FROM #__tst_jgapp_departments d ' .
                        ($filter_value == '*' ? 'WHERE 1=2 ' : 'WHERE d.company_id IN (' . $filter_value . ') ') .
                        'OR d.company_id=0 ORDER BY d.department';
                break;
            case 'jobs':
                $query = 'SELECT DISTINCT d.department AS value, d.department AS text FROM #__tst_jgapp_departments d ' .
                        'JOIN #__tst_jgapp_jobs j ON j.department_id=d.id';
                break;
            case 'postings':
                $query = 'SELECT DISTINCT d.id AS value, d.department AS text FROM #__tst_jgapp_departments d ' .
                        'JOIN #__tst_jgapp_jobs j ON j.department_id=d.id ' .
                        'JOIN #__tst_jgapp_postings p ON p.job_id=j.id';
                break;
            case 'department':
                $query = 'SELECT id AS value, department AS text ' .
                        'FROM #__tst_jgapp_departments GROUP BY department ORDER BY department';
                break;
            case 'no':
            default:
                $query = 'SELECT department AS value, department AS text ' .
                        'FROM #__tst_jgapp_departments GROUP BY department ORDER BY department';
                break;
        }

        $db->setQuery($query);
        $sections = array_merge($departments, $db->loadObjectList());

        $departments = JHTML :: _('select.genericlist', $sections, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_department);

        return $departments;
    }

    public static function contact_desc($id) {
        $db = JFactory::getDBO();
        $query = "SELECT `contact` FROM #__tst_jgapp_contacts WHERE `id`=" . $id;
        $db->setQuery($query);
        $result = $db->loadResult();
        return $result;
    }

    public static function contact($filter_contact = '*', $js = '', $name = 'filter_contact', $limit = 'no', $filter_value = '*') {
        $db = JFactory :: getDBO();

        $contacts[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_CONTACT') . ' -');

        switch ($limit) {
            case 'companies':
                $query = 'SELECT id as value, contact  as text ' .
                        'FROM #__tst_jgapp_contacts c ' .
                        ($filter_value == '*' ? 'WHERE 1=2 ' : 'WHERE c.company_id IN (' . $filter_value . ') ') .
                        'OR c.company_id=0 ORDER BY c.contact';
                break;
            case 'detail':
                $query = 'SELECT id as value, contact as text ' .
                        'FROM #__tst_jgapp_contacts c ' .
                        'ORDER BY contact';
                break;
            case 'contact':
                $query = 'SELECT id AS value, contact AS text ' .
                        'FROM #__tst_jgapp_contacts GROUP BY contact ORDER BY contact';
                break;
            case 'no':
            default:
                $query = 'SELECT contact AS value, contact AS text ' .
                        'FROM #__tst_jgapp_contacts GROUP BY contact ORDER BY contact';
                break;
        }
        $db->setQuery($query);
        $sections = array_merge($contacts, $db->loadObjectList());

        $contacts = JHTML :: _('select.genericlist', $sections, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_contact);

        return $contacts;
    }

    public static function company($filter_company = '*', $js = '', $name = 'filter_company', $limit = 'no') {
        $db = JFactory :: getDBO();

        $companies[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_COMPANY') . ' -');

        switch ($limit) {
            case 'locations':
                $query = 'SELECT DISTINCT company AS value, company AS text ' .
                        'FROM #__tst_jgapp_companies c ' .
                        'JOIN #__tst_jgapp_locations loc ON c.id=loc.company_id';
                break;
            case 'jobtypes':
                $query = 'SELECT DISTINCT company AS value, company As text ' .
                        'FROM #__tst_jgapp_companies c ' .
                        'JOIN #__tst_jgapp_jobtypes j ON c.id=j.company_id';
                break;
            case 'departments':
                $query = 'SELECT DISTINCT company AS value, company As text ' .
                        'FROM #__tst_jgapp_companies c ' .
                        'JOIN #__tst_jgapp_departments d ON c.id=d.company_id';
                break;
            case 'categories':
                $query = 'SELECT DISTINCT company AS value, company AS text ' .
                        'FROM #__tst_jgapp_companies c ' .
                        'JOIN #__tst_jgapp_categories cat ON c.id=cat.company_id';
                break;
            case 'shifts':
                $query = 'SELECT DISTINCT company AS value, company AS text ' .
                        'FROM #__tst_jgapp_companies c ' .
                        'JOIN #__tst_jgapp_shifts s ON c.id=s.company_id';
                break;
            case 'contacts':
                $query = 'SELECT DISTINCT company AS value, company AS text ' .
                        'FROM #__tst_jgapp_companies c ' .
                        'JOIN #__tst_jgapp_contacts cont ON c.id=cont.company_id';
                break;
            case 'jobs':
                $query = 'SELECT DISTINCT c.company AS value, c.company AS text FROM #__tst_jgapp_companies c ' .
                        'JOIN #__tst_jgapp_jobs j ON j.company_id=c.id';
                break;
            case 'postings':
                $query = 'SELECT DISTINCT c.company AS value, c.company AS text FROM #__tst_jgapp_companies c ' .
                        'JOIN #__tst_jgapp_jobs j ON j.company_id=c.id ' .
                        'JOIN #__tst_jgapp_postings p ON p.job_id=j.id';
            case 'detail':
                $query = "SELECT id as value, CONCAT('(',id,') ',company) as text " .
                        "FROM #__tst_jgapp_companies ORDER BY id";
                break;
            case 'no':
            default:
                $query = 'SELECT company AS value, company AS text ' .
                        ' FROM #__tst_jgapp_companies GROUP BY company ORDER BY company';
                break;
        }
        $db->setQuery($query);
        $sections = array_merge($companies, $db->loadObjectList());

        $companies = JHTML :: _('select.genericlist', $sections, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_company);

        return $companies;
    }

    public static function jobtitle($filter_jobtitle = '*', $js = '', $name = 'filter_jobtitle', $limit = 'no', $filter_value = '*') {
        $db = JFactory :: getDBO();

        $jobtitle[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_JOB_TITLE') . ' -');

        switch ($limit) {
            case 'companies':
                $query = 'SELECT j.id as value, IF(ISNULL(j.job_code),j.title,IF(j.job_code="",j.title,CONCAT("(",j.job_code,") ",j.title))) as text ' .
                        'FROM #__tst_jgapp_jobs j ' .
                        ($filter_value == '*' ? 'WHERE 1=2 ' : 'WHERE j.company_id=' . $filter_value . ' ') .
                        'ORDER BY IF(ISNULL(j.job_code),j.title,IF(j.job_code="",j.title,CONCAT("(",j.job_code,") ",j.title)))';
                break;
            case 'postings':
                $query = 'SELECT DISTINCT j.jobtitle AS value, j.jobtitle AS text FROM #__tst_jgapp_jobs j ' .
                        'JOIN #__tst_jgapp_postings p ON p.job_id=j.id';
            case 'detail':
                $query = 'SELECT id as value, IF(ISNULL(j.job_code),j.title,IF(j.job_code="",j.title,CONCAT("(",j.job_code,") ",j.title))) as text ' .
                        'FROM #__tst_jgapp_jobs j ' .
                        'ORDER BY j.title';
                break;
            case 'jobtitle':
                $query = 'SELECT j.id AS value, IF(ISNULL(j.job_code),j.title,IF(j.job_code="",j.title,CONCAT("(",j.job_code,") ",j.title))) AS text' .
                        ' FROM #__tst_jgapp_jobs j ORDER BY IF(ISNULL(j.job_code),j.title,IF(j.job_code="",j.title,CONCAT("(",j.job_code,") ",j.title)))';
                break;
            case 'no':
            default:
                $query = 'SELECT title AS value, title AS text' . ' FROM #__tst_jgapp_jobs GROUP BY title ORDER BY title';
                break;
        }
        $db->setQuery($query);
        $sections = array_merge($jobtitle, $db->loadObjectList());

        $jobtitle = JHTML :: _('select.genericlist', $sections, $name, 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_jobtitle);

        return $jobtitle;
    }

    public static function parent_name($id) {

        if ($id == '0')
            return '';

        $db = JFactory::getDbo();
        $query = "SELECT first_name, last_name, parent_id FROM #__tst_jgapp_applications WHERE id=" . $id;
        $db->setQuery($query);
        $result = $db->loadObject();
        $parent_id = $result->parent_id;
        $firstName = $result->first_name;
        $lastName = $result->last_name;

        while ($parent_id != '0') {
            $query = "SELECT first_name, last_name, parent_id FROM #__tst_jgapp_applications WHERE id=" . $parent_id;
            $db->setQuery($query);
            $result = $db->loadObject();
            $parent_id = $result->parent_id;
            $firstName = $result->first_name;
            $lastName = $result->last_name;
        }

        if ($lastName == '' || $firstName == '')
            $comma = "";
        else
            $comma = ", ";
        return $lastName . $comma . $firstName;
    }

    public static function form_chain($parent_id, $forms = array()) {

        $db = JFactory::getDbo();
        $query = "SELECT id, NextItemid, parent_id, child_id, level FROM #__tst_jgapp_applications WHERE id=" . $parent_id;
        $db->setQuery($query);
        $result = $db->loadObject();
        $CurrentItemid = $result->NextItemid;

        while ($result && $result->child_id != 0) {
            $query = "SELECT id, NextItemid, parent_id, child_id, level FROM #__tst_jgapp_applications WHERE id=" . $result->child_id;
            $db->setQuery($query);
            $result = $db->loadObject();
            $result->CurrentItemid = $CurrentItemid;
            $CurrentItemid = $result->NextItemid;

            $query = "SELECT title as name, params FROM #__menu WHERE id=" . $result->CurrentItemid;
            $db->setQuery($query);
            $result2 = $db->loadObject();

            $result->menu_name = $result2->name;

            $forms[] = $result;
        }
        /*
          $result = "";
          foreach ($forms as $f) {
          $result .= $f->id."<br/>";
          }
         */
        return $forms;
    }

    public static function static_referral($filter_referral = '*', $js = '', $name = 'id', $limit = 'no') {
        $db = JFactory::getDBO();

        $referrals[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_REFERRAL') . ' -');

        $query = "SELECT id AS value, referral AS text FROM #__tst_jgapp_static_referral";
        $db->setQuery($query);
        $referrals = array_merge($referrals, $db->loadObjectList());

        $referrals = JHTML :: _('select.genericlist', $referrals, 'referral_id', 'class="inputbox" size="1" ' . $js, 'value', 'text', $filter_referral);

        return $referrals;
    }

    public static function static_referral_description($id) {
        if (!isset($id) or $id == '')
            return "";
        $db = JFactory::getDBO();
        $query = "SELECT referral FROM #__tst_jgapp_static_referral WHERE id=" . (int) $id;
        $db->setQuery($query);
        $result = $db->loadResult();
        return $result;
    }


    public static function viewlevels($viewlevel, $js = '', $name = 'viewlevel') {
        $db = JFactory::getDbo();
        $query = "SELECT id AS value, title AS text FROM #__viewlevels";
        $db->setQuery($query);
        $genericlist[] = JHTML :: _('select.option', '', '- ' . JTEXT::_('COM_JOBGROKAPP_HELPERS_JOBGROK_SELECT_VIEWLEVEL') . ' -');
        $genericlist = array_merge($genericlist, $db->loadObjectList());
        $genericlist = JHTML::_('select.genericlist', $genericlist, $name, 'class="inputbox" ' . $js, 'value', 'text', $viewlevel);
        return $genericlist;
    }

    public static function viewlevel_description($viewlevel) {
        $db = JFactory::getDbo();
        $query = "SELECT title FROM #__viewlevels WHERE id=" . (int) $viewlevel;
        $db->setQuery($query);
        $db->query();
        return $db->loadResult();
    }

}
?>

