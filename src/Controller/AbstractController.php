<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class AbstractController
 * @package App\Controller
 */
abstract class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @var ValidatorInterface
     */
    private $validator;
    /**
     * @var Session
     */
    private $session;

    /**
     * AbstractController constructor.
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
        $this->session = new Session();
    }


    /**
     * @param array $parameters
     * @param Assert\Collection $constraint
     * @return \Symfony\Component\Validator\ConstraintViolationListInterface
     */
    protected function validate(array $parameters, Assert\Collection $constraint) :ConstraintViolationList
    {
        $errors = $this->validator->validate($parameters, $constraint);
        foreach ($errors as $error) {
            $this
                ->session
                ->getFlashBag()
                ->add('errors', $error->getPropertyPath() . ' ' . $error->getMessage());
        }
        return $errors;
    }

    /**
     * @return array
     */
    protected function getErrors() :array
    {
        return $this
            ->session
            ->getFlashBag()
            ->get('errors');
    }
}