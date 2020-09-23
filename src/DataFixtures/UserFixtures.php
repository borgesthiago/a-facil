<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user
            ->setNome('Admin')
            ->setEmail('admin@admin.com')
            ->setPassword($this->passwordEncoder->encodePassword($user,
            '$argon2id$v=19$m=65536,t=4,p=1$ay9Va05ocXhlSEtRc3I2Yw$dRwaa8MXoTtDlgSRJp6GJvijUBM80bL3c32Wh65McIk')
        );
        $manager->flush();
    }
}
