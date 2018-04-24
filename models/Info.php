<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property int $id_info
 * @property string $type_info
 * @property string $category
 * @property string $name
 * @property string $location
 * @property string $since
 * @property string $contact_person
 * @property string $contact_person_name
 * @property string $created_at
 * @property string $created_by
 * @property string $url
 *
 * @property Category $category0
 * @property Users $createdBy
 */
class Info extends \yii\db\ActiveRecord
{
    public $image;
    public $image2;
    public $image3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'name', 'location', 'since', 'contact_person', 'contact_person_name'], 'required'],
            [['type_info','status'], 'string'],
            [['since', 'created_at','description'], 'safe'],
            [['category', 'name', 'location', 'contact_person_name', 'created_by'], 'string', 'max' => 100],
            [['contact_person'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 500],
            [['name'], 'unique'],
            [['url'], 'unique'],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category' => 'category']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'username']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_info' => 'Id Info',
            'type_info' => 'Type Info',
            'category' => 'Category',
            'name' => 'Name',
            'location' => 'Location',
            'since' => 'Since',
            'description' => 'Description',
            'contact_person' => 'Contact Person',
            'contact_person_name' => 'Contact Person Name',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'url' => 'Url',
            'image' => 'Photo 1 (Optional)',
            'image2' => 'Photo 2 (Optional)',
            'image3' => 'Photo 3 (Optional)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['category' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['username' => 'created_by']);
    }

    public function beforeSave($insert) {
           
            
            $entities = array('?',' ');
            $replacements = array('','-');
            $this->url = str_replace($entities, $replacements, $this->name).'-'.$this->type_info;
            
            
        
            return parent::beforeSave($insert);
    }
}
