<?PHP

App::uses('AppController', 'Controller');

class RestroTaxesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();

        // Allow users to register and logout. This makes this request public (no login needed)
        $this->Auth->allow('logout', 'forgot_password', 'request_new_password', 'reset_password', 'perform_reset_password', 'register', 'activate');
    }

    public function isAuthorized($user) {

        return parent::isAuthorized($user);
        return true;
    }

    public function index() {

        $restro_info = $this->viewVars['restro_info'];
        $this->loadModel('Restaurant');

        if ($this->request->is('put') || $this->request->is('post')) {
            // get the TaxMasters from the single checkbox data
            $this->request->data['TaxMaster']['TaxMaster'] = array();
            foreach ($this->request->data['TaxMaster']['checkbox'] as $k => $v) {
                if ($v)
                    $this->request->data['TaxMaster']['TaxMaster'][] = $k;
            }

            if ($this->Restaurant->save($this->request->data)) {
                $this->Session->setFlash(__('Taxes have been updated successfully'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect('/restro_taxes');
            } else {
                $this->Session->setFlash(__('Taxes could not be updated. Please review the fields an try again.'), 'default', array('class' => 'alert alert-danger'));
                return $this->redirect('/restro_taxes');
            }
        } else {
            $this->loadModel('TaxMaster');
            $taxMasters = $this->TaxMaster->find('all', array('order' => 'tax_name asc'));
            $this->set('taxMasters', $taxMasters);

            $options = array('conditions' => array('Restaurant.id' => $restro_info['Restaurant']['id']));
            $this->request->data = $this->Restaurant->find('first', $options);
        }
    }

}
?>
