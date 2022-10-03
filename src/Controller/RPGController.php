<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PersonnageRepository;
use App\Repository\TypePersonnageRepository;
use App\Entity\Personnage;
use App\Entity\TypePersonnage;
use App\Form\PersonnageType;
use App\Form\TypeClasseType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Controller\EntityManagerInterface;

class RPGController extends AbstractController
{
    /**
    * @Route("/", name="home")
     */ 
    public function index(PersonnageRepository $repository): Response
    {
        $personnages = $repository->findAll();
        return $this->render('rpg/index.html.twig',[
            'personnages' => $personnages
        ]) ;
    }
   
     /**
    * @Route("/personnage/add", name="addpersonnage")
     */ 
    public function create(Request $request ): Response
    {
        $personnage = new Personnage();
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);
        
        if ($form->isSubmitted()&& $form->isValid()){
            $personnage = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($personnage);
            $em->flush();
            echo 'Ajout réussi';
        }
        return $this->render('rpg/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
     /**
    * @Route("/personnage/edit/{id}", name="edit_personnage")
     */ 
    public function editPersonnage(Request $request,$id)
    {
        $personnage = $this->getDoctrine()->getRepository(Personnage::class);
        $personnage = $personnage->find($id);
        if (!$personnage){
            throw $this->createNotFoundException(
                'Aucun personnage pour l\'id: ' . $id
            );
        }
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $personnage = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($personnage);
            $em->flush();
            echo 'Modification réussi';
        }
        return $this->render('rpg/edit.html.twig',[
            'form' => $form->createView()
        ]) ;
    }
     /**
    * @Route("/personnage/{id}", name="view_personnage")
     */ 
    public function viewPersonnage($id)
    {
        $personnage = $this->getDoctrine()->getRepository(Personnage::class);
        $personnage = $personnage->find($id);
        if (!$personnage){
            throw $this->createNotFoundException(
                'Aucun personnage pour l\'id: ' . $id
            );
        }
        return $this->render('rpg/rpg.html.twig',[
            'personnage' => $personnage
        ]) ;
    }
    
     /**
    * @Route("/type", name="types")
     */ 
    public function type(TypePersonnageRepository $repository): Response
    {
        $types = $repository->findAll();
        return $this->render('rpg/type.html.twig',[
            'types' => $types
        ]) ;
    }
     /**
     * @Route("/personnage/delete/{id}" , name="personnage_delete")
     */
    public function deletePersonnage($id) {

        $em = $this->getDoctrine()->getManager();
        $personnage = $this->getDoctrine()->getRepository(Personnage::class);
        $personnage = $personnage->find($id);

        if (!$personnage) {
            throw $this->createNotFoundException(
                'Aucun personnage pour l\' id: ' . $id
            );
        }

        $em->remove($personnage);
        $em->flush();

        return $this->redirect($this->generateUrl('home'));

    }
     /**
     * @Route("/type/delete/{id}" , name="type_delete")
     */
    public function deleteType($id) {

        $em = $this->getDoctrine()->getManager();
        $types = $this->getDoctrine()->getRepository(TypePersonnage::class);
        $types = $types->find($id);

        if (!$types) {
            throw $this->createNotFoundException(
                'Aucun type pour l\' id: ' . $id
            );
        }

        $em->remove($types);
        $em->flush();

        return $this->redirect($this->generateUrl('types'));

    }
    /**
    * @Route("/type/{id}", name="edit_type")
     */ 
    public function editType(Request $request,$id)
    {
        $type = $this->getDoctrine()->getRepository(TypePersonnage::class);
        $type = $type->find($id);
        if (!$type){
            throw $this->createNotFoundException(
                'Aucun type pour l\'id: ' . $id
            );
        }
        $form = $this->createForm(TypeClasseType::class, $type);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $type = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();
            echo 'Modification réussi';
        }
        return $this->render('rpg/edit.html.twig',[
            'form' => $form->createView()
        ]) ;
    }
    
}