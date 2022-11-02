<?php
//Esse codigo if aqui permite que voce só execute o db.php via linha de comando, pra que voce nao crie um DB novo toda vez q der f5 na pagina, p evitar dor de cabeça
if (PHP_SAPI == 'cli-server') {
  exit('Rodar via CLI');
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'produtos';

$schema->dropIfExists($tabela);

//crie a tabela produtos
$schema->create($tabela, function ($table){

  $table->increments('id');
  $table->string('titulo', 100);
  $table->text('descricao');
  $table->decimal('preco',11,2);
  $table->string('fabricante',60);
  $table->timestamps();
});

$db->table($tabela)->insert([
  'titulo' => 'Smartphone Motorola Moto G6 32GB',
  'descricao' => 'Android oreo - 8.0 tela 5" Octa core',
  'preco' => 899.00,
  'fabricante' => 'Motorola',
  'created_at' => '2019-10-22',
  'updated_at' => '2019-10-22'
]);

$db->table($tabela)->insert([
  'titulo' => 'iPhone X cinza Espacial 64GB',
  'descricao' => 'Tela 5.8" IOS 12 Camera 12MB',
  'preco' => 4999.00,
  'fabricante' => 'Apple',
  'created_at' => '2020-01-10',
  'updated_at' => '2020-01-10'
]);


?>