<?php

namespace App\Enums;

class EnumProfile
{
	const TEACHER = 'teacher';
	const STUDENT = 'student';
	const BOTH = 'both';

	public static function getValues()
	{
		return [self::TEACHER, self::STUDENT, self::BOTH];
	}

	public static function getLabel($profile)
	{
		$labels = self::getLabels();
		return isset($labels[$profile]) ? $labels[$profile] : null ;
	}

	public static function getLabels()
	{
		return [
			self::TEACHER => 'Treinador', 
			self::STUDENT => 'Aluno', 
			self::BOTH 	  => 'Ambos'
		];
	}
}
