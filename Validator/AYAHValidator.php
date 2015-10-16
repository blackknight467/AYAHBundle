<?php

namespace blackknight467\AYAHBundle\Validator;

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;

/**
 * Are You A Human validator
 */
class AYAHValidator
{
    private $score;
    private $error;

    /**
     * @param        $score
     * @param String $error
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
        $form = $event->getForm();

        if ($this->score == false) {
            $form->addError(new FormError($this->error));
        }
    }
}
