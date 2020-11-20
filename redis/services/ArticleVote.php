<?php
namespace micro\services;

use Yii;

class ArticleVote {
    const ONE_WEEK_IN_SECONDS = 7 * 86400;
    const VOTE_SCORE = 432;
    
    private $redis;

    public function __construct() {
        $this->redis = Yii::$app->redis;
    }
    /**
     * 文章投票
     */
    public function articleVote($user = 0, $article = 0) {
        $cutoff = time() - self::ONE_WEEK_IN_SECONDS;
        if ($this->redis->zscore('time:', $article) < $cutoff) {
            return;
        }
        $articleId = explode(':', $article)[1];
        if ($this->redis->sadd('voted:' . $articleId, $user)) {
            $this->redis->zincrby('score:', $article, self::VOTE_SCORE);
            $this->redis->hincrby($article, 'votes', 1);
        }
    }

    /**
     * 创建文章
     */
    public function postArticle($user, $title, $link) {
        $articleId = $this->redis->incr('article:');
        $voted = 'voted:' . $articleId;

        $this->redis->sadd($voted, $user);
        $this->redis->expire($voted, self::ONE_WEEK_IN_SECONDS);

        $now = time();
        $article = 'article:' . $articleId;
        $this->redis->hmset($article,'title', $title,'link', $link,'poster', $user, 'time', $now,'votes', 1);
        $this->redis->zadd('score:', $now . self::VOTE_SCORE, $article);
        $this->redis->zadd('time:', $now, $article);
        return $articleId;
    }

    public function getArticles($order='score:') {
        $start = 0;
        $end = 25;

        $ids = $this->redis->zrevrange($order, $start, $end);
        $articles = [];
        foreach ($ids as $id) {
            $articleData = $this->redis->hgetall($id);
            foreach ($articleData as $k => $v) {
                if ($k % 2) {
                    $articleData[$articleData[$k - 1]] = $v;
                    unset($articleData[$k], $articleData[$k - 1]);
                }
            }
            $articleData['id'] = $id;
            array_push($articles, $articleData);
        }

        return $articles;
    }
}