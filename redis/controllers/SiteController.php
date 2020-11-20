<?php

namespace micro\controllers;

use micro\services\ArticleVote;
use yii\web\Controller;
use Yii;

class SiteController extends Controller {

    
    public function actionArticleVote() {
        $articleVoteService = new ArticleVote();
        $articleVoteService->articleVote('1', 'article:1');
    }

    public function actionPostArticle() {
        $user = uniqid();
        $title = '介绍一下' . $user;
        $link = 'https://baidu.com';
        $articleVoteService = new ArticleVote();
        return $articleVoteService->postArticle($user, $title, $link);
    }

    public function actionGetArticles() {
        $response = Yii::$app->getResponse();
        $response->format = $response::FORMAT_JSON;
        $articleVoteService = new ArticleVote();
        return $articleVoteService->getArticles();
    }
}