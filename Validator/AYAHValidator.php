<?php

namespace blackknight467\AYAHBundle\Validator;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Are You A Human validator
 */
class AYAHValidator
{
    private $score;
    private $error;
    /**
     * @param boolean $score
     */
    public function __construct($score, $error)
    {
        $this->score = $score;
        $this->error = $error;
    }

    /**
     * @param FormEvent $event
     */
    public function validate(FormEvent $event)
    {
        $form = $form = $event->getForm();

        if ($this->score == false) {
            $form->addError(new FormError($this->error));
        }
    }
}
