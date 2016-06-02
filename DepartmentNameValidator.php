<?php

namespace XandrieBundle\Validator\Constraints;


use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;


class DepartementNameValidator extends ConstraintValidator{
	
	
	protected $em;
	
	
	public function __construct($em){
		$this->em = $em;
	}
	
	
	public function validate($value, Constraint $constraint){
		$Iddep  = $this->context->getRoot()->getData()->getIddepartement(); // data from the form
		$action = $this->context->getRoot()->getConfig()->getAttributes()['data_collector/passed_options']['action'];

		
		$id_name_exist = $this->em->getRepository('AppBundle:Departement')->findOneBy(array('name' => $value, 'iddepartement' => $Iddep));
		$dep_name_exist = $this->em->getRepository('AppBundle:Departement')->findOneBy(array('name' => $value));
		
		if (strpos($action,'/departement/edit') !== false){
			if(is_null($id_name_exist)){
				if(!is_null($dep_name_exist)){
					$this->attachViolation($value, $constraint);
				}
			}
		}
		
		if (strpos($action,'/departement/new') !== false) {
			if (!is_null($dep_name_exist)){
				$this->attachViolation($value, $constraint);
			}
		}
	}
	
	

	/**
	 * Build and add an assert to the form
	 * @param unknown $value
	 * @param unknown $constraint
	 */
	private function attachViolation($value, Constraint $constraint){
		$this->context->buildViolation($constraint->message)
		->atPath('property')
		->setParameter('%string%', $value)
		->addViolation();
	}
	
}
