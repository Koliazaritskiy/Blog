<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Article_tag".
 *
 * @property integer $id
 * @property integer $article-id
 * @property integer $tag_id
 */
class ArticleTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Article_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article-id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article-id' => 'Article ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
