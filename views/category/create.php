<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = '新建服务类别';
$this->params['breadcrumbs'][] = ['label' => '服务类别', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category_parent_id_all'=>$category_parent_id_all
    ]) ?>

</div>
