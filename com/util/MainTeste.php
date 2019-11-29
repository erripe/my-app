<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
//include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/model/Pessoa.class.php';
include $_SERVER['DOCUMENT_ROOT'] . '/my-app/com/model/Produto.class.php';


// $pessoa = new Pessoa();
// $pessoa->pesDesNome = 'Test CRUD';

// print_r($pessoa->list());
// echo "<br>";
// echo $pessoa->insert();
// echo "<br>";
// $pessoa->pesDesNome = 'Test CRUDDDDDDD';
// echo $pessoa->update();
// echo "<br>";
// print_r($pessoa->list());
// echo "<br>";
// echo $pessoa->findById($pessoa->pesCod)->pesDesNome;
// echo "<br>";
// echo $pessoa->delete();
// echo "<br>";
// echo "<br>";
// echo "<br>";

$url = 'https://decathlonpro.vteximg.com.br/arquivos/ids/2088859-1000-1000/-w-100-m-black-1.jpg';
$image = utf8_decode(file_get_contents($url));
//echo $image;
$produto = new Produto();
$produto->prdDesNome = 'Relógio';
$produto->prdDtaCadastro = date("d/m/Y");
$produto->prdEspDesc = 'Relógio bem barato.';
$produto->prdEspImg = $image;
$produto->prdMnyValor = 50.00;

// //print_r($produto->list()->count);
// echo "<br>";
//echo $produto->insert();
// echo "<br>";
// $produto->prdDesNome = 'Test CRUDDDDDDD';
// echo $produto->update();
// echo "<br>";
// //print_r($produto->list()->count);
// //echo "<br>";
echo $produto->findById(81)->prdEspImg;
// echo "<br>";
//echo $produto->delete(23);
