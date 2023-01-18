<?php

use Yii\Url;

/** @var yii\web\View $this */

$this->title = 'My Travel Blog';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">
        <div class="row">
            <?php foreach($articles as $article): ?>
                <div class="col-lg-4">
                    <h2><?= $article->title ?></h2>
                    <img class="image" src="<?= $article->getImage(); ?>"/>
                    <p><?= $article->description ?></p>    
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
