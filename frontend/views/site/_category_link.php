<?php

/* @var $this \yii\web\View */
/* @var $category \common\models\Category */

?>


    <li class="catalogue-sidebar__list">
        <a href="/?category=<?= $category['id'] ?>" class="catalogue-sidebar__link"><?= $category['name'] ?></a>
    </li>

<?php
if (isset($category['items']) && is_array($category['items'])) {
    $template = '   <li class="catalogue-sidebar__list">
                        <a href="/?category=%s" class="catalogue-sidebar__link">%s</a>
                    </li>';
    foreach ($category['items'] as $item) {
        echo sprintf($template, $item['id'], ' - ' . $item['name']);
    }
}

?>