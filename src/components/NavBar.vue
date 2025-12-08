<script setup>
import { ref } from 'vue'

const isMenuOpen = ref(false)

const navigation = [
  { name: 'Inicio', href: '#inicio' },
  { name: 'Sobre Nosotros', href: '#nosotros' },
  { name: 'Productos', href: '#productos' },
  { name: 'Exportación', href: '#exportacion' },
  { name: 'Contacto', href: '#contacto' },
]
</script>

<template>
  <header class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50 transition-all duration-300">
    <nav class="container mx-auto px-6 py-4" aria-label="Global">
      <div class="flex items-center justify-between">
        <div class="flex lg:flex-1">
          <a href="#" class="-m-1.5 p-1.5 flex items-center gap-3">
            <img class="h-12 w-auto rounded-full shadow-md" src="@/assets/logo-empresa.jpeg" alt="Hacienda Sol Radiante" />
            <span class="text-xl font-bold text-gray-900 tracking-tight">Hacienda Sol Radiante</span>
          </a>
        </div>
        <div class="flex lg:hidden">
          <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="isMenuOpen = true">
            <span class="sr-only">Abrir menú principal</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-8">
          <a v-for="item in navigation" :key="item.name" :href="item.href" class="text-sm font-semibold leading-6 text-gray-900 hover:text-primary transition-colors duration-200">
            {{ item.name }}
          </a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
          <a href="#contacto" class="rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-white shadow-lg hover:bg-amber-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600 transition-all duration-300 transform hover:-translate-y-0.5">
            Cotizar Ahora
          </a>
        </div>
      </div>
    </nav>
    <!-- Mobile menu -->
    <div class="lg:hidden" v-show="isMenuOpen" role="dialog" aria-modal="true">
      <div class="fixed inset-0 z-50 bg-black/20 backdrop-blur-sm" @click="isMenuOpen = false"></div>
      <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 shadow-2xl transition-transform duration-300">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5 flex items-center gap-2">
            <img class="h-10 w-auto rounded-full" src="@/assets/logo-empresa.jpeg" alt="" />
            <span class="font-bold text-gray-900">Hacienda Sol Radiante</span>
          </a>
          <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="isMenuOpen = false">
            <span class="sr-only">Cerrar menú</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <a v-for="item in navigation" :key="item.name" :href="item.href" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" @click="isMenuOpen = false">
                {{ item.name }}
              </a>
            </div>
            <div class="py-6">
              <a href="#contacto" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-primary hover:bg-gray-50" @click="isMenuOpen = false">
                Solicitar Cotización
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>
