<?php
/**
 * @package    Radical MultiField
 *
 * @author     delo-design.ru <info@delo-design.ru>
 * @copyright  Copyright (C) 2018 "Delo Design". All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://delo-design.ru
 */
defined('_JEXEC') or die;
if (!$field->value)
{
	return;
}
$values = json_decode($field->value, JSON_OBJECT_AS_ARRAY);
$listtype = $this->getListTypeFromField($field);
jimport('radicalmultifieldhelper', JPATH_ROOT . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, ['plugins', 'fields', 'radicalmultifield'])); //подключаем хелпер
?>

<div class="uk-child-width-1-4@m" uk-grid  uk-lightbox="animation: slide">
	<?php foreach ($values as $key => $row): ?>

        <div>
            <div class="uk-transition-toggle uk-inline-clip">
                <canvas width="400" height="<?php echo  (int)$field->fieldparams->get('filesimportpreviewmaxheight'); ?>"></canvas>
                <img class="uk-cover uk-responsive-height" src="<?= RadicalmultifieldHelper::generateThumb($field, $row['image'])?>" alt="<?= $row['alt'] ?>"/>
                <div class="uk-position-cover uk-overlay uk-overlay-primary uk-transition-fade"></div>
                <a class="uk-position-cover" href="<?= $row['image'] ?>" data-caption="<?= $row['alt'] ?>"></a>
            </div>
        </div>

	<?php endforeach; ?>
</div>