<?php
/** 
* Esta classe é responsável disponibilizar uma busca onde o 
* usuário posa encontrar o melhor horário para poder reservar a sala
*
* @author Éverton Hilario <evertonjuru@gmail.com>
* @version 0.1 
* @access public  
*/ 

class AppointmentController extends Controller
{

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
				'actions'=>array('index', 'search','renderReservationPage','create'),
				'users'=>array('@'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	//variável que recebe o array de horas ocupadas
	public $checkAvailabilityOnTheDay 		= array();

	//variável que recebe o array de horas ocupadas pelo usuário logado
	public $checkUserAvailabilityInSession 	= array();

	//variável que recebe a estrutura html das views
	public $html = 'Não foi possível renderizar a tela, recarregue a página';


  	/** 
    * Tela para a busca do melhor horário para reserva de salas
    * @access public 
    * @return html     
    */ 
	public function actionIndex()
	{
		// renderiza a index com o formulário de busca pelo melhor horário para reservar a sala
		$this->render('index');
	}


  	/** 
    * Action que renderiza o resultado da busca
    * @access public 
    * @param POST
    * @return void     
    */ 
	public function actionSearch()
	{

		try 
		{

			//método que valida os dados vindo do formulário de busca
			$this->postValidator($_POST);

		    // seta variável que recebe o dia da pesquisa
		    // converte data para formato iso
   			$appointment_start 	= date('Y-m-d', CDateTimeParser::parse($_POST['appointment_start'], Yii::app()->locale->dateFormat));

   			//variável que recebe o id da sala
   			$room_room_id 		= $_POST['room_room_id'];

   			// método que verifica disponibilidade de horários
			$this->checkAvailabilityOnTheDay($appointment_start, $room_room_id);

   			// método que verifica disponibilidade de horários do usuário logado
			$this->checkUserAvailabilityInSession($appointment_start);

			// monta o html com o resultado da busca
			$this->html = $this->renderPartial('_grid',	null, true);

			if(empty($this->html)) throw new Exception('Erro ao gravar o html. Recarregue a página!');

			//retorna json com resultado da busca
		    $this->jsonStructureOfTheClass();


		}
		catch (Exception $e) 
		{
			$this->html = '<div class="alert alert-success" role="alert">'.$e->getMessage().'</div>';
			// imprime json com mensagem do sistema
		    $this->jsonStructureOfTheClass();

		}

	}

  	/** 
    * método que busca as reservas do suário que está logado (verifica disponibilidade do usuário na sessao)
    * @access private 
    * @param date $appointment_start
    * @param Int $user_id
    * @return void     
    */ 
	private function  checkUserAvailabilityInSession($appointment_start)
	{

		//realiza a busca na base de dados 
		$model =  Appointment::model()->findAll(
       		array(
                "condition" => "DATE(appointment_start) = :appointment_start and user_user_id = :user_user_id",
                "params"    => array(":appointment_start" => $appointment_start,":user_user_id" => Yii::app()->user->user_id)
			)
		);

		//se encontrou algum horário ocupado
		if(!empty($model))
		{
			//percorre a model de reservas
			foreach ($model as $key => $value) 
			{
				//adiciona os horários ocupados no array
				$this->checkUserAvailabilityInSession[] = strftime( '%H', strtotime($value->appointment_start));

			}
		}

	}

  	/** 
    * método que busca as reservas de uma determinada sala e data (verifica disponibilidade no dia)
    * @access private 
    * @param date $appointment_start
    * @param Int $room_room_id
    * @return void     
    */ 
	private function  checkAvailabilityOnTheDay($appointment_start, $room_room_id)
	{

		//realiza a busca na base de dados 
		$model =  Appointment::model()->findAll(

       		array(
                "condition" => "DATE(appointment_start) = :appointment_start and room_room_id = :room_room_id",
                "params"    => array(
                	":appointment_start" 	=> $appointment_start,
                	":room_room_id" 		=> $room_room_id
                )
			)

		);

		//se encontrou algum horário ocupado
		if(!empty($model))
		{
			//percorre a model de reservas
			foreach ($model as $key => $value) 
			{
				//adiciona os horários ocupados no array
				$this->checkAvailabilityOnTheDay[] = strftime( '%H', strtotime($value->appointment_start));

			}
		}

	}

  	/** 
    * método que valida o post vindo do formulário de busca de horários 
    * @access private 
    * @param post $post
    * @return void     
    */ 
	private function postValidator($post)
	{

		// verifica se foi passado parâmetros
		if(empty($_POST['room_room_id']) && empty($_POST['appointment_start'])) throw new Exception('Selecione uma sala e a data que você deseja reservar');

		// verifica se foi selecionada a sala
		if (empty($_POST['room_room_id'])) throw new Exception('Selecione uma sala');

		// verifica se foi selecionada a data
		if (empty($_POST['appointment_start'])) throw new Exception('Selecione uma data');

	}

  	/** 
    * método que retorna estrutura json comum dentro do contexto desta class 
    * @access private 
    * @return msg     
    */ 
	private function jsonStructureOfTheClass()
	{

		// retorna json
		echo json_encode(
	    	array(
	    		'html'	=> $this->html
    		)
    	);

	}

  	/** 
    * Action que renderiza a tela de reserva de sala
    * @access public 
    * @return html     
    */ 
	public function actionRenderReservationPage()
	{

		try 
		{

			//método que valida os dados vindo do formulário de busca
			$this->postValidator($_POST);

			$model=new Appointment;

			//seta o id da sala
			$model->room_room_id = $_POST['room_room_id'];

			//seta data hora da reserva
			$this->prepareAppointmentStartToRenderStandbyScreen($model);

			// monta o html com o formulário de reserva
			$this->html =	$this->renderPartial(
				'_formReserve',
				array(
					'model' => $model,
				),
				true
			);

			if(empty($this->html)) throw new Exception('Erro ao gravar o html. Recarregue a página!');

			//retorna json com tela de reserva de sala
		    $this->jsonStructureOfTheClass();


		}
		catch (Exception $e) 
		{
			$this->html = '<div class="alert alert-success" role="alert">'.$e->getMessage().'</div>';
			// imprime json com mensagem do sistema
		    $this->jsonStructureOfTheClass();

		}


	}

	

  	/** 
    * método que prepara appointment_start para renderizar tela de reserva
    * @access private 
    * @return int appointment_start     
    */ 
    private function prepareAppointmentStartToRenderStandbyScreen($model)
	{
		//concatena a data com a hora enviada via post
		$model->appointment_start = date('Y-m-d', CDateTimeParser::parse($_POST['appointment_start'], Yii::app()->locale->dateFormat)) . ' ' . str_pad($_POST['hour'], 2, 0, STR_PAD_LEFT);

	}

	/**
	 * action que realiza a resrva da sala
	 * se a criação for um sucesso redireciona fecha a modal e atualiza o resultado do search
	 */
	public function actionCreate()
	{

		try 
		{

			if(!isset($_POST['Appointment'])) throw new Exception('Recarregue a página e envie o formulário novamente');

			$model=new Appointment;

			$model->attributes=$_POST['Appointment'];

			if($model->save())
			{
				$this->html = '<div class="alert alert-success" role="alert">Sala reservada com sucesso</div>';

			}

			if(empty($this->html)) throw new Exception('Erro ao gravar o html. Recarregue a página!');

			//retorna json com tela de reserva de sala
		    $this->jsonStructureOfTheClass();


		}
		catch (Exception $e) 
		{
			$this->html = '<div class="alert alert-success" role="alert">'.$e->getMessage().'</div>';
			// imprime json com mensagem do sistema
		    $this->jsonStructureOfTheClass();

		}

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
