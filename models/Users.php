<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id_user
 * @property string $email
 * @property string $password
 * @property string $fullname
 * @property string $username
 * @property string $location
 * @property string $phone
 * @property string $gender
 * @property string $join_date
 * @property string $authKey
 * @property string $accessToken
 * @property string $verified
 *
 * @property Info[] $infos
 */
class Users extends \yii\db\ActiveRecord
{
    public $verifyCode;
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'fullname'], 'required'],
            [['gender', 'verified'], 'string'],
            [['join_date'], 'safe'],
            [['email', 'fullname', 'username', 'location'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 500],
            [['phone'], 'string', 'max' => 20],
            [['authKey', 'accessToken'], 'string', 'max' => 700],
            [['email'], 'unique'],
            [['email'],'email'],
            [['username'], 'unique'],
            [['phone'], 'unique'],
            [['authKey'], 'unique'],
            [['accessToken'], 'unique'],
            [['verifyCode'],'captcha','skipOnEmpty'=>true, 'on' =>'setting,changegender'],
            [['image'], 'image','extensions'=>'jpg,png','maxSize' => 5000000, ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'email' => 'Email',
            'password' => 'Password',
            'fullname' => 'Fullname',
            'username' => 'Username',
            'location' => 'Location',
            'phone' => 'Phone',
            'gender' => 'Gender',
            'join_date' => 'Join Date',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'verified' => 'Verified',
            'verifyCode' => 'Are You Human ?',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfos()
    {
        return $this->hasMany(Info::className(), ['created_by' => 'username']);
    }

    public function beforeSave($insert) {
        if(isset($this->password)) {
            
            $this->password = bin2hex($this->password);
            $this->authKey = sha1($this->email);
            $this->accessToken = sha1($this->id_user);
            $this->username = strstr($this->email, '@', true);
            
            
        }
            return parent::beforeSave($insert);
    }
}
