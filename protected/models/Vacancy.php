<?php

/**
 * This is the model class for table "vacancy".
 *
 * The followings are the available columns in table 'vacancy':
 * @property integer $vacancy_id
 * @property string $vacancy_name
 * @property string $vacancy_description
 * @property integer $department_id
 *
 * The followings are the available model relations:
 * @property Department $department
 */
class Vacancy extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        static private $_vacancyLanguge=array();

        public function tableName()
	{
		return 'vacancy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vacancy_name, department_id', 'required'),
			array('department_id', 'numerical', 'integerOnly'=>true),
                        //array('department_name', 'length', 'max'=>100),
			array('vacancy_name', 'length', 'max'=>100),
			array('vacancy_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vacancy_id, vacancy_name, vacancy_description', 'safe', 'on'=>'search'),
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
			'department' => array(self::BELONGS_TO, 'Department', 'department_id',),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vacancy_id' => 'Vacancy',
			'vacancy_name' => 'Vacancy Name',
			'vacancy_description' => 'Vacancy Description',
                        'department_id'=>'department_id',
                        'department.department_name' => 'Department',
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
		$criteria=new CDbCriteria;
		$criteria->compare('vacancy_name',$this->vacancy_name,true);
		$criteria->compare('vacancy_description',$this->vacancy_description,true); 
                $criteria->compare('department_id',$this->department_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vacancy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
    public function getUrl()
    {
        return Yii::app()->createUrl('vacancy/view', array(
            'id'=>$this->vacancy_id,
        ));        
    }
    public static function getVacancyLanguge($id){
        if(!isset(self::$_vacancyLanguge[$id])){
            self::getVacancyLangugeAll();
        }
        return self::$_vacancyLanguge[$id];
    }
    
    public static function getVacancyLangugeAll(){
        if(empty(self::$_vacancyLanguge)){
            $models=VacancyLanguage::model()->with('language')->findAll();

            foreach ($models as $model){
                self::$_vacancyLanguge[$model['vacancy_id']].=' '. $model->language['language_iso'];
            }
        }
        return self::$_vacancyLanguge;

    }
}
