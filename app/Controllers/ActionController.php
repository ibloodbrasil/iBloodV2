<?php

namespace App\Controllers;

use CodeIgniter\Shield\Controllers\ActionController as ShieldLogin;

class ActionController extends ShieldLogin
{
    public function show()
    {
        return $this->action->show();
    }
    public function verify()
    {   
        return $this->action->verify($this->request);
    }
    public function handle()    
    {
        return $this->action->handle($this->request);
    }
}
