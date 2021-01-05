<?php


namespace SalleBundle\Controller;


use SalleBundle\Entity\Abonner;

use SalleBundle\Form\ModifyUserAccountForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    //modifier son compte
    public function ModifyAccountAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $passwordEncoder = $this->get('security.password_encoder');

        $editform = $this->createForm(ModifyUserAccountForm::class, $user);
        $editform->handleRequest($request);

        if ($editform->isSubmitted() && $editform->isValid())
        {
            $hash= $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl("salle_affichage_abonner"));
        }

        return $this->render('@Salle/User/modifyAccount.html.twig',array(
            'editForm' => $editform->createView()
        ));

    }

    //envoyer un message
    public function SendMessageAction()
    {
        return $this->render('@Salle/User/SendMessage.html.twig');
    }

    public function listAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $modeles = $em->getRepository('SalleBundle:User')->findAll();
        return $this->render('@Salle/User/listUser.html.twig', array('modeles' => $modeles));
    }
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('SalleBundle:User')->find($id);

        if ($modele != null) {
            $em->remove($modele);
            $em->flush();
        } else {
            throw new NotFoundHttpException("le modeled'id" . $id . "n'existe pas");

        }

        return $this->redirectToRoute("salle_affichage_user");


    }
}