<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 25/04/2018
 * Time: 17:44
 */
namespace App\Form;

use App\Entity\Comanda;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComandaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estado', TextType::class, ['error_bubbling' => true])
            ->add('cuenta', TextType::class, ['error_bubbling' => true]) /*El error building es para tratar los errores de los campos como errores del fomrulario.*/
            ->add('camarero', TextType::class, ['error_bubbling' => true])
            ->add('mesa', TextType::class, ['error_bubbling' => true])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Comanda::class,
        ));
    }

}