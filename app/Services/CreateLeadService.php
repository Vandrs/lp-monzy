<?php 

namespace App\Services;

use Validator;
use Illuminate\Validation\Rule;
use App\Models\Lead;
use App\Enums\EnumProfile;
use App\Exceptions\ValidationException;
use App\Utils\StringUtil;

class CreateLeadService
{

	private $validator;

	public function create(array $data)
	{
		$this->validator = Validator::make($data, $this->getRules(), $this->getMessages());
		if ($this->validator->fails()) {
			throw new ValidationException();
		}
		return Lead::create([
			'name'  => $data['name'], 
			'email' => $data['email'], 
			'phone' => StringUtil::justNumbers($data['phone']), 
			'profile' => isset($data['profile']) ? $data['profile'] : null,
		]);
	}

	public function getRules() 
	{
		return [
			'name' 	  => 'required|string|max:255',
	        'email'   => 'required|string|email|max:255',
	        'profile' => [
	        	'required',
	        	Rule::in([
		        	EnumProfile::TEACHER,
		        	EnumProfile::STUDENT,
		        	EnumProfile::BOTH
	        ])]
        ];
	}

	public function getMessages()
	{
		return [
			'name.required'    => 'O Nome é obrigatório',
			'name.string' 	   => 'Nome inválido',
			'name.max' 		   => 'O Nome deve possuir no máximo 255 caracteres',
			'email.required'   => 'O E-mail é obrigatório',
			'email.string' 	   => 'E-mail inválido',
			'email.max' 	   => 'O E-mail deve possuir no máximo 255 caracteres',
			'email.email' 	   => 'E-mail inválido',
			'profile.required' => 'Informe se você gostaria de ser um Treinador ou um Aluno',
			'profile.in' 	   => 'Opção de perfil inválida'
		];
	}

	public function getValidator()
	{
		return $this->validator;
	}
}