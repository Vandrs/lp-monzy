<?php

namespace App\Services;

use Validator;
use App\Exceptions\ValidationException;
use App\Models\User;

class CreateUserService {

	private $validator;

	public function create(array $data)
	{
		$this->validator = Validator::make($data, $this->getRules(), $this->getMessages());
		if ($this->validator->fails()) {
			throw new ValidationException();
		}
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password'])
		]);
	}

	public function getRules () 
	{
		return [
	        'name' 	   => 'required|string|max:255',
	        'email'    => 'required|string|email|max:255|unique:users',
	        'password' => 'required|string|min:8',
	    ];
	}	


	public function getMessages() 
	{
		return [
			'name.required' => 'O parâmetro name é obrigatório', 
			'name.string' => 'O parâmetro name é inválido',
			'name.max' => 'O parâmetro name deve possuir no máximo 255 caracteres',
	        'email.required' => 'O parâmetro e-mail é obrigatório',
	        'email.string' => 'O parâmetro e-mail é inválido',
	        'email.email' => 'O parâmetro e-mail é inválido',
	        'email.max' => 'O parâmetro e-mail deve possuir no máximo 255 caracteres',
	        'password.required' => 'O parâmetro password é obrigratório',
	        'password.string' => 'O parâmetro password é inválido',
	        'password.min' => 'deve possuir no mpinimo 8 caracteres',
		];
	}

	public function getValidator()
	{
		return $this->validator;
	}

}

