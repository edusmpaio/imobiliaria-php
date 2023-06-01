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
  <body class="h-screen bg-zinc-100">
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
      <section class="flex items-center justify-center flex-col gap-8">
        <?php
        include 'conn.php';

        if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
          $target_dir = '../assets/uploads/';

          $target_file =
            $target_dir .
            date('YmdHis') .
            '.' .
            pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

          if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $nome = $_POST['nome'];
            $tipo = $_POST['tipo'];
            $categoria = $_POST['categoria'];
            $preco = $_POST['preco'];
            $image_name = $_FILES['image']['name'];
            $caminho = $target_file;
            
            $sql =
              "INSERT INTO imovel (nome, tipo, categoria, preco, image_name, caminho) VALUES ('$nome', '$tipo', '$categoria', $preco, '$image_name', '$caminho')";

            if (mysqli_query($conn, $sql)) {
              echo "<strong class='text-zinc-800 text-4xl max-w-lg text-center'>O imóvel foi cadastrado com sucesso.</strong>";
            } else {
              echo "<strong class='text-zinc-800 text-4xl max-w-lg text-center'>Erro ao cadastrar o imóvel</strong>";
            }
          } else {
            echo "<strong class='text-zinc-800 text-4xl max-w-lg text-center'>Erro ao fazer upload da imagem</strong>";
          }
        } else {
          echo "<strong class='text-zinc-800 text-4xl max-w-lg text-center'>Erro ao enviar a imagem</strong>";
        }

        mysqli_close($conn);
        ?>
        <a
          href="admin.php"
          class="bg-zinc-800 text-zinc-100 py-3 px-6 font-medium hover:bg-zinc-900"
        >
          Voltar ao início
        </a>
      </section>
    </main>
  </body>
</html>


