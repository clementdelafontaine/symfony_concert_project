<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use App\Repository\EstablishmentRepository;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    private $twig;
    private $establishmentRepository;

    public function __construct(Environment $twig, EstablishmentRepository $establishmentRepository)
    {
        $this->twig = $twig;
        $this->establishmentRepository = $establishmentRepository;      
    }

    public function onKernelController(ControllerEvent $event)
    {
        $this->twig->addGlobal('establishment', $this->establishmentRepository->findAll());
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }
}
