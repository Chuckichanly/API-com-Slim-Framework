<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

// Routes p produtos
  //http://localhost:82/api/v1/produtos
$app->group('/api/v1', function(){
  
  //adiciona produtos
  $this->post('/produtos/adiciona', function($request, $response){

    $dados = $request->getParsedBody();
    
    //Validar
    
    $produto = Produto::create($dados);
    return $response->withJson($produto );

  });
  
  //lista produtos - recupera produto para um determinado id
    //http://localhost:82/api/v1/produtos/lista/2
    $this->get('/produtos/lista/{id}', function($request, $response, $args){
      
    // var_dump($args);
    $produtos = Produto::findOrFail( $args['id'] );
    return $response->withJson($produtos);

  });
  
  //atualiza produto para um determinado id
    //http://localhost:82/api/v1/produtos/atualiza/2
    $this->put('/produtos/atualiza/{id}', function($request, $response, $args){
      
    $dados = $request->getParsedBody();
    $produtos = Produto::findOrFail( $args['id'] );
    $produtos->update($dados);
    return $response->withJson($produtos);

  });
  
  //atualiza produto para um determinado id
    //http://localhost:82/api/v1/produtos/delete/2
  $this->get('/produtos/remove/{id}', function($request, $response, $args){


    $produtos = Produto::findOrFail( $args['id'] );
    $produtos->delete();
    return $response->withJson($produtos);

  });
  

});