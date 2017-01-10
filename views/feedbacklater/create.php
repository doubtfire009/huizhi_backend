<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FeedbackLater */

$this->title = 'Create Feedback Later';
$this->params['breadcrumbs'][] = ['label' => 'Feedback Laters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-later-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
