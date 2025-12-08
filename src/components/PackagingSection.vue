<script setup>
import img1 from '@/assets/proceso/empaquetado/packaging-1.jpeg'
import img2 from '@/assets/proceso/empaquetado/packaging-2.jpeg'
import img3 from '@/assets/proceso/empaquetado/packaging-3.jpeg'
import img4 from '@/assets/proceso/empaquetado/packaging-4.jpeg'

const images = [
  { src: img1, alt: 'Proceso de empaquetado 1' },
  { src: img2, alt: 'Proceso de empaquetado 2' },
  { src: img3, alt: 'Proceso de empaquetado 3' },
  { src: img4, alt: 'Proceso de empaquetado 4' },
]
</script>

<template>
  <section id="empaquetado" class="py-24 bg-white">
    <div class="container mx-auto px-6 lg:px-8">
      <div class="mx-auto max-w-2xl text-center mb-16">
        <h2 class="text-base font-semibold leading-7 text-primary">Calidad y Seguridad</h2>
        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Proceso de Empaquetado</p>
        <p class="mt-6 text-lg leading-8 text-gray-600">
          Contamos con instalaciones de primer nivel para garantizar la inocuidad y calidad de nuestros productos durante el proceso de empaquetado.
        </p>
      </div>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div v-for="(image, index) in images" :key="index" class="relative overflow-hidden rounded-2xl shadow-lg group bg-gray-200">
          <img 
            :src="image.src" 
            :alt="image.alt" 
            class="w-full h-64 object-cover transform transition-transform duration-500 group-hover:scale-110"
          />
          <!-- <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-opacity duration-300"></div> -->
        </div>
      </div>
    </div>
  </section>
</template>
