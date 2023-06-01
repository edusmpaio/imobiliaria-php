<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Imobiliária</title>

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
          <a href="#" class="hover:text-zinc-800">Imóveis</a>
        </li>
        <li>
          <a href="#" class="hover:text-zinc-800">Contato</a>
        </li>
      </ul>
    </header>

    <main class="max-w-[1180px] mx-auto px-4 my-24">
      <section class="flex items-center justify-center flex-col mb-16">
        <h1 class="text-5xl font-bold text-zinc-800">Imóveis disponíveis</h1>
        <p
          class="text-center max-w-md font-lg leading-relaxed text-zinc-500 mt-8"
        >
          Navegue pela nossa lista de imóveis ou utilize o filtro de pesquisa
          para buscar exatamente o que você deseja.
        </p>

        <form class="bg-white mt-6 flex items-center gap-6 p-6 shadow" method="GET">
          <select
            class="bg-zinc-100 border border-zinc-200 py-2 px-4 text-zinc-800"
            name="tipo"
            id="tipo"
          >
            <option value="" selected disabled>Tipo</option>
            <option value="Aluguel">Aluguel</option>
            <option value="Compra">Compra</option>
          </select>
          <select
            class="bg-zinc-100 border border-zinc-200 py-2 px-4 text-zinc-800"
            name="categoria"
            id="categoria"
          >
              <option value="" selected disabled>Categoria</option>
              <option value="Casa">Casa</option>
              <option value="Apartamento">Apartamento</option>
          </select>
          <select
            class="bg-zinc-100 border border-zinc-200 py-2 px-4 text-zinc-800"
            name="valor_maximo"
            id="valor_maximo"
          >
            <option value="" selected disabled>Valor máximo</option>
            <option value="300000.00">R$ 300.000,00</option>
            <option value="600000.00">R$ 600.000,00</option>
            <option value="900000.00">R$ 900.000,00</option>
          </select>

          <button
            type="submit"
            class="bg-zinc-800 text-zinc-100 py-2 px-4 font-medium hover:bg-zinc-900"
          >
            Filtrar imóveis
          </button>
        </form>
      </section>
        <?php
        include 'conn.php';

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
          $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
          $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
          $valorMaximo = isset($_GET['valor_maximo']) ? $_GET['valor_maximo'] : '';

          $sql = 'SELECT * FROM imovel WHERE 1=1';

          if (!empty($tipo)) {
            $sql .= " AND tipo = '$tipo'";
          }

          if (!empty($categoria)) {
            $sql .= " AND categoria = '$categoria'";
          }

          if (!empty($valorMaximo)) {
            $sql .= " AND preco <= '$valorMaximo'";
          }
        } else {
          $sql = 'SELECT * FROM imovel';
        }

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          echo "<section class='grid grid-cols-3 gap-8'>";
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<a class='flex-1 shadow' href='#'>";
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
            echo "<button class='bg-zinc-800 text-zinc-100 py-2 px-4 font-medium hover:bg-zinc-900'>Saiba mais</button>";
            echo '</div>';
            echo '</div>';
            echo '</a>';
          }
          echo '</section>';
        } else {
          echo "<p class='text-center max-w-md mx-auto font-lg leading-relaxed text-zinc-500 font-medium'>Ops! Ainda não há imóveis cadastrados!</p>";
        }
        mysqli_close($conn);
        ?>
    </main>

    <footer
      class="max-w-[1180px] mx-auto px-4 py-11 flex items-center justify-between border-t border-gray-300"
    >
      <a href="../index.html">
      <img src="../assets/logo.svg" alt="Brand Logo" class="w-24" />
      </a>
    
      <p>© 2023 Brand. Todos os direitos reservados</p>
    </footer>
  </body>
</html>
