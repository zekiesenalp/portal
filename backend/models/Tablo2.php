<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tablo".
 *
 * @property string $ad
 * @property string $soyad
 * @property string $date
 * @property string $email
 * @property string $konu
 * @property string $mesaj
 * @property int $phone_number
 * @property string $file_upload
 */
class Tablo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tablo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ad', 'soyad', 'email', 'konu', 'mesaj', 'phone_number', 'file_upload'], 'required'],
            [['date'], 'safe'],
            [['mesaj'], 'string'],
            [['phone_number'], 'integer'],
            [['ad', 'soyad'], 'string', 'max' => 50],
            [['email', 'konu'], 'string', 'max' => 100],
            [['file_upload'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ad' => 'Ad',
            'soyad' => 'Soyad',
            'date' => 'Date',
            'email' => 'Email',
            'konu' => 'Konu',
            'mesaj' => 'Mesaj',
            'phone_number' => 'Phone Number',
            'file_upload' => 'File Upload',
        ];
    }
}
