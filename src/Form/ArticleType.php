<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('author')
            ->add('resume')
            ->add('image', FileType::class, [
                'label' => 'Brochure (JPEG file)',
                'mapped' => false,
                'required' => false,
                // 'constraints' => [
                //     new File([
                //         'mimeTypes' => [
                //             'application/jpeg',
                //         ],
                //         'mimeTypesMessage' => 'Please upload a valid image',
                //     ])
                // ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
