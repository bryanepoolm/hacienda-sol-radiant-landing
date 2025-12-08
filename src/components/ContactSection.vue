<script setup>
import { ref } from 'vue'

const form = ref({
  name: '',
  email: '',
  phone: '',
  message: ''
})

const status = ref('')
const loading = ref(false)

const submitForm = async () => {
  loading.value = true
  status.value = ''
  
  try {
    const formData = new FormData()
    formData.append('name', form.value.name)
    formData.append('email', form.value.email)
    formData.append('phone', form.value.phone)
    formData.append('message', form.value.message)

    const response = await fetch('/contact.php', {
      method: 'POST',
      body: formData
    })

    const result = await response.json()
    
    if (result.success) {
      status.value = 'success'
      form.value = { name: '', email: '', phone: '', message: '' }
    } else {
      status.value = 'error'
    }
  } catch (e) {
    status.value = 'error'
  } finally {
    loading.value = false
  }
}
</script>

<template>
  <section id="contacto" class="relative isolate bg-white py-24 px-6 sm:py-32 lg:px-8">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
      <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contáctanos</h2>
      <p class="mt-2 text-lg leading-8 text-gray-600">
        ¿Interesado en importar fruta congelada desde México? Nuestro equipo comercial está listo para cotizar y enviar muestras.
      </p>
    </div>
    <form @submit.prevent="submitForm" class="mx-auto mt-16 max-w-xl sm:mt-20">
      <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
        <div class="sm:col-span-2">
          <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">Nombre Completo</label>
          <div class="mt-2.5">
            <input type="text" v-model="form.name" name="name" id="name" autocomplete="name" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Correo Electrónico</label>
          <div class="mt-2.5">
            <input type="email" v-model="form.email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="phone" class="block text-sm font-semibold leading-6 text-gray-900">Teléfono</label>
          <div class="mt-2.5">
            <input type="tel" v-model="form.phone" name="phone" id="phone" autocomplete="tel" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Mensaje</label>
          <div class="mt-2.5">
            <textarea v-model="form.message" name="message" id="message" rows="4" required class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"></textarea>
          </div>
        </div>
      </div>
      <div class="mt-10">
        <button type="submit" :disabled="loading" class="block w-full rounded-md bg-primary px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-amber-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
          {{ loading ? 'Enviando...' : 'Enviar Mensaje' }}
        </button>
      </div>
      <div v-if="status === 'success'" class="mt-4 p-4 bg-green-50 text-green-700 rounded-md text-center">
        Mensaje enviado correctamente. Nos pondremos en contacto pronto.
      </div>
      <div v-if="status === 'error'" class="mt-4 p-4 bg-red-50 text-red-700 rounded-md text-center">
        Hubo un error al enviar el mensaje. Por favor intenta de nuevo.
      </div>
    </form>
    
    <div class="mx-auto mt-16 max-w-2xl text-center border-t border-gray-200 pt-10">
      <p class="text-base leading-7 text-gray-600">
        <span class="font-semibold text-gray-900">Teléfono:</span> +52 (999) 635 0250
      </p>
      <p class="mt-2 text-base leading-7 text-gray-600">
        <span class="font-semibold text-gray-900">Ubicación:</span> México
      </p>
    </div>
  </section>
</template>
