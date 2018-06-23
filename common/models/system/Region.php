<?php

namespace common\models\system;

use Yii;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property string $id 表id
 * @property string $name 地区名称
 * @property int $level 地区等级 分省市县区
 * @property string $parent_id 父id
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['level'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'level' => Yii::t('app', 'Level'),
            'parent_id' => Yii::t('app', 'Parent ID'),
        ];
    }
}
