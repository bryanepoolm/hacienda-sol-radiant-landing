<script setup>
const products = [
  { name: 'Mango', desc: 'Cubos, tiras, pulpa congelada', image: 'https://images.unsplash.com/photo-1601493700631-2b16ec4b4716?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' },
  { name: 'Fresa', desc: 'Entera, en mitades, IQF', image: 'https://images.unsplash.com/photo-1464965911861-746a04b4bca6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' },
  { name: 'Piña', desc: 'Cubos, tidbits', image: 'https://images.unsplash.com/photo-1550258987-190a2d41a8ba?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' },
  { name: 'Aguacate', desc: 'Cubos, pulpa congelada', image: 'https://camposdelabuelo.com/cdn/shop/articles/1_8aab3573-f6d7-4ece-b01a-ef15f90808ce.jpg?crop=center&height=1200&v=1749767618&width=1200' },
  { name: 'Papaya', desc: 'Cubos IQF', image: 'https://www.dreamfoodscaribe.com/wp-content/uploads/2024/07/papaya.webp' },
  { name: 'Guayaba', desc: 'IQF', image: 'https://www.gob.mx/cms/uploads/article/main_image/160515/Guayaba_blog_5.jpg' },
  { name: 'Zarzamora', desc: 'IQF', image: 'https://www.gob.mx/cms/uploads/article/main_image/77207/zarzamora_.jpg' },
  { name: 'Frambuesa', desc: 'IQF', image: 'https://s2.abcstatics.com/media/bienestar/2020/08/04/frambuesas-fichas-khKE--620x349@abc.jpeg' },
  { name: 'Mora azul', desc: 'Arándano', image: 'https://images.unsplash.com/photo-1498557850523-fd3d118b962e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' },
  { name: 'Mezclas', desc: 'Smoothies, blends tropicales', image: 'https://images.unsplash.com/photo-1623065422902-30a2d299bbe4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' },
]
</script>

<template>
  <section id="productos" class="py-24 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-8">
      <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-base font-semibold leading-7 text-primary">Catálogo</h2>
        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Nuestros Productos</p>
        <p class="mt-6 text-lg leading-8 text-gray-600">
          Exportamos fruta congelada IQF en diferentes especificaciones, cortes y presentaciones.
        </p>
      </div>
      <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-4">
        <div v-for="product in products" :key="product.name" class="group relative">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-2xl bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 shadow-md transition-all duration-300 hover:shadow-xl">
            <img :src="product.image" :alt="product.name" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-lg font-bold text-gray-900">
                <a href="#">
                  <span aria-hidden="true" class="absolute inset-0"></span>
                  {{ product.name }}
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">{{ product.desc }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
