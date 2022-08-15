<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class ClientController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for client
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Client', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $client = Client::find($parameters);
        if (count($client) == 0) {
            $this->flash->notice("The search did not find any client");

            $this->dispatcher->forward([
                "controller" => "client",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $client,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a client
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $client = Client::findFirstByid($id);
            if (!$client) {
                $this->flash->error("client was not found");

                $this->dispatcher->forward([
                    'controller' => "client",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $client->getId();

            $this->tag->setDefault("id", $client->getId());
            $this->tag->setDefault("name", $client->getName());
            $this->tag->setDefault("address", $client->getAddress());
            $this->tag->setDefault("phone", $client->getPhone());
            
        }
    }

    /**
     * Creates a new client
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "client",
                'action' => 'index'
            ]);

            return;
        }

        $client = new Client();
        $client->setname($this->request->getPost("name"));
        $client->setaddress($this->request->getPost("address"));
        $client->setphone($this->request->getPost("phone"));
        

        if (!$client->save()) {
            foreach ($client->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "client",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("client was created successfully");

        $this->dispatcher->forward([
            'controller' => "client",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a client edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "client",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $client = Client::findFirstByid($id);

        if (!$client) {
            $this->flash->error("client does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "client",
                'action' => 'index'
            ]);

            return;
        }

        $client->setname($this->request->getPost("name"));
        $client->setaddress($this->request->getPost("address"));
        $client->setphone($this->request->getPost("phone"));
        

        if (!$client->save()) {

            foreach ($client->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "client",
                'action' => 'edit',
                'params' => [$client->getId()]
            ]);

            return;
        }

        $this->flash->success("client was updated successfully");

        $this->dispatcher->forward([
            'controller' => "client",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a client
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $client = Client::findFirstByid($id);
        if (!$client) {
            $this->flash->error("client was not found");

            $this->dispatcher->forward([
                'controller' => "client",
                'action' => 'index'
            ]);

            return;
        }

        if (!$client->delete()) {

            foreach ($client->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "client",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("client was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "client",
            'action' => "index"
        ]);
    }

}
