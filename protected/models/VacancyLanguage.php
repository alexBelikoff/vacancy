<?php

/**
 * This is the model class for table "vacancy_language".
 *
 * The followings are the available columns in table 'vacancy_language':
 * @property integer $language_id
 * @property integer $vacancy_id
 * @property string $vacancy_name
 * @property string $vacancy_description
 */
class VacancyLanguage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vacancy_language';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('language_id, vacancy_id', 'required'),
			array('language_id, vacancy_id', 'numerical', 'integerOnly'=>true),
			array('vacancy_name', 'length', 'max'=>100),
			array('vacancy_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('language_id, vacancy_id, vacancy_name, vacancy_description', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'language' => array(self::BELONGS_TO, 'language', 'language_id',),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'language_id' => 'Language',
			'vacancy_id' => 'Vacancy',
			'vacancy_name' => 'Vacancy Name',
			'vacancy_description' => 'Vacancy Description',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('vacancy_id',$this->vacancy_id);
		$criteria->compare('vacancy_name',$this->vacancy_name,true);
		$criteria->compare('vacancy_description',$this->vacancy_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VacancyLanguage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
