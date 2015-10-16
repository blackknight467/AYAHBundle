<?php

namespace blackknight467\AYAHBundle\Type;

use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use blackknight467\AYAHBundle\Service\AYAHService;

use blackknight467\AYAHBundle\Validator\AYAHValidator;

class AYAHType extends AbstractType
{
    /**
     * the are you a human object.
     * @var AYAH object
     */
    protected $ayah;
    protected $errorMessage;

    /**
     * Constructs a new AYAH instance and grabs the session secret if it exists.
     * @param string $publisherKey
     * @param string $scoringKey
     * @param string $webServiceHost
     * @throws InvalidArgumentException
     */
    public function __construct($publisherKey, $scoringKey, $ayahErrorMessage, $webServiceHost = 'ws.areyouahuman.com')
    {
        $this->errorMessage = $ayahErrorMessage;
        $this->ayah = new AYAHService($publisherKey, $scoringKey, $webServiceHost);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->key = 'ayahbundle_'.$builder->getForm()->getName();

        if (array_key_exists('assume_human', $options) && $options['assume_human'] == true) {
            //do not validate the form
        } else {
            $validator = new AYAHValidator(
                $this->ayah->scoreResult(),
                $this->errorMessage
            );

            $builder->addEventListener(FormEvents::POST_SUBMIT, array($validator, 'validate'));
        }

    }

    public function checkScore() {
        return $this->ayah->scoreResult();
    }

    /**
     * @param \Symfony\Component\Form\FormView $view
     * @param \Symfony\Component\Form\FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {

        $html = $this->ayah->getPublisherHTML();

        $isHuman = false;

        $view->vars = array_merge($view->vars, array(
            'ayah_html' => $html,
            'is_human' => $isHuman
        ));

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->options['mapped'] = false;
        $this->options['assume_human'] = false;
        $resolver->setDefaults($this->options);
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return 'form';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ayah';
    }
}
