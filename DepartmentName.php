<?php

namespace XandrieBundle\Validator\Constraints;
	
use Symfony\Component\Validator\Constraint;




/**
 *
 * @author Ibrahim Tounkara
 * @Annotation
 *
 */
class DepartementName extends Constraint{

	
		public $message = 'Le nom "%string%" est déjà utilisé, veuillez en choisir un autre';
	
	
		public function validatedBy() {
	
			return 'constraint_validator_departement_name';
		}
	
	
	
	
}
