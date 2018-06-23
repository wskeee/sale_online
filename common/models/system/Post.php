<?php

namespace common\models\system;

use Yii;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property string $id
 * @property string $category_id 分类ID
 * @property string $name 文章名称
 * @property string $title 文章标题
 * @property string $content 文章内容
 * @property string $view_count 查看次数
 * @property string $comment_count 回复数目
 * @property int $can_comment 是否可以评论：0不可以1可以
 * @property int $is_show 是否显示：0不显示1显示
 * @property string $like_count 点赞数、喜欢数
 * @property string $unlike_count 不喜欢数
 * @property string $created_by 创建人
 * @property int $sort_order 排序索引
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'view_count', 'comment_count', 'like_count', 'unlike_count', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 255],
            [['can_comment', 'is_show', 'sort_order'], 'string', 'max' => 1],
            [['created_by'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'name' => Yii::t('app', 'Name'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'view_count' => Yii::t('app', 'View Count'),
            'comment_count' => Yii::t('app', 'Comment Count'),
            'can_comment' => Yii::t('app', 'Can Comment'),
            'is_show' => Yii::t('app', 'Is Show'),
            'like_count' => Yii::t('app', 'Like Count'),
            'unlike_count' => Yii::t('app', 'Unlike Count'),
            'created_by' => Yii::t('app', 'Created By'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
