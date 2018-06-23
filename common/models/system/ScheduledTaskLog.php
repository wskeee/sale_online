<?php

namespace common\models\system;

use Yii;

/**
 * This is the model class for table "{{%scheduled_task_log}}".
 *
 * @property string $id
 * @property int $type 类型： 1 23
 * @property string $action 执行动作eg:mconline/check-expire-file
 * @property int $result 执行结果：0失败，1成功
 * @property string $feedback 执行结果
 * @property string $created_by 执行人：空为系统
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class ScheduledTaskLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%scheduled_task_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feedback'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['type', 'result'], 'string', 'max' => 2],
            [['action'], 'string', 'max' => 255],
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
            'type' => Yii::t('app', 'Type'),
            'action' => Yii::t('app', 'Action'),
            'result' => Yii::t('app', 'Result'),
            'feedback' => Yii::t('app', 'Feedback'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
