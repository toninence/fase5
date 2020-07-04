<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use App\Controllers\Auth;

class Autenticacion implements FilterInterface
{
    public function before(RequestInterface $request)
    {        
        // Valida sesion previo a cargar los controladores
        $auth = new Auth;
        if (current_url() != base_url().'/'):
            if(!$auth->isLoggedIn()):
                if (
                    current_url().'/' != base_url('login').'/' && 
                    current_url() != base_url("/auth/login") && 
                    current_url() != base_url('registrar') && 
                    current_url() != base_url("/auth/registrar")
                ):
                    return redirect()->to(base_url("login"));   
                endif;
            elseif(current_url() === base_url('login')):
                    return redirect()->to(base_url('inicio'));
            else: //return redirect()->to(base_url('/home'));
            endif;
        endif;
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}