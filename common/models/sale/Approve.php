<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%approve}}".
 *
 * @property string $id
 * @property string $order_id 报价ID
 * @property int $version 版本
 * @property int $status 状态：0进行中 1已完成
 * @property int $result 结果：0未通过 1通过
 * @property string $content 备注
 * @property string $created_by 创建人/申请人
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class Approve extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%approve}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'order_id', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['version', 'status'], 'string', 'max' => 4],
            [['result'], 'string', 'max' => 1],
            [['created_by'], 'string', 'max' => 32],
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
            'order_id' => Yii::t('app', 'Order ID'),
            'version' => Yii::t('app', 'Version'),
            'status' => Yii::t('app', 'Status'),
            'result' => Yii::t('app', 'Result'),
            'content' => Yii::t('app', 'Content'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
