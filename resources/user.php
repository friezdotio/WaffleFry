<?php


class User extends Controller
{

    public function get($id='')
    {   
        // Call any model
        $users = $this->user->getUsers();
        
        // Include a response code
        http_response_code(200);
        
        print json_encode($id);
    }

    public function insert($name,$email)
    {
       http_response_code(200);
    }
    
     public function delete($id)
    {
       http_response_code(200);
    }
    
}
