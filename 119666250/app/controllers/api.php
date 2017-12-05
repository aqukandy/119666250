<?php
class API extends Controller{
    public function export(){
        //Parse url
        $url = $this->parseUrl();
        //getting info
        $users[] = array(
            'username'=>$url[2], 
            'email'=>$url[3],
            'lastLogged'=>$url[4],
            'numberOfNotes'=>$url[5]);
        
        //write to file.
        $file = 'userreport.json';
        $fp = fopen($file, 'w') or die("Unable to open file");
        fwrite($fp, json_encode($users));
        fclose($fp);
        
        //go back 
        $user = $this->model('User');
        $this->view('reports/users', $user);
    }
    
    public function parseUrl() {
        if (isset($_GET['url'])) {
            //trims the trailing forward slash (rtrim), sanitizes URL, explode it by forward slash to get elements
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}