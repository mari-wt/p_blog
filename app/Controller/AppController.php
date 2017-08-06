<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	
	public $components = array(
        'DebugKit.Toolbar',
        'Session',
        'Flash',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'posts',
                'action' => 'posts/index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'users/logout',
                'home'
            ),
            'authenticate' => array(
                'Form' => array(
					'userModel' => 'user',
					'fields' => array(
						'username' => 'username',
						'password' => 'password',
					),
//                    'passwordHasher' => 'Blowfish'
                )
            ),
			'authorize' => array('Controller')
        )
    );
	
	public function isAuthorized($user) {
		// Admin can access every action
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}

		// デフォルトは拒否
		return false;
	}
	
	public function beforeFilter() {
        $this->Auth->allow('index', 'view', 'pages');
    }
	
	
	public function initial_dataset() {
//		//カテゴリー
//		$this->loadModel('Category');
//		$conditions = $this->Category->getStatusAndTermConditions('Category');
//		$category_arr = $this->Category->find('all', array('conditions' => $conditions, 'order' => 'sort asc'));
//		$this->set('category_arr', $category_arr);
//		
		$category_arr = array();
		foreach ($sl_data as $key => $val) {
			if (!isset($category_arr[$val['SalesCategory']['page_layout_number']])) {
				$sales_categories[$val['SalesCategory']['page_layout_number']] = array();
			}
			$category_arr[$val['Category']['page_layout_number']][] = $val;
		}
		$this->set('category_arr', $category_arr);

	}
}
