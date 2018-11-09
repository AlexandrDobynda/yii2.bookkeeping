<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = 'Your profile';
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name:ntext',
            'last_name:ntext',
        ],
    ]) ?>

    <p>
        <?= Html::a('Change', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

</div>
