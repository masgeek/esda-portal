<?php

namespace app\modules\user\controllers;

use yii\web\Controller;

/**
 * Default controller for the `users` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     */
    public function actionRecover()
    {
        $this->view->title = 'Account Recovery';
        return $this->render('index');
    }
}
