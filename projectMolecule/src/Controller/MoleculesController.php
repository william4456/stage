<?php

namespace App\Controller;

use App\Entity\Molecule;
use App\Repository\MoleculeFileRepository;
use App\Repository\MoleculeRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Flex\Response;

class MoleculesController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('home/welcome.html.twig');
    }

    /**
     * @Route("/molecules", name="molecules")
     */
    public function molecule(MoleculeRepository $moleculeRepository)
    {
        $molecules = $moleculeRepository->findAll();


        return $this->render('molecules/index.html.twig', compact('molecules'));
    }

    /**
     * @Route("/molecules/{id}", name="molecules_name")
     */
    public function show($id, MoleculeRepository $moleculeRepository, MoleculeFileRepository $fileRepository)
    {
        $molecule = $moleculeRepository->find($id);
        $file = $fileRepository->findAll();

        $tab = array(
            'molecule'=>$molecule,
            'file'=>$file
        );
        return $this->render('molecules/show.html.twig', $tab);
    }

    public function navbar( MoleculeRepository $moleculeRepository){
        $molecules = $moleculeRepository->findAll();

        return $this->render('inc/navbar.html.twig', compact('molecules'));
    }
}
