<?php
/**
 * Created by PhpStorm.
 * User: Moatez
 * Date: 02/01/2021
 * Time: 11:49
 */

namespace SalleBundle\Controller;

use SalleBundle\Entity\Abonner;
use SalleBundle\Form\ModeleForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AbonnerController extends Controller
{

    public function listAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $modeles = $em->getRepository('SalleBundle:Abonner')->findAll();
        return $this->render('@Salle/Abonner/list.html.twig', array('modeles' => $modeles));
    }

    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('SalleBundle:Abonner')->find($id);

        if ($modele != null) {
            $em->remove($modele);
            $em->flush();
        } else {
            throw new NotFoundHttpException("le modeled'id" . $id . "n'existe pas");

        }

        return $this->redirectToRoute("salle_affichage_abonner");


    }

    public function addAction(Request $request)
    {
        $Abonner = new Abonner();
        $form = $this->createForm(ModeleForm::class, $Abonner);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Abonner);
            $em->flush();
            return $this->redirect($this->generateUrl("salle_affichage_abonner"));
        }
        return $this->render('@Salle/Abonner/add.html.twig',array('Form'=>$form->createView()));
    }
    public function updateAction(Request $request,$id){
        $em= $this->getDoctrine()->getManager();
        $Abonner = $em->getRepository('SalleBundle:Abonner')->find($id);

        $editform = $this->createForm(ModeleForm::class,$Abonner);
        $editform->handleRequest($request);
        if($editform->isSubmitted()&& $editform->isValid())
        {
            $em->persist($Abonner);
            $em->flush();
            return $this->redirect($this->generateUrl("salle_affichage_abonner"));
        }
        return $this->render('@Salle/Abonner/update.html.twig',array('editForm'=>$editform->createView()));



    }

}