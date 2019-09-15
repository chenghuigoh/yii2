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
    public $image1;

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
            [['name', 'descrip', 'released_date', 'image'], 'required'],
            [['descrip', 'image'], 'string'],
            [['released_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['image1'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png'],

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

    public function upload()
    {
        if ($this->image1) {
            $this->image1->saveAs('../uploads/movie/' . $this->image1->baseName . '.' .
                $this->image1->extension);
            $this->image = $this->image1->baseName . '.' . $this->image1->extension;
            $this->image1 = null;
            echo "<script>console.log('true' );</script>";
            return $this;
        } else {
            echo "<script>console.log('false' );</script>";
            return $this;
        }
    }
}
