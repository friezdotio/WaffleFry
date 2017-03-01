<?php


class User extends Controller
{

    public function get()
    {   
        // Call any model
        $users = $this->usermodel->getUsers($id);
        
        // Include a response code
        http_response_code(200);
        
        print json_encode($users);
    }
}
