<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-zinc-100">
    <main class="max-w-[1180px] mx-auto px-4 my-16">
      <section class="flex items-center flex-col">
        <a href="../index.html" class="mb-6">
          <img src="../assets/logo.svg" alt="Brand Logo" class="w-32" />
        </a>

        <h1 class="text-4xl text-zinc-800 font-bold">Faça seu login</h1>
        <p class="max-w-md font-lg leading-relaxed text-zinc-500 mt-4 mb-11">
          Entre na sua conta para acessar o painel de administrador
        </p>

        <form
          action="do-login.php"
          method="post"
          class="flex flex-col items-center justify-center max-w-[400px] w-full"
        >
          <div class="text-left w-full mb-4">
            <label for="email" class="mb-2 block font-medium text-zinc-800"
              >E-mail</label
            >
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Digite seu e-mail"
              class="w-full py-3 px-4 bg-white border border-zinc-300"
            />
          </div>

          <div class="text-left w-full mb-8">
            <label for="password" class="mb-2 block font-medium text-zinc-800"
              >Senha</label
            >
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Digite sua senha"
              class="w-full py-3 px-4 bg-white border border-zinc-300"
            />
          </div>

          <input
            type="submit"
            value="Entrar"
            class="bg-zinc-800 text-zinc-100 py-3 font-medium hover:bg-zinc-900 w-full cursor-pointer text-base"
          />
        </form>

        <p class="mt-8 text-zinc-600">
          Ainda não tem uma conta?
          <a
            href="./form-register.php"
            class="text-zinc-800 font-medium hover:underline"
            >Fazer cadastro</a
          >
        </p>
      </section>
    </main>
  </body>
</html>
