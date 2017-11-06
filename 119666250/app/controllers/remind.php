<?php
class remind extends Controller {
    
    public function index($id = '') {		
        $user = $this->model('Reminders');
		$list = $user->get_reminders();
		
        if ($id) {
            $item = $user->get_reminder($id);
		print_r ($item);
            $this->view('home/update', ['item' => $item] );
			
	}
		
            $this->view('home/index', ['list' => $list]);
    }
	
    public function update($id) {
        $user = $this->model('Reminders');
        $item = $user->get_reminder($id);
	$this->view('home/update', ['item' => $item] );
			
    }
	
    public function remove($id = '') {
	$user = $this->model('Reminders');
	$user->removeItem($id);
	header('Location:/remind');
    }
	
    public function create() {
        $user = $this->model('User');
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $subjects = $_POST['username'];
            $description = $_POST['password'];
            $user->addToTable( $_SESSION['username'] , $subjects, $description);
	}

        $this->view('/home/remider');
        
    }
}