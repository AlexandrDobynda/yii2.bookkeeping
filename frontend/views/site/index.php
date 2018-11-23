<?php
use yii\helpers\Html;
use common\models\Profile;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to home bookkeeping!</h1>

        <div style="width: 450px; margin: 0 auto; padding-top: 50px;">
            <?php if(Yii::$app->user->isGuest) { ?>

                <p>
                    <?= Html::a('Create account', ['signup'], ['class' => 'btn-primary btn btn-block']) ?>
                </p>

                <p>
                    <?= Html::a('Login', ['login'], ['class' => 'btn btn-primary btn-block']) ?>
                </p>

            <?php } else { ?>
                <p>
                    <?= Html::a('Your profile', ['../profile/' . Profile::getId()], ['class' => 'btn btn-primary btn-block']) ?>
                </p>

                <p>
                    <?= Html::a('Transactions', ['../transactions'], ['class' => 'btn btn-primary btn-block']) ?>
                </p>

                <p>
                    <?= Html::a('Accounts', ['../accounts'], ['class' => 'btn btn-primary btn-block']) ?>
                </p>

                <p>
                    <?= Html::a('Category', ['../category'], ['class' => 'btn btn-primary btn-block']) ?>
                </p>

                <p>
                    <?= Html::a("Logout", ['site/logout'], [
                            'data' => [
                                'method' => 'post'
                            ],
                            'class' => 'btn btn-success btn-block'
                        ]
                    );?>
                </p>

            <?php    } ?>

        </div>
    </div>
</div>
