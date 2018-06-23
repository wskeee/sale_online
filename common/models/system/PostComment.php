<?php

namespace common\models\system;

use Yii;

/**
 * This is the model class for table "{{%post_comment}}".
 *
 * @property string $id
 * @property string $post_id 文章ID
 * @property string $parent_id 父级ID(回复ID)
 * @property string $content 内容
 * @property string $created_by 创建人
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class PostComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post_comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'parent_id', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
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
            'post_id' => Yii::t('app', 'Post ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'content' => Yii::t('app', 'Content'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
