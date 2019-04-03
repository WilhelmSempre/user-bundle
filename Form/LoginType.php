<?php

namespace WilhelmSempre\UserBundle\Form;

use Symfony\Bundle\SecurityBundle\Security\FirewallConfig;
use Symfony\Bundle\SecurityBundle\Security\FirewallMap;
use Symfony\Component\Form\AbstractType;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class LoginType
 * @package WilhelmSempre\UserBundle\Form
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
class LoginType extends AbstractType
{

    /**
     * @var Translator
     */
    private $translator;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var FirewallMap
     */
    private $firewallMap;

    /**
     * TwoFactorCodeForm constructor.
     * @param Translator $translator
     */
    public function __construct(Translator $translator, RequestStack $requestStack, FirewallMap $firewallMap)
    {
        $this->translator = $translator;
        $this->requestStack = $requestStack;
        $this->firewallMap = $firewallMap;
    }

    /**
     * @param FormBuilderInterface $formBuilder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $formBuilder, array $options): void
    {
        $formBuilder
            ->add('_username', TextType::class, [
                'constraints' => new NotBlank([
                    'message' => $this->translator
                        ->trans('login.errors.fill.username', [], 'login'),
                    'groups' => ['login'],
                ]),
                'label' => 'login.form.username.label',
                'required' => true,
                'attr' => [
                    'placeholder' => 'login.form.username.placeholder',
                ],
            ])
            ->add('_password', PasswordType::class, [
                'constraints' => new NotBlank([
                    'message' => $this->translator
                        ->trans('login.errors.fill.password', [], 'login'),
                    'groups' => ['login'],
                ]),
                'label' => 'login.form.password.label',
                'required' => true,
                'attr' => [
                    'placeholder' => 'login.form.password.placeholder',
                ],
            ])
            ->add('_submit', SubmitType::class, [
                'label' => 'login.form.submit.label',
            ])
        ;

        $firewallConfig = $this->firewallMap
            ->getFirewallConfig($this->requestStack->getCurrentRequest())
        ;

        if (true === in_array('remember_me', $firewallConfig->getListeners(), true)) {
            $formBuilder->add('_remember_me', CheckboxType::class, [
                'label' => 'login.form.rememberme.label',
                'required' => false,
            ]);
        }
    }

    /**
     * @return null|string
     */
    public function getBlockPrefix(): ?string
    {
        return null;
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
                'translation_domain' => 'login',
                'attr' => [
                    'novalidate' => 'novalidate',
                ],
                'validation_groups' => ['login'],
                'cascade_validation' => true,
            ])
        ;
    }
}
