<?php


class Test extends Controller
{


    public function get()
    {   
        // Call any model
        $songs = $this->model->getAllSongs();
        
        // Include a response code
        http_response_code(200);
        
        print json_encode($songs);
    }

    public function insert()
    {
       
    }
    
    public function update()
    {
        
    }
    
     public function delete()
    {
        
    }
    
}
