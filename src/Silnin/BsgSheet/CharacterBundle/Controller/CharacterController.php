<?php

namespace Silnin\BsgSheet\CharacterBundle\Controller;

use Silnin\BsgSheet\CharacterBundle\Service\CharacterSecurityService;
use Silnin\BsgSheet\CharacterBundle\Service\CharacterService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Silnin\BsgSheet\CharacterBundle\Entity\Character;
use Silnin\BsgSheet\CharacterBundle\Form\CharacterType;


/**
 * Character controller.
 *
 * @Route("/characterOld")
 */
class CharacterController extends Controller
{
    /**
     * Lists all Character entities.
     *
     * @Route("/", name="character")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        /** @var CharacterService $characterService */
        $characterService = $this->get('character.service');
        return $characterService->listMySheets();
    }

    /**
     * Creates a new Character entity.
     *
     * @Route("/", name="character_create")
     * @Method("POST")
     * @Template("CharacterBundle:Character:new.html.twig")
     */
    public function createAction(Request $request)
    {
        /** @var CharacterSecurityService $characterSecurityService */
        $characterSecurityService = $this->get('character.security.service');

        $entity = new Character();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $characterSecurityService->grantAccessToOwnContent($entity);

            return $this->redirect($this->generateUrl('character_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Character entity.
     *
     * @param Character $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Character $entity)
    {
        $form = $this->createForm(new CharacterType(), $entity, array(
            'action' => $this->generateUrl('character_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Character entity.
     *
     * @Route("/new", name="character_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Character();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Character entity.
     *
     * @Route("/{id}", name="character_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        /** @var CharacterSecurityService $characterSecurityService */
        $characterSecurityService = $this->get('character.security.service');

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CharacterBundle:Character')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Character entity.');
        }

        $characterSecurityService->checkAccess($entity);

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Character entity.
     *
     * @Route("/{id}/edit", name="character_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        /** @var CharacterSecurityService $characterSecurityService */
        $characterSecurityService = $this->get('character.security.service');

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CharacterBundle:Character')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Character entity.');
        }

        $characterSecurityService->checkAccess($entity);

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Character entity.
    *
    * @param Character $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Character $entity)
    {
        $form = $this->createForm(new CharacterType(), $entity, array(
            'action' => $this->generateUrl('character_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Character entity.
     *
     * @Route("/{id}", name="character_update")
     * @Method("PUT")
     * @Template("CharacterBundle:Character:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        /** @var CharacterSecurityService $characterSecurityService */
        $characterSecurityService = $this->get('character.security.service');

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CharacterBundle:Character')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Character entity.');
        }

        $characterSecurityService->checkAccess($entity);

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('character_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Character entity.
     *
     * @Route("/{id}", name="character_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        /** @var CharacterSecurityService $characterSecurityService */
        $characterSecurityService = $this->get('character.security.service');

        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CharacterBundle:Character')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Character entity.');
            }

            $characterSecurityService->checkAccess($entity);

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dashboard'));
    }

    /**
     * Creates a form to delete a Character entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('character_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
