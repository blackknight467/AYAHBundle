<?php

namespace blackknight467\AYAHBundle\Validator;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Captcha validator
 *
 * @author Gregwar <g.passault@gmail.com>
 */
class AYAHValidator
{
    private $score;

    /**
     * @param boolean $score
     */
    public function __construct($score)
    {
        $this->score = $score;
    }

    /**
     * @param FormEvent $event
     */
    public function validate(FormEvent $event)
    {
        if ($this->score == false) {
            $form->addError(new FormError('You are not human, appearently... This is a problem'));
        }
    }
}
