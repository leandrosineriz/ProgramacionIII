<?php

interface IMiddleware{
    public function VerificarUsuario($request,$response,$next);
}


?>