<?php

namespace WilhelmSempre\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class LoginAbstractForm
 * @package WilhelmSempre\UserBundle\Form
 *
 * @author Rafał Głuszak <rafal.gluszak@gmail.com>
 */
abstract class LoginAbstractForm extends AbstractType
{

    /**
     * @param FormBuilderInterface $formBuilder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $formBuilder, array $options): void
    {
        $formBuilder
            ->add('_username', TextType::class, [
                'constraints' => new NotBlank(),
                'label' => 'login.form.username.label',
                'required' => true,
                'attr' => [
                    'placeholder' => 'login.form.username.placeholder',
                ],
            ])
            ->add('_password', PasswordType::class, [
                'constraints' => new NotBlank(),
                'label' => 'login.form.password.label',
                'required' => true,
                'attr' => [
                    'placeholder' => 'login.form.password.placeholder',
                ],
            ])
            ->add('_remember', CheckboxType::class, [
                'label' => 'login.form.rememberme.label',
                'required' => false,
            ])
            ->add('_submit', SubmitType::class, [
                'label' => 'login.form.submit.label',
            ])
        ;
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
            ])
        ;
    }
}