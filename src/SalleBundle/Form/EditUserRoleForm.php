<?php


namespace SalleBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EditUserRoleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Admin' => 'ROLE_USER',
                    'Coach' => 'ROLE_COACH',

                ],
                'expanded' => true,
                'multiple' => true,
                'label' => 'Rôles']);
    }

    public function getName()
    {
        return 'User';
    }
}