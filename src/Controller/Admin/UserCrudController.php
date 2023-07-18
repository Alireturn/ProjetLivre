<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\Uid\Uuid;

class UserCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return User::class;
    }



    public function configureFields(string $pageName,): iterable
    {

        return [
            TextField::new('name'),
            TextField::new('mail'),
            ImageField::new('avatar')->setBasePath('uploads/image')->setUploadDir('public/uploads/image')->setUploadedFileNamePattern('[randomhash].[extension]')->setRequired(false),
            ArrayField::new('roles'),

        ];
    }
}