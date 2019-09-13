<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "movie".
 *
 * @property int $id
 * @property string $name
 * @property string $descrip
 * @property string $released_date
 * @property int $image
 */
class Movie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $image;

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
            [['name', 'descrip', 'released_date', 'image'], 'required'],
            [['descrip'], 'string'],
            [['released_date'], 'safe'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image->saveAs('uploads/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'descrip' => 'Descrip',
            'released_date' => 'Released Date',
            'image' => 'Image',
        ];
    }
}
