<?php

namespace BloxSys\UsuariosBundle\Controller;

use BloxSys\UsuariosBundle\Entity\Usuario;
use BloxSys\UsuariosBundle\Form\UsuarioType;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use BloxSys\UsuariosBundle\Form\UsuarioFilterType;


/**
 * Usuario controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("usuario")
 */
class UsuarioController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = [
        'yml' => 'BloxSys/UsuariosBundle/Resources/config/Usuario.yml',
    ];

    /**
     * Lists all Usuario entities.
     *
     * @Route("/", name="usuario")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $this->config['filterType'] = UsuarioFilterType::class;
        $response = parent::indexAction($request);

        return $response;
    }

    /**
     * Creates a new Usuario entity.
     *
     * @Route("/", name="usuario_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $this->config['newType'] = UsuarioType::class;
        $response = parent::createAction($request);

        return $response;
    }

    /**
     * Displays a form to create a new Usuario entity.
     *
     * @Route("/new", name="usuario_new")
     * @Method("GET")
     */
    public function newAction()
    {
        $this->config['newType'] = UsuarioType::class;
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Usuario entity.
     *
     * @Route("/{id}", name="usuario_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     * @Route("/{id}/edit", name="usuario_edit")
     * @Method("GET")
     */
    public function editAction($id)
    {
        $this->config['editType'] = UsuarioType::class;
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Usuario entity.
     *
     * @Route("/{id}", name="usuario_update")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $id)
    {
        $this->config['editType'] = UsuarioType::class;
        $response = parent::updateAction($request, $id);

        return $response;
    }

    /**
     * Deletes a Usuario entity.
     *
     * @Route("/{id}", name="usuario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $response = parent::deleteAction($request, $id);

        return $response;
    }

    /**
     * Exporter Usuario.
     *
     * @Route("/exporter/{format}", name="usuario_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}
