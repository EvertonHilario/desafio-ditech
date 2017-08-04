<?php
/** 
* Esta classe é responsável buscar o melhor horário e reserva de salas
*
* @author Éverton Hilario <evertonjuru@gmail.com>
* @version 0.1 
* @access public  
*/ 

class AppointmentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index', 'search'),
				'users'=>array('@'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * action que renderiza a modal
	 */
	public function actionModal()
	{
		die('teste');
	}

	/**
	 * action que realiza a resrva da sala
	 * se a criação for um sucesso redireciona fecha a modal e atualiza o resultado do search
	 */
	public function actionCreate()
	{
		$model=new Appointment;

		if(isset($_POST['Appointment']))
		{
			$model->attributes=$_POST['Appointment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->appointment_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Deleta um usuário específico
	 * se a exclusão for um sucesso atualiza a grid
	 * @param integer $id identificador do usuário
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}



			// 'reservationPeriod'=>$this->reservationPeriod,

	/**
	 * Tela para a busca do melhor horário para reserva
	 */
	public function actionIndex()
	{

		$model=new Appointment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Appointment']))
			$model->attributes=$_GET['Appointment'];

		$this->render('index',array(
			'model'=>$model,
		));
	}


	// variável que recebe o período que poode ser resevada a sala
	public $reservationPeriod = array(
		'startTime'=>8,
		'endTime'=>18
	);

	/**
	 * Tela para a busca do melhor horário para reserva
	 */
	public function actionSearch()
	{


		$model = Appointment::model()->findAll(array("condition"=>"appointment_start =  '2017-08-29 09:00:00' and room_room_id = '1' "));

		if(empty($_POST['room_room_id']) || empty($_POST['appointment_start']))
		{

			$html ='Nenhum registro para esta pesquisa';

		}
		else
		{
			$html =	$this->renderPartial(
				'_grid',
				array(
					'reservationPeriod'	=>$this->reservationPeriod,
					'model'	=>$model,
				),
				true
			);

		}

		echo json_encode(
			array(
				'html'	=> $html
			)
		);

	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Appointment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Appointment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Appointment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='appointment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
