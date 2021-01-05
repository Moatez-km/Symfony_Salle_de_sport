<?php


namespace SalleBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextareaType::class,['attr'=>['class'=>'input']])

            ->add('password',PasswordType::class,['attr'=>['class'=>'input']]);

    }

    public function getName()
    {
        return 'User';
    }
}