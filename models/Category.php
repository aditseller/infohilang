<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id_category
 * @property string $category
 * @property string $url
 *
 * @property Info[] $infos
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'url'], 'required'],
            [['category'], 'string', 'max' => 100],
            [['url'], 'string', 'max' => 500],
            [['category'], 'unique'],
            [['url'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_category' => 'Id Category',
            'category' => 'Category',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfos()
    {
        return $this->hasMany(Info::className(), ['category' => 'category']);
    }
}
