<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component
{
    private $_headerMenu = [
        'navbar-left' => [
            'index' => [
                'caption' => 'Home',
                'action' => 'index'
            ],
            'invoices' => [
                'caption' => 'Invoices',
                'action' => 'index'
            ],
            'about' => [
                'caption' => 'About',
                'action' => 'index'
            ],
            'contact' => [
                'caption' => 'Contact',
                'action' => 'index'
            ],
        ],
        'navbar-right' => [
            'session' => [
                'caption' => 'Log In/Sign Up',
                'action' => 'index'
            ],
        ]
    ];

    private $_tabs = [
        'Invoices' => [
            'controller' => 'invoices',
            'action' => 'index',
            'any' => false
        ],
        'Companies' => [
            'controller' => 'companies',
            'action' => 'index',
            'any' => true
        ],
        'Products' => [
            'controller' => 'products',
            'action' => 'index',
            'any' => true
        ],
        'Product Types' => [
            'controller' => 'producttypes',
            'action' => 'index',
            'any' => true
        ],
        'Client' => [
            'controller' => 'client',
            'action' => 'index',
            'any' => false
        ],
        'Your Profile' => [
            'controller' => 'invoices',
            'action' => 'profile',
            'any' => false
        ]
    ];

    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {

        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['navbar-right']['session'] = [
                'caption' => 'Log Out',
                'action' => 'end'
            ];
        } else {
            unset($this->_headerMenu['navbar-left']['invoices']);
        }

        $controllerName = $this->view->getControllerName();
         echo '<div class="navbar-collapse collapse">';
        foreach ($this->_headerMenu as $position => $menu) {
           
            echo '<div class="menu">';
            echo '<ul class="nav nav-tabs" ', $position, ' role="tablist">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li role="presentation"  class="active">';
                } else {
                    echo '<li role="presentation" >';
                }
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
            
        }
        echo '</div>';

    }

    /**
     * Returns menu tabs
     */
    public function getTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li style="color:black" class="active">';
            } else {
                echo '<li style="color:black" >';
            }
            // echo $this->tag->linkTo($option['controller'] . '/' . $option['action'],$caption ), '</li>';
            echo '<a href="/invo/'.$option['controller'] .'/'.$option['action'].'" style=" color: black;">'.$caption.'</a></li>';
        }
        echo '</ul>';
    }
}
