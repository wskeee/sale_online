<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%img_library}}".
 *
 * @property string $id
 * @property string $type_id 类型ID
 * @property string $brand_id 品牌ID
 * @property string $file_id 实体文件ID
 * @property string $name 图片名
 * @property string $group 分组
 * @property int $is_certificate 是否为已认证图片：0否 1是
 * @property int $is_del 是否已删除：0否 1是
 * @property string $created_by 创建人
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class ImgLibrary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%img_library}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'type_id', 'brand_id', 'created_at', 'updated_at'], 'integer'],
            [['file_id', 'created_by'], 'string', 'max' => 32],
            [['name', 'group'], 'string', 'max' => 50],
            [['is_certificate', 'is_del'], 'string', 'max' => 1],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_id' => Yii::t('app', 'Type ID'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'file_id' => Yii::t('app', 'File ID'),
            'name' => Yii::t('app', 'Name'),
            'group' => Yii::t('app', 'Group'),
            'is_certificate' => Yii::t('app', 'Is Certificate'),
            'is_del' => Yii::t('app', 'Is Del'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
