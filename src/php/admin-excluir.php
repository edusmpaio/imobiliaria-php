<?php
 include 'conn.php';

 session_start();

 if (
   !isset($_SESSION['email']) == true and
   !isset($_SESSION['senha']) == true
 ) {
   header('location:form-login.php');
 }
 ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrador</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
  </head>
  <body class="bg-zinc-100">
    <header
      class="max-w-[1180px] mx-auto px-4 pt-6 flex items-center justify-between"
    >
      <a href="../index.html">
        <img src="../assets/logo.svg" alt="Brand Logo" class="w-24" />
      </a>

      <ul class="flex gap-6 items-center font-medium text-lg text-zinc-600">
        <li>
          <a href="../index.html" class="hover:text-zinc-800">Início</a>
        </li>
        <li>
          <a href="./immobiles.php" class="hover:text-zinc-800">Imóveis</a>
        </li>
        <li>
          <a href="#" class="hover:text-zinc-800">Contato</a>
        </li>
        <li>
          <a
            href="./logout.php"
            class="bg-zinc-800 text-zinc-100 py-2 px-4 font-medium hover:bg-zinc-900 flex items-center gap-3"
          >
            Sair
            <i class="ph ph-sign-out" style="font-size: 20px"></i>
          </a>
        </li>
      </ul>
    </header>

    <main class="max-w-[1180px] mx-auto px-4 my-16">
      <section class="flex flex-col items-center justify-center">
        <h1 class="text-4xl text-zinc-800 font-bold">Excluir imóveis</h1>
        <p
          class="text-center max-w-sm font-lg leading-relaxed text-zinc-500 mt-4 mb-11"
        >
          Selecione o imóvel que deseja excluir
        </p>
      </section>

        <?php
        include 'conn.php';

        $sql = 'SELECT * FROM imovel';
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          echo "<section class='grid grid-cols-3 gap-8'>";
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<a class='flex-1 shadow' href='excluir.php?id={$row['id']}'>";
            echo "<div class='h-[284px] w-full bg-[url(" .
              $row['caminho'] .
              ")] bg-no-repeat bg-cover bg-center'></div>";
            echo "<div class='bg-white py-8 px-6'>";
            echo "<strong class='text-zinc-800 font-bold text-2xl block mb-6'>".
            $row['nome'] ."</strong>";
            echo"<div class='flex items-center gap-6 mb-6'>";
            echo"<div class='flex items-center gap-1'>";
            echo"<i class='ph ph-shopping-bag text-lg'></i>";
            echo"<span class='text-base'>". $row['tipo'] ."</span>";
            echo"</div>";
            echo"<div class='flex items-center gap-1'>";
            echo"<i class='ph ph-house text-lg'></i>";
            echo"<span>". $row['categoria'] ."</span>";
            echo"</div>";
            echo"</div>";
            echo "<div class='flex items-center justify-between'>";
            echo "<strong class='text-lg text-zinc-700'>R$ ".
            number_format($row['preco'], 2, ',', '.') ."</strong>";
        
            echo '</div>';
            echo '</div>';
            echo '</a>';
          }
          echo '</section>';
        } else {
          echo "<p class='text-center max-w-md mx-auto font-lg leading-relaxed text-zinc-500 font-medium'>Ops! Ainda não há nenhum imóvel cadastrado!</p>";
        }
        mysqli_close($conn);
      ?>

    </main>
  </body>
</html>
