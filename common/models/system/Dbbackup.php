<?php

namespace common\models\system;

use Yii;

/**
 * This is the model class for table "{{%dbbackup}}".
 *
 * @property string $id
 * @property string $name 文件名
 * @property string $path 备份文件路径
 * @property string $size 大小：字节
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class Dbbackup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dbbackup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size', 'created_at', 'updated_at'], 'integer'],
            [['name', 'path'], 'string', 'max' => 255],
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
            'path' => Yii::t('app', 'Path'),
            'size' => Yii::t('app', 'Size'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
