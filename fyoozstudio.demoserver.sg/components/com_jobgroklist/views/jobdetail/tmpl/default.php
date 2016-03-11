<?php

/**
 *
 *
 * This is the default.php view layout for jobgroklist
 *
 * Created: November 11, 2014, 3:25 pm
 *
 * Subversion Details
 * $Date: 2014-09-29 21:06:59 -0500 (Mon, 29 Sep 2014) $
 * $Revision: 6313 $
 * $Author: bobsteen $
 *
 * @author TK Tek, LLC. info@jobgrok.com
 * @version 3.1-1.2.58
 * @package com_jobgroklist
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

jimport('joomla.utilities.date');
?>
<!--<div class="team-section-two creative-opening"><div class="team-desh"></div></div>-->
<section class="about-section" style="padding-bottom:70px;">
	<div class="container">
    	<div class="row">
            <div itemtype="http://schema.org/Article" itemscope="" class="item-page">
                <meta content="en-GB" itemprop="inLanguage">
                            
				<div itemprop="articleBody">
                    <div class="col-lg-6">
                        <h1><?php echo $this->jobdetail->department;?></h1>
                        <div class="about_text">
                        		<div class="helps_package"><?php echo $this->jobdetail->position." position";?></div>
                        		<br> <?php echo $this->jobdetail->job_description; ?>
                        </div>
                    </div>
                </div>
            
			</div>
        </div>
    </div>
</section>