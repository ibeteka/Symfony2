<?php

namespace XandrieBundle\Validator\Constraints;


use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;


class ProjectParentNameValidator extends ConstraintValidator{
	
	protected $em;	
	
	public function __construct($em){
		$this->em = $em;

	}
	
	
	
	
	public function validate($value, Constraint $constraint){
		$project = $this->context->getRoot()->getData();
		
		if(is_null($project->getParentId()) || empty($project->getParentId())){
			$e = $this->em->getRepository('AppBundle:Project')->findBy(array('name' => $project->getName()));
		
			
			if(isset($e[0])){
				$this->context->buildViolation($constraint->message)
				->atPath('property')
				->setParameter('%string%', $value)
				->addViolation();
			}
		}		
	}
	
	
	
}	
