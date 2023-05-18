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
  <body>
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
        <h1 class="text-4xl text-zinc-800 font-bold">Cadastrar imóveis</h1>
        <p
          class="text-center max-w-sm font-lg leading-relaxed text-zinc-500 mt-4 mb-11"
        >
          Escolha um arquivo de imagem de um imóvel para cadastrar!
        </p>

        <form
          action="upload.php"
          method="post"
          enctype="multipart/form-data"
          class="flex flex-col items-center justify-center max-w-[400px] w-full"
        >
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
