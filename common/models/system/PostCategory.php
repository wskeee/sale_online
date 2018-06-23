<?php

namespace common\models\system;

use Yii;

/**
 * This is the model class for table "{{%post_category}}".
 *
 * @property string $id
 * @property string $parent_id 父级ID
 * @property string $parent_id_path 继承路径以","分隔
 * @property string $app_id 应用ID
 * @property string $name 名称
 * @property string $des 描述
 * @property int $is_show 是否显示：0不显示1显示
 * @property int $level 等级
 * @property int $sort_order 排序索引
 * @property string $icon 图标
 * @property string $href 跳转路径
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class PostCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'created_at', 'updated_at'], 'integer'],
            [['parent_id_path', 'app_id', 'des', 'icon', 'href'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 50],
            [['is_show', 'sort_order'], 'string', 'max' => 1],
            [['level'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'parent_id_path' => Yii::t('app', 'Parent Id Path'),
            'app_id' => Yii::t('app', 'App ID'),
            'name' => Yii::t('app', 'Name'),
            'des' => Yii::t('app', 'Des'),
            'is_show' => Yii::t('app', 'Is Show'),
            'level' => Yii::t('app', 'Level'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'icon' => Yii::t('app', 'Icon'),
            'href' => Yii::t('app', 'Href'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
