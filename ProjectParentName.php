<?php

namespace XandrieBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;


/**
 * @author Ibrahim Tounkara
 * @Annotation
 *
 */
class ProjectParentName extends Constraint{

	public $message = '%string% est déja utilisé en tant que nom de projet, veuillez en saisir un autre';



	public function validatedBy(){
		return 'constraint_validator_project_parent_name';
	}
}
