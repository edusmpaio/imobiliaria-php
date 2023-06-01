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
      <section class="grid grid-cols-2 gap-28 px-6">
        <div>
          <h1 class="text-4xl text-zinc-800 font-bold mb-8">Alterar imóvel</h1>
      
          <?php
            include 'conn.php';

            $sql = "SELECT * FROM imovel WHERE id = ".$_GET['id'];

            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                echo "<a class='flex-1 shadow max-w-sm w-full' href='#'>";
                echo "<div class='h-80 w-full bg-[url(" .
                  $row['caminho'] .
                  ")] bg-no-repeat bg-cover bg-center'></div>";
                echo "<div class='bg-white pt-8 pb-10 px-6'>";
                echo "<strong class='text-zinc-800 font-bold text-2xl block mb-6'>".
                $row['nome'] ."</strong>";
                echo"<div class='flex items-center gap-6'>";
                echo"<div class='flex items-center gap-1'>";
                echo"<i class='ph ph-shopping-bag text-lg'></i>";
                echo"<span class='text-base'>". $row['tipo'] ."</span>";
                echo"</div>";
                echo"<div class='flex items-center gap-1'>";
                echo"<i class='ph ph-house text-lg'></i>";
                echo"<span>". $row['categoria'] ."</span>";
                echo"</div>";
                echo "<strong class='text-lg text-zinc-700'>R$ ".
                $row['preco'] ."</strong>";
                echo"</div>";
                echo '</div>';
                echo '</a>';
              }
            } else {
              echo "Erro: " . mysqli_error($conn);  
            }
            
            mysqli_close($conn);
          ?>
        </div>

        <form
          action="alterar.php?id=<?php echo $_GET['id'] ?>"
          method="post"
          enctype="multipart/form-data"
          class="flex flex-col items-start justify-center max-w-2xl w-full"
        >
          <strong class="text-2xl self-center text-center text-zinc-800 font-bold mb-8">Insira as novas informações do imóvel</strong>

          <div class="w-full mb-4">
            <label for="nome" class="text-start mb-1 block">Nome</label>

            <input required type="text" name="nome" id="nome" placeholder="Digite o nome do imóvel" class="w-full py-3 px-4 bg-white border border-zinc-300" />
          </div>

          <div class="w-full mb-4">
            <label for="tipo" class="text-start mb-1 block">Tipo</label>

            <select required name="tipo" id="tipo" class="w-full py-3 px-3 bg-white border border-zinc-300">
              <option value="Aluguel">Aluguel</option>
              <option value="Compra">Compra</option>
            </select>
          </div>

          <div class="w-full mb-4">
            <label for="categoria" class="text-start mb-1 block">Categoria</label>

            <select required name="categoria" id="categoria" class="w-full py-3 px-3 bg-white border border-zinc-300">
              <option value="Casa">Casa</option>
              <option value="Apartamento">Apartamento</option>
            </select>
          </div>

          <div class="w-full mb-4">
            <label for="preco" class="text-start mb-1 block">Preço</label>

            <input required type="number" name="preco" id="preco" min="1" max="900000.00" step="0" placeholder="300000.00" class="appearance-none w-full py-3 px-4 bg-white border border-zinc-300" />
          </div>

          <input type="file" name="image" />
          <input
            type="submit"
            value="Enviar"
            class="bg-zinc-800 text-zinc-100 py-3 px-6 font-medium hover:bg-zinc-900 w-full cursor-pointer mt-8"
          />
        </form>
      </section>
    </main>
  </body>
</html>





