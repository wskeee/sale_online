<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_auths}}".
 *
 * @property string $id
 * @property string $user_id 用户ID
 * @property string $identity_type 登录类型（手机号 邮箱 用户名）或第三方应用名称（微信 微博等）
 * @property string $identifier 标识（手机号 邮箱 用户名或第三方应用的唯一标识）
 * @property string $credential 密码凭证（站内的保存密码，站外的不保存或保存token）
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class UserAuths extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_auths}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identity_type', 'identifier'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['user_id', 'identifier'], 'string', 'max' => 32],
            [['identity_type'], 'string', 'max' => 20],
            [['credential'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'identity_type' => Yii::t('app', 'Identity Type'),
            'identifier' => Yii::t('app', 'Identifier'),
            'credential' => Yii::t('app', 'Credential'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
