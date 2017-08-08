<?php

/** 
* Esta classe é responsável por validar o usuário para acessar o sistema
*
* @author Éverton Hilario <evertonjuru@gmail.com>
* @version 0.1 
* @access public  
*/ 
class UserIdentity extends CUserIdentity
{

	public function authenticate()
	{

		if(!empty($this->username))
		{

			$user = $this->getUser();

			if(!isset($user->user_name))
			{

				$this->errorCode=self::ERROR_USERNAME_INVALID;

			}
			elseif(!password_verify($this->password, $user->user_password))
			{

				$this->errorCode=self::ERROR_PASSWORD_INVALID;

			}
			else
			{
			
				$this->sessionStart($user);	

				$this->errorCode=self::ERROR_NONE;	
			}

		}
		else
		{

			$this->errorCode=self::ERROR_USERNAME_INVALID;

		}
		
						
		return !$this->errorCode;
	}

	private function getUser()
	{

		return User::model()->find(
			array(
                "condition" => "user_email = :user_email",
                "params"    => array(
                	":user_email" 	=> $this->username
                )
			)
		);
		
	}

	private function sessionStart($user)
	{

		@session_start(md5(time()));

		$this->setPersistentStates($_SESSION);

		//dados do usuaio
	 	$this->setState('user_id', $user->user_id);		
	 	$this->setState('user_name', $user->user_name);		
	 	$this->setState('user_email', $user->user_email);		
	 	$this->setState('permission', $user->permission);		

	}

}