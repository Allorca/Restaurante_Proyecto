<?php
/**
 * Created by PhpStorm.
 * User: Alexis
 * Date: 25/04/2018
 * Time: 17:44
 */
namespace App\Form;
use App\Entity\Comanda;
use App\Entity\Producto;
use App\Repository\ProductoRepository;

use Doctrine\ORM\QueryBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\ChoiceList\Factory\ChoiceListFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComandaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('camarero', TextType::class, array('label'=>'Camarero', 'error_bubbling'=>true))
            ->add('prod1', EntityType::class, array(
                'label'         => 'Hamburguesa',
                'class'         => Producto::class,
                'query_builder' => function(ProductoRepository $repo3){
                    return $repo3->createQueryBuilder('p')->where('p.tipo = :tipo')
                        ->setParameter('tipo', '1');

                    }
                )
            )
            ->add('prod2', EntityType::class, array(
                    'label'         => 'Complementos',
                    'class'         => Producto::class,
                    'query_builder' => function(ProductoRepository $repo3){
                        return $repo3->createQueryBuilder('p')->where('p.tipo = :tipo')
                            ->setParameter('tipo', '2');

                    }
                )
            )
            ->add('prod3', EntityType::class, array(
                    'label'         => 'Bebidas',
                    'class'         => Producto::class,
                    'query_builder' => function(ProductoRepository $repo3){
                        return $repo3->createQueryBuilder('p')->where('p.tipo = :tipo')
                            ->setParameter('tipo', '3');

                    }
                )
            )
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Comanda::class,
        ));
    }

}