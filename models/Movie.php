<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movie".
 *
 * @property int $id
 * @property string $name
 * @property string $descrip
 * @property string $released_date
 * @property string $image
 */
class Movie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */


    public static function tableName()
    {
        return 'movie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'descrip', 'released_date','image'], 'required'],
            [['descrip'], 'string'],
            [['released_date'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'descrip' => 'Description',
            'released_date' => 'Released Date',
            'image' => 'Image',
        ];
    }
}
