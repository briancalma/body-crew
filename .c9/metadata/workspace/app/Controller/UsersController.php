{"changed":true,"filter":false,"title":"UsersController.php","tooltip":"/app/Controller/UsersController.php","value":"<?php\nApp::uses('AppController', 'Controller');\n/**\n * Users Controller\n */\nclass UsersController extends AppController {\n\n/**\n * Scaffold\n *\n * @var mixed\n */\n\tpublic $scaffold;\n\t\n    public function beforeFilter() \n    {\n        parent::beforeFilter();\n        \n        $this->Auth->allow('signup','logout');\n    }\n    \n    private function _checkIfAlreadyLoginned()\n    {\n        # Checks if the user is already loginned \n        # If so then this action will redirect the user to the\n        # Dashboard / Main Page\n        \n        if( !empty( $this->Auth->user() ) )\n        {\n            return $this->redirect( $this->Auth->redirectUrl() );\n        }\n    }\n    \n    public function login()\n    {\n        if( $this->request->is('post') ) \n        {\n            if( $this->Auth->login() ) \n            {\n                return $this->redirect($this->Auth->redirectUrl());\n            }\n            $this->Flash->error(__('Username or Password is incorrect!'));\n        }\n        \n    }\n        \n    public function logout()\n    {\n        return $this->redirect($this->Auth->logout());\n    }\n    \n    public function signup()\n    {\n        $this->_checkIfAlreadyLoginned();\n        \n        \n        if( $this->request->is('post') )\n        {\n            $username = $this->request->data['User']['username'];\n            \n            $email = $this->request->data['User']['emailaddress'];\n            \n            $password = $this->request->data['User']['password'];\n            \n            $emailExist = $this->_checkIfEmailExist( $email );\n            \n            $usernameExist = $this->_checkIfUsernameExist( $username );\n            \n            $isPasswordMatch = $password ===  $this->request->data['User']['passwordb'];\n            \n            if(!$isPasswordMatch)\n                $this->Flash->error(__('Password field did not match!'));\n            \n            if( !$emailExist && !$usernameExist && $isPasswordMatch )\n            {\n                if( $this->User->save($this->request->data) )\n                {\n                    # TODO \n                    # 1. Send an email to the user account for account confirmation.\n                    # 2. Show Email Confirmation Page.       \n                    \n                    $this->Flash->success(__('Account Successfully Created! You can now login'));\n                    return $this->redirect(['action' => 'login']);\n                }\n            }\n        }\n    }\n    \n    private function _checkIfEmailExist( $email )\n    {\n        $count = $this->User->find( 'count', ['conditions' => ['User.emailaddress' => $email]] );\n        \n        if( $count > 0 )\n        {\n            $this->Flash->error(__('Email already exist!'));\n            return true;\n        }\n        \n        return false;\n    }\n    \n    private function _checkIfUsernameExist( $username )\n    {\n        $count = $this->User->find( 'count', ['conditions' => ['User.username' => $username]] );\n        \n        if( $count > 0 )\n        {\n            $this->Flash->error(__('Username already exist!'));\n            return true;\n        }   \n        \n        return false;\n    }\n    \n    public function my_profile() \n    {\n        $this->layout = 'Users/my_profile';   \n        $data = $this->User->findById($this->Auth->user('id'));\n        \n        $t = null;\n        \n        foreach($data as $d)\n        {\n            $t = $d;    \n        }\n        \n        # echo $t['firstname'];\n        \n        # debug($t);\n        \n        $data = $t;\n        \n        # exit();\n        $this->set(compact('data'));\n    }\n    \n    public function edit_profile($id = null)\n    {\n        if( empty($id) ) $id = $this->Auth->user('id');\n        \n        if( empty($this->request->data ) )\n        {\n            $this->request->data = $this->User->findById($id);    \n        }\n        else \n        {\n            if( $this->request->is(['post','put']) )\n            {\n                $this->User->id = $id;\n                \n                # debug($this->request->data);\n                \n                if( $this->User->save($this->request->data) )\n                {\n                    # $this->Auth->login( $this->request->data );\n                    \n                    $this->Flash->success(__('Updating Profile Success!'));\n                    \n                    $this->redirect(['action' => 'my_profile']);\n                }\n                \n                $this->Flash->error(__('Error in Updating Profile!'));\n            }\n        }\n    }\n}\n","undoManager":{"mark":94,"position":100,"stack":[[{"start":{"row":121,"column":4},"end":{"row":121,"column":8},"action":"remove","lines":["    "],"id":5362}],[{"start":{"row":121,"column":0},"end":{"row":121,"column":4},"action":"remove","lines":["    "],"id":5363}],[{"start":{"row":120,"column":8},"end":{"row":121,"column":0},"action":"remove","lines":["",""],"id":5364}],[{"start":{"row":121,"column":18},"end":{"row":121,"column":19},"action":"insert","lines":["a"],"id":5378}],[{"start":{"row":121,"column":19},"end":{"row":121,"column":20},"action":"insert","lines":["t"],"id":5379}],[{"start":{"row":121,"column":20},"end":{"row":121,"column":21},"action":"insert","lines":["a"],"id":5380}],[{"start":{"row":121,"column":29},"end":{"row":121,"column":30},"action":"remove","lines":["a"],"id":5381}],[{"start":{"row":121,"column":28},"end":{"row":121,"column":29},"action":"remove","lines":["t"],"id":5382}],[{"start":{"row":121,"column":27},"end":{"row":121,"column":28},"action":"remove","lines":["a"],"id":5383}],[{"start":{"row":126,"column":8},"end":{"row":126,"column":18},"action":"remove","lines":["debug($t);"],"id":5384}],[{"start":{"row":126,"column":4},"end":{"row":126,"column":8},"action":"remove","lines":["    "],"id":5385}],[{"start":{"row":126,"column":0},"end":{"row":126,"column":4},"action":"remove","lines":["    "],"id":5386}],[{"start":{"row":125,"column":8},"end":{"row":126,"column":0},"action":"remove","lines":["",""],"id":5387}],[{"start":{"row":126,"column":4},"end":{"row":126,"column":8},"action":"remove","lines":["    "],"id":5388}],[{"start":{"row":126,"column":0},"end":{"row":126,"column":4},"action":"remove","lines":["    "],"id":5389}],[{"start":{"row":125,"column":8},"end":{"row":126,"column":0},"action":"remove","lines":["",""],"id":5390}],[{"start":{"row":127,"column":8},"end":{"row":127,"column":9},"action":"insert","lines":["#"],"id":5391}],[{"start":{"row":127,"column":9},"end":{"row":127,"column":10},"action":"insert","lines":[" "],"id":5392}],[{"start":{"row":129,"column":9},"end":{"row":129,"column":10},"action":"remove","lines":[" "],"id":5393}],[{"start":{"row":129,"column":8},"end":{"row":129,"column":9},"action":"remove","lines":["#"],"id":5394}],[{"start":{"row":129,"column":33},"end":{"row":129,"column":34},"action":"insert","lines":[","],"id":5395}],[{"start":{"row":129,"column":34},"end":{"row":129,"column":35},"action":"insert","lines":["$"],"id":5396}],[{"start":{"row":129,"column":35},"end":{"row":129,"column":36},"action":"insert","lines":["t"],"id":5397}],[{"start":{"row":129,"column":8},"end":{"row":129,"column":9},"action":"insert","lines":["#"],"id":5398}],[{"start":{"row":129,"column":9},"end":{"row":129,"column":10},"action":"insert","lines":[" "],"id":5399}],[{"start":{"row":127,"column":9},"end":{"row":127,"column":10},"action":"remove","lines":[" "],"id":5400}],[{"start":{"row":127,"column":8},"end":{"row":127,"column":9},"action":"remove","lines":["#"],"id":5401}],[{"start":{"row":128,"column":8},"end":{"row":129,"column":8},"action":"remove","lines":["# debug($data);","        "],"id":5402}],[{"start":{"row":126,"column":8},"end":{"row":127,"column":8},"action":"insert","lines":["# debug($data);","        "],"id":5403}],[{"start":{"row":126,"column":9},"end":{"row":126,"column":10},"action":"remove","lines":[" "],"id":5404}],[{"start":{"row":126,"column":8},"end":{"row":126,"column":9},"action":"remove","lines":["#"],"id":5405}],[{"start":{"row":126,"column":18},"end":{"row":126,"column":19},"action":"remove","lines":["a"],"id":5406}],[{"start":{"row":126,"column":17},"end":{"row":126,"column":18},"action":"remove","lines":["t"],"id":5407}],[{"start":{"row":126,"column":16},"end":{"row":126,"column":17},"action":"remove","lines":["a"],"id":5408}],[{"start":{"row":126,"column":15},"end":{"row":126,"column":16},"action":"remove","lines":["d"],"id":5409}],[{"start":{"row":126,"column":14},"end":{"row":126,"column":15},"action":"remove","lines":["$"],"id":5410}],[{"start":{"row":126,"column":14},"end":{"row":126,"column":15},"action":"insert","lines":["t"],"id":5411}],[{"start":{"row":126,"column":14},"end":{"row":126,"column":15},"action":"remove","lines":["t"],"id":5412}],[{"start":{"row":126,"column":14},"end":{"row":126,"column":15},"action":"insert","lines":["$"],"id":5413}],[{"start":{"row":126,"column":15},"end":{"row":126,"column":16},"action":"insert","lines":["t"],"id":5414}],[{"start":{"row":126,"column":8},"end":{"row":126,"column":9},"action":"insert","lines":["#"],"id":5415}],[{"start":{"row":126,"column":9},"end":{"row":126,"column":10},"action":"insert","lines":[" "],"id":5416}],[{"start":{"row":125,"column":8},"end":{"row":126,"column":0},"action":"insert","lines":["",""],"id":5417},{"start":{"row":126,"column":0},"end":{"row":126,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":126,"column":8},"end":{"row":127,"column":0},"action":"insert","lines":["",""],"id":5418},{"start":{"row":127,"column":0},"end":{"row":127,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":126,"column":8},"end":{"row":126,"column":9},"action":"insert","lines":["e"],"id":5419}],[{"start":{"row":126,"column":9},"end":{"row":126,"column":10},"action":"insert","lines":["c"],"id":5420}],[{"start":{"row":126,"column":10},"end":{"row":126,"column":11},"action":"insert","lines":["h"],"id":5421}],[{"start":{"row":126,"column":11},"end":{"row":126,"column":12},"action":"insert","lines":["o"],"id":5422}],[{"start":{"row":126,"column":12},"end":{"row":126,"column":13},"action":"insert","lines":[" "],"id":5423}],[{"start":{"row":126,"column":13},"end":{"row":126,"column":14},"action":"insert","lines":["$"],"id":5424}],[{"start":{"row":126,"column":14},"end":{"row":126,"column":15},"action":"insert","lines":["t"],"id":5425}],[{"start":{"row":126,"column":15},"end":{"row":126,"column":17},"action":"insert","lines":["[]"],"id":5426}],[{"start":{"row":126,"column":17},"end":{"row":126,"column":18},"action":"insert","lines":[";"],"id":5427}],[{"start":{"row":126,"column":16},"end":{"row":126,"column":18},"action":"insert","lines":["\"\""],"id":5428}],[{"start":{"row":126,"column":16},"end":{"row":126,"column":18},"action":"remove","lines":["\"\""],"id":5429}],[{"start":{"row":126,"column":16},"end":{"row":126,"column":18},"action":"insert","lines":["''"],"id":5430}],[{"start":{"row":126,"column":17},"end":{"row":126,"column":18},"action":"insert","lines":["f"],"id":5431}],[{"start":{"row":126,"column":18},"end":{"row":126,"column":19},"action":"insert","lines":["i"],"id":5432}],[{"start":{"row":126,"column":19},"end":{"row":126,"column":20},"action":"insert","lines":["r"],"id":5433}],[{"start":{"row":126,"column":20},"end":{"row":126,"column":21},"action":"insert","lines":["s"],"id":5434}],[{"start":{"row":126,"column":21},"end":{"row":126,"column":22},"action":"insert","lines":["t"],"id":5435}],[{"start":{"row":126,"column":22},"end":{"row":126,"column":23},"action":"insert","lines":["n"],"id":5436}],[{"start":{"row":126,"column":23},"end":{"row":126,"column":24},"action":"insert","lines":["a"],"id":5437}],[{"start":{"row":126,"column":24},"end":{"row":126,"column":25},"action":"insert","lines":["m"],"id":5438}],[{"start":{"row":126,"column":25},"end":{"row":126,"column":26},"action":"insert","lines":["e"],"id":5439}],[{"start":{"row":126,"column":8},"end":{"row":126,"column":9},"action":"insert","lines":["#"],"id":5440}],[{"start":{"row":126,"column":9},"end":{"row":126,"column":10},"action":"insert","lines":[" "],"id":5441}],[{"start":{"row":130,"column":8},"end":{"row":130,"column":9},"action":"insert","lines":["#"],"id":5442}],[{"start":{"row":130,"column":9},"end":{"row":130,"column":10},"action":"insert","lines":[" "],"id":5443}],[{"start":{"row":131,"column":9},"end":{"row":131,"column":10},"action":"remove","lines":[" "],"id":5444}],[{"start":{"row":131,"column":8},"end":{"row":131,"column":9},"action":"remove","lines":["#"],"id":5445}],[{"start":{"row":131,"column":8},"end":{"row":131,"column":9},"action":"insert","lines":["#"],"id":5446}],[{"start":{"row":131,"column":9},"end":{"row":131,"column":10},"action":"insert","lines":[" "],"id":5447}],[{"start":{"row":130,"column":9},"end":{"row":130,"column":10},"action":"remove","lines":[" "],"id":5448}],[{"start":{"row":130,"column":8},"end":{"row":130,"column":9},"action":"remove","lines":["#"],"id":5449}],[{"start":{"row":129,"column":8},"end":{"row":130,"column":0},"action":"insert","lines":["",""],"id":5450},{"start":{"row":130,"column":0},"end":{"row":130,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":129,"column":8},"end":{"row":129,"column":9},"action":"insert","lines":["$"],"id":5451}],[{"start":{"row":129,"column":8},"end":{"row":129,"column":9},"action":"remove","lines":["$"],"id":5452}],[{"start":{"row":129,"column":8},"end":{"row":130,"column":0},"action":"insert","lines":["",""],"id":5453},{"start":{"row":130,"column":0},"end":{"row":130,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":130,"column":8},"end":{"row":130,"column":9},"action":"insert","lines":["R"],"id":5454}],[{"start":{"row":130,"column":8},"end":{"row":130,"column":9},"action":"remove","lines":["R"],"id":5455}],[{"start":{"row":130,"column":8},"end":{"row":130,"column":9},"action":"insert","lines":["$"],"id":5456}],[{"start":{"row":130,"column":9},"end":{"row":130,"column":10},"action":"insert","lines":["d"],"id":5457}],[{"start":{"row":130,"column":10},"end":{"row":130,"column":11},"action":"insert","lines":["a"],"id":5458}],[{"start":{"row":130,"column":11},"end":{"row":130,"column":12},"action":"insert","lines":["t"],"id":5459}],[{"start":{"row":130,"column":12},"end":{"row":130,"column":13},"action":"insert","lines":["a"],"id":5460}],[{"start":{"row":130,"column":13},"end":{"row":130,"column":14},"action":"insert","lines":[" "],"id":5461}],[{"start":{"row":130,"column":14},"end":{"row":130,"column":15},"action":"insert","lines":["="],"id":5462}],[{"start":{"row":130,"column":15},"end":{"row":130,"column":16},"action":"insert","lines":[" "],"id":5463}],[{"start":{"row":130,"column":16},"end":{"row":130,"column":17},"action":"insert","lines":["t"],"id":5464}],[{"start":{"row":130,"column":16},"end":{"row":130,"column":17},"action":"remove","lines":["t"],"id":5465}],[{"start":{"row":130,"column":16},"end":{"row":130,"column":17},"action":"insert","lines":["$"],"id":5466}],[{"start":{"row":130,"column":17},"end":{"row":130,"column":18},"action":"insert","lines":["t"],"id":5467}],[{"start":{"row":130,"column":18},"end":{"row":130,"column":19},"action":"insert","lines":[";"],"id":5468}],[{"start":{"row":133,"column":37},"end":{"row":133,"column":38},"action":"remove","lines":["t"],"id":5469}],[{"start":{"row":133,"column":36},"end":{"row":133,"column":37},"action":"remove","lines":["$"],"id":5470}],[{"start":{"row":133,"column":35},"end":{"row":133,"column":36},"action":"remove","lines":[","],"id":5471}],[{"start":{"row":133,"column":9},"end":{"row":133,"column":10},"action":"remove","lines":[" "],"id":5472}],[{"start":{"row":133,"column":8},"end":{"row":133,"column":9},"action":"remove","lines":["#"],"id":5473}],[{"start":{"row":132,"column":8},"end":{"row":132,"column":9},"action":"insert","lines":["#"],"id":5474}],[{"start":{"row":132,"column":9},"end":{"row":132,"column":10},"action":"insert","lines":[" "],"id":5475}]]},"ace":{"folds":[{"start":{"row":15,"column":5},"end":{"row":19,"column":4},"placeholder":"..."},{"start":{"row":34,"column":5},"end":{"row":44,"column":4},"placeholder":"..."},{"start":{"row":47,"column":5},"end":{"row":49,"column":4},"placeholder":"..."},{"start":{"row":52,"column":5},"end":{"row":86,"column":4},"placeholder":"..."},{"start":{"row":89,"column":5},"end":{"row":99,"column":4},"placeholder":"..."},{"start":{"row":102,"column":5},"end":{"row":112,"column":4},"placeholder":"..."},{"start":{"row":137,"column":5},"end":{"row":164,"column":4},"placeholder":"..."}],"scrolltop":507,"scrollleft":0,"selection":{"start":{"row":132,"column":10},"end":{"row":132,"column":10},"isBackwards":true},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1529393729264}