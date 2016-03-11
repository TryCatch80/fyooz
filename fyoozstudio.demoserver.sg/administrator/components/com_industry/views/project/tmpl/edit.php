<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_industry
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

JHtml::_('behavior.formvalidator');
JHtml::_('formbehavior.chosen', 'select');

$app = JFactory::getApplication();
$assoc = JLanguageAssociations::isEnabled();

JFactory::getDocument()->addScriptDeclaration('
	Joomla.submitbutton = function(task)
	{
		if (task == "project.cancel" || document.formvalidator.isValid(document.getElementById("project-form")))
		{
			Joomla.submitform(task, document.getElementById("project-form"));
		}
	};
');//' . $this->form->getField("misc")->save() . '
?>

<form action="<?php echo JRoute::_('index.php?option=com_industry&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="project-form" class="form-validate">

	<?php echo JLayoutHelper::render('joomla.edit.title_alias', $this); ?>

	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'fields')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'fields', JText::_('COM_INDUSTRY_TABHEADER_FIELDS', true)); ?>
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid form-horizontal-desktop">
					<div class="span6">
				<?php echo $this->form->getControlGroup('images'); ?>
                <?php foreach ($this->form->getGroup('images') as $field) : ?>
                    <?php echo $field->getControlGroup(); ?>
                <?php endforeach; ?>
					</div>
				</div>
				<fieldset class="adminform">
					<?php echo $this->form->getInput('description'); ?>
				</fieldset>
			</div>
			<div class="span3">
				<fieldset class="form-vertical">
				<?php echo $this->form->renderField('industry_id'); ?>
				<?php echo $this->form->renderField('imagegallery'); ?>
                <?php echo $this->form->renderField('imagegallery_text'); ?>
                <?php echo $this->form->renderField('videogallery'); ?>
                <?php echo $this->form->renderField('videogallery_text'); ?>

				<?php echo $this->form->renderField('client_name'); ?>
				<?php echo $this->form->renderField('client_logo'); ?>
                </fieldset>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('JGLOBAL_FIELDSET_PUBLISHING', true)); ?>
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid form-horizontal-desktop">
					<div class="span6">
						<?php echo JLayoutHelper::render('joomla.edit.publishingdata', $this); ?>
					</div>
				</div>
			</div>
			<div class="span3">
				<?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
