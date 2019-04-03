<?php

namespace WilhelmSempre\UserBundle\Form;

use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class TwoFactorCodeType
 * @package WilhelmSempre\UserBundle\Form
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class TwoFactorCodeType extends AbstractType
{

    /**
     * @var Translator
     */
    private $translator;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var string
     */
    private $redirect;

    /**
     * TwoFactorCodeForm constructor.
     * @param Translator $translator
     */
    public function __construct(Translator $translator, RouterInterface $router, string $redirect)
    {
        $this->translator = $translator;
        $this->router = $router;
        $this->redirect = $redirect;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('_code', TextType::class, [
                'constraints' => new NotBlank([
                    'message' => $this->translator->trans('two.factor.errors.fill.code', [], '2f'),
                ]),
                'required' => true,
                'label' => 'two.factor.form.code.label',
                'attr' => [
                    'placeholder' => 'two.factor.form.code.placeholder',
                ],
            ])
            ->add('_redirect', HiddenType::class, [
                'attr' => [
                    'value' => '',
                ],
            ])
            ->add('_submit', SubmitType::class, [
                'label' => 'two.factor.form.submit.label',
            ])
        ;
    }

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return '';
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefaults([
                'data_class' => null,
                'method' => 'post',
                'translation_domain' => '2f',
                'attr' => [
                    'novalidate' => 'novalidate',
                ]
            ])
        ;
    }
}