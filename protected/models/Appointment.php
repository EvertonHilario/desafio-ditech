<?php

/**
 * This is the model class for table "appointment".
 *
 * The followings are the available columns in table 'appointment':
 * @property integer $appointment_id
 * @property string $appointment_start
 * @property string $appointment_end
 * @property string $appointment_activiy_description
 * @property string $user_user_id
 * @property integer $room_room_id
 *
 * The followings are the available model relations:
 * @property Room $roomRoom
 * @property User $userUser
 */
class Appointment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'appointment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('appointment_start, appointment_end, user_user_id, room_room_id', 'required'),
			array('room_room_id', 'numerical', 'integerOnly'=>true),
			array('user_user_id', 'length', 'max'=>11),
			array('appointment_activiy_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('appointment_id, appointment_start, appointment_end, appointment_activiy_description, user_user_id, room_room_id', 'safe', 'on'=>'search'),
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
			'roomRoom' => array(self::BELONGS_TO, 'Room', 'room_room_id'),
			'userUser' => array(self::BELONGS_TO, 'User', 'user_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'appointment_id' => 'Appointment',
			'appointment_start' => 'Appointment Start',
			'appointment_end' => 'Appointment End',
			'appointment_activiy_description' => 'Appointment Activiy Description',
			'user_user_id' => 'User User',
			'room_room_id' => 'Room Room',
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

		$criteria->compare('appointment_id',$this->appointment_id);
		$criteria->compare('appointment_start',$this->appointment_start,true);
		$criteria->compare('appointment_end',$this->appointment_end,true);
		$criteria->compare('appointment_activiy_description',$this->appointment_activiy_description,true);
		$criteria->compare('user_user_id',$this->user_user_id,true);
		$criteria->compare('room_room_id',$this->room_room_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Appointment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
