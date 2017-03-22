<?php

/* @var $this yii\web\View */
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Yii::t('app', 'Welcome to AYES Portal!') ?></h1>

        <p class="lead">AFRICA YOUTH ENTREPRENUERSHIP SOCIETY (AYES) FOR SUSTAINABLE INDUSTRIALIZATION IN AFRICA
            An Online Platform for new knowledge creation and sharing in support of enterprise development.
            The Youth Entrepreneurship Society (YES) is a network of young and vibrant African Entrepreneurs and
            Researchers aged below 40 years, who have the passion and motivation to make a big impact through
            entrepreneurship development for sustainable industrialization in Africa. This collaboration aims at
            stimulating new enterprise development by jointly promoting new knowledge creation and sharing through
            analysis of enterprise-level data and information for solving technical and managerial problems, making
            projections of future business opportunities, creating a common database for sustainable enterprise
            development, and generating a new stream of entrepreneurial corps in support of enterprise development.
            This concept note outlines the design of an online and mobile enabled collaborative platform for the
            network.

            .</p>

        <p><?= Yii::$app->user->isGuest ?
                \yii\helpers\Html::a(Yii::t('app', Yii::t('app', 'Register')), ['//register'], ['class' => 'btn btn-warning btn-block'])
                :
                \yii\helpers\Html::a(Yii::t('app', Yii::t('app', 'AYES Portal')), ['//public-docs'], ['class' => 'btn btn-success']) ?></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2><?= Yii::t('app', 'Collaboration') ?></h2>

                <p>
                    a) Allow African entrepreneurs and researchers to collaborate amongst themselves
                    b) Allow incubators to collaborate amongst themselves.
                    c) Allow entrepreneurs to collaborate on joint projects/initiatives.
                    d) Allow researcher to collaborate on research.
                    e) Allow researchers and entrepreneurs to share data..
                    .</p>

                <p><?= \yii\helpers\Html::a(Yii::t('app', 'Collaboration'), ['//public-docs'], ['class' => 'btn btn-primary']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2><?= Yii::t('app', 'Mentorship') ?></h2>

                <p>
                    a) Incorporate a Mentorship Portal.
                    b) Allow young entrepreneurs to find and follow mentors on the platform
                    c) Allow young researchers to find and follow mentors on the platform
                    .</p>

                <p><?= \yii\helpers\Html::a(Yii::t('app', Yii::t('app', 'Mentorship')), ['//my-uploads'], ['class' => 'btn btn-info']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Publishing</h2>

                <p>
                    a) Allow the publishing of Relevant Articles from Researchers and Entrepreneurs
                    b) Allow Entrepreneurs and Researchers to access relevant articles.
                </p>

                <p>
                <p><?= \yii\helpers\Html::a(Yii::t('app', Yii::t('app', 'Publishing')), ['//my-uploads'], ['class' => 'btn btn-primary']) ?></p></p>
            </div>
        </div>

    </div>
</div>
