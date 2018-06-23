<?php

namespace common\models\sale;

use Yii;

/**
 * This is the model class for table "{{%user_group}}".
 *
 * @property string $id
 * @property string $company_id 所属公司
 * @property string $leader_id 负责人
 * @property string $name 组名
 * @property string $des 描述
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 *
 * @property User[] $users
 */
class UserGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['company_id', 'leader_id'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 50],
            [['des'], 'string', 'max' => 255],
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
            'company_id' => Yii::t('app', 'Company ID'),
            'leader_id' => Yii::t('app', 'Leader ID'),
            'name' => Yii::t('app', 'Name'),
            'des' => Yii::t('app', 'Des'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['group_id' => 'id']);
    }
}
