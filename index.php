<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Carrinho compras PHP</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <h2 class="title">Carrinho com PHP</h2>
    <div class="carrinho-container">
    <?php

  $items = array(
    ['nome' => 'Produto 1','imagem' => 'item1.png', 'preco' => '200'],
    ['nome' => 'Produto 2','imagem' => 'item2.png', 'preco' => '100'],
    ['nome' => 'Produto 3', 'imagem' => 'item3.png', 'preco' => '400']
  );

  foreach($items as $key => $value){
?>
    <div class="produto">
      <img src="<?php echo $value['imagem'] ?>" />
      <a href="?adicionar=<?php echo $key; ?>">Adicionar ao carrinho!</a>
    </div><!-- produto -->
<?php
  }
?>
    </div><!-- carrinho container -->

    <?php
      if(isset($_GET['adicionar'])){
        // adiciona ao carrinho
        $idProduto = (int) $_GET['adicionar'];

        if(isset($items[$idProduto])){
          if(isset($_SESSION[$idProduto])){
            $_SESSION[$_SESSION[$idProduto]['quantidade']]++;
          }else{
            $_SESSION[$idProduto] = array('quantidade' => 1, 'nome' => $items[$idProduto]['nome'], 'preco' => $items[$idProduto]['preco']);
          }
          echo '<script>alert("O item foi adicionado ao carrinho.");</script>';
        }else{
          die('Você não pode adicionar um item que não existe.');
        }
      }
    ?>

    <!-- <h2 class="title">Carrinho:</h2> -->

    <!-- <?php
      // foreach($_SESSION['carrinho'] as $key => $value){

      // }
    ?> -->
  </body>
</html>