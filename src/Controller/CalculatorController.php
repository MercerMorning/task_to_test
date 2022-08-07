<?php

namespace App\Controller;

use App\Dispatcher\QueueDispatcherInterface;
use App\Enums\MathOperationsQueue;
use App\Message\MathOperation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CalculatorController
 * @package App\Controller
 */
class CalculatorController extends AbstractController
{
    /**
     * @param Request $request
     * @return Response
     */
    #[Route('/calculator', name: 'app_calculator', methods: 'get')]
    public function index(Request $request): Response
    {
        $errors = $this->getErrors();
        $parameters['results'] = $request->query->all('results');
        $parameters['errors'] = $errors;
        return $this->render('calculator/index.html.twig', $parameters);
    }

    /**
     * @param Request $request
     * @param QueueDispatcherInterface $dispatcher
     * @return mixed
     */
    #[Route('/calculator/calculate', name: 'app_calculator.calculate', methods: 'post')]
    public function calculate(Request $request, QueueDispatcherInterface $dispatcher):Response
    {
        $parameters = [];

        $constraint = new Assert\Collection([
            'number1' => [
                new Assert\NotBlank(),
                new Assert\Regex('%\d%')
            ],
            'number2' => [
                new Assert\NotBlank(),
                new Assert\Regex('%\d%')
            ],
            'operation' => new Assert\Choice([
                'plus', 'minus', 'times', 'divided by'
            ]),
        ]);
        $parameters['errors'] = $this->validate($request->request->all(), $constraint);

        if (count($parameters['errors']) === 0) {
            $dispatcher->dispatch(new MathOperation(
                $request->get('operation'),
                $request->get('number1'),
                $request->get('number2')
            ));
        }

        return $this->redirect($this->generateUrl('app_calculator', $parameters));
    }

    /**
     * @param QueueDispatcherInterface $dispatcher
     * @return mixed
     */
    #[Route('/calculator/process', name: 'app_calculator.process', methods: 'post')]
    public function process(QueueDispatcherInterface $dispatcher) :Response
    {
        $results = $dispatcher->consume(MathOperationsQueue::NAME);
        return $this->redirect($this->generateUrl('app_calculator', array('results' => $results)));
    }


}
