<?php
/** 
* Esta classe é responsável por criar um dashbord com as principais ações do usuário e visualização de dados
* essa será a tela iicial
*
* @author Éverton Hilario <evertonjuru@gmail.com>
* @version 0.1 
* @access public  
*/ 

class DashboardController extends Controller
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
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{

		$model=new Appointment('searchDashboard');
		$model->unsetAttributes(); 
		if(isset($_GET['Appointment']))
			$model->attributes=$_GET['Appointment'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

}