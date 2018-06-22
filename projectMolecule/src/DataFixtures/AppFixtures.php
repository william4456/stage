<?php
/**
 * Created by PhpStorm.
 * User: Wiliam
 * Date: 14/05/2018
 * Time: 11:44
 */

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Molecule;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->getUserData() as [$username, $password, $active]) {
            $user = new User();
            $user->setUsername($username);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setIsActive($active);
            $manager->persist($user);
            $this->addReference($username, $user);
        }
        $manager->flush();
    }

    private function getUserData(): array
    {
        return [
            ['admin', 'admin', 1]
        ];
    }

    private function getMolecule(): array
    {
        return [
            ['H2O', 'Water Molecule','Water (H2O) is a polar inorganic compound that is at room temperature a tasteless and odorless liquid, which is nearly colorless apart from an inherent hint of blue. It is by far the most studied chemical compound and is described as the "universal solvent" and the "solvent of life". It is the most abundant substance on Earth and the only common substance to exist as a solid, liquid, and gas on Earth\'s surface. It is also the third most abundant molecule in the universe.',1, 1]
        ];
    }

}