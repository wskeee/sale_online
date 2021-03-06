<?php

namespace common\models\system;

use Yii;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property string $id
 * @property string $title 宣传页名称
 * @property string $path 内容路径
 * @property string $link 超联接
 * @property string $target 打开方式：_blank,_self,_parent,_top
 * @property int $type 内容类型：1图片，2视频
 * @property int $sort_order 排序
 * @property int $is_publish 是否发布：0否 1是
 * @property string $des 描述
 * @property string $created_by 创建人ID
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['path', 'link', 'des'], 'string', 'max' => 255],
            [['target'], 'string', 'max' => 10],
            [['type', 'is_publish'], 'string', 'max' => 1],
            [['sort_order'], 'string', 'max' => 2],
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
            'title' => Yii::t('app', 'Title'),
            'path' => Yii::t('app', 'Path'),
            'link' => Yii::t('app', 'Link'),
            'target' => Yii::t('app', 'Target'),
            'type' => Yii::t('app', 'Type'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'is_publish' => Yii::t('app', 'Is Publish'),
            'des' => Yii::t('app', 'Des'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
