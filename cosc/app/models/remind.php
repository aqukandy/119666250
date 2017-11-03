<?php

class Remind extends Controller {
	
    public function index($id = '') {		
        $r = $this->model('Reminders');
		$list = $r->get_reminders();
		
		if ($id) {
			$item = $r->get_reminder($id);
			
			print_r ($item);
			
			//$this->view('remind/view', ['item' => $item] );
			die;
		}
		
		$this->view('remind/index', [
		'list' => $list
		] );
    }
	
	public function update($id) {
		$r = $this->model('Reminders');
        $item = $r->get_reminder($id);
		
		$this->view('remind/update', ['item' => $item] );
			
    }
	
	public function remove($id = '') {
		$r = $this->model('Reminders');
		$r->removeItem($id);
		header('Location:/remind');
    }
	
	public function create() {
        $this->view('home/login');
    }
}