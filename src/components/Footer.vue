<template>
  <footer class="bg-gray-900" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
      <div class="xl:grid xl:grid-cols-3 xl:gap-8">
        <div class="space-y-8">
          <div class="flex items-center gap-3">
             <img class="h-10 w-auto rounded-full" src="@/assets/logo-empresa.jpeg" alt="Hacienda Sol Radiante" />
             <span class="text-xl font-bold text-white">Hacienda Sol Radiante</span>
          </div>
          <p class="text-sm leading-6 text-gray-300">
            Llevando lo mejor del campo mexicano al mundo. Calidad, frescura y compromiso en cada envío.
          </p>
          <div class="flex space-x-6">
            <!-- Social icons placeholder -->
          </div>
        </div>
        <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
          <div class="md:grid md:grid-cols-2 md:gap-8">
            <div>
              <h3 class="text-sm font-semibold leading-6 text-white">Productos</h3>
              <ul role="list" class="mt-6 space-y-4">
                <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Mango</a></li>
                <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Fresa</a></li>
                <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Aguacate</a></li>
                <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Ver todo</a></li>
              </ul>
            </div>
            <div class="mt-10 md:mt-0">
              <h3 class="text-sm font-semibold leading-6 text-white">Empresa</h3>
              <ul role="list" class="mt-6 space-y-4">
                <li><a href="#nosotros" class="text-sm leading-6 text-gray-300 hover:text-white">Sobre Nosotros</a></li>
                <li><a href="#exportacion" class="text-sm leading-6 text-gray-300 hover:text-white">Exportación</a></li>
                <li><a href="#contacto" class="text-sm leading-6 text-gray-300 hover:text-white">Contacto</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-16 border-t border-white/10 pt-8 sm:mt-20 lg:mt-24">
        <p class="text-xs leading-5 text-gray-400">&copy; 2024 Hacienda Sol Radiante. Todos los derechos reservados.</p>
      </div>
    </div>
  </footer>
</template>
