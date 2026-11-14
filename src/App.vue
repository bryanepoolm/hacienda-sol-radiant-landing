<script setup>
import { ref } from 'vue'

const menuOpen = ref(false)
const year = new Date().getFullYear()
const contactForm = ref({ name: '', email: '', phone: '', message: '' })
const sending = ref(false)
const formFeedback = ref({ type: '', message: '' })
const navigation = [
  { label: 'Nosotros', href: '#nosotros' },
  { label: 'Catálogo', href: '#aceites' },
  { label: 'Aplicaciones', href: '#aplicaciones' },
  { label: 'Exportación', href: '#soluciones' },
]
const oils = [
  { number: '01', title: 'Palma y palmiste', detail: 'Aceites y fracciones', description: 'Opciones para distintos procesos de formulación y freído.', products: ['Aceite de palma RBD', 'Aceite de palmiste RBD', 'Oleína de palma RBD', 'Estearina de palma RBD'], image: '/images/catalog-palma.webp', alt: 'Fotografía de aceite vegetal dorado y frutos de palma' },
  { number: '02', title: 'Coco', detail: 'Crudo y refinado', description: 'Alternativas de coco para necesidades específicas de proceso.', products: ['Aceite de coco CB', 'Aceite de coco RBD'], image: '/images/catalog-coco.webp', alt: 'Fotografía de aceite de coco en vidrio y cocos abiertos' },
  { number: '03', title: 'Semillas', detail: 'Canola, maíz y soya', description: 'Tres opciones vegetales para diferentes usos alimentarios.', products: ['Aceite de canola RBD', 'Aceite de maíz RBD', 'Aceite de soya RBD'], image: '/images/catalog-semillas.webp', alt: 'Fotografía de aceites de canola, maíz y soya con sus ingredientes' },
]
const fats = [
  { number: '01', title: 'Panificación', description: 'Grasas vegetales para masas, mezclas y productos horneados.', image: '/images/catalog-panificacion.webp', alt: 'Grasa vegetal junto a pan, galletas y repostería' },
  { number: '02', title: 'Panificación y freído', description: 'Opciones para procesos que combinan preparación y cocción.', image: '/images/catalog-panificacion-freido.webp', alt: 'Grasa vegetal con masa y un producto frito' },
  { number: '03', title: 'Quesos', description: 'Grasas vegetales para distintas formulaciones de productos tipo queso.', image: '/images/catalog-quesos.webp', alt: 'Grasa vegetal junto a rebanadas y cubos de producto tipo queso' },
  { number: '04', title: 'Donas, churros y buñuelos', description: 'Soluciones para procesos de freído de productos de repostería.', image: '/images/catalog-fritos-dulces.webp', alt: 'Grasa vegetal junto a dona, churros y buñuelo' },
  { number: '05', title: 'Bases de helado', description: 'Alternativas vegetales para bases y mezclas de postres congelados.', image: '/images/catalog-helados.webp', alt: 'Grasa vegetal junto a una bola de helado de vainilla' },
]
const applications = [
  { number: '01', title: 'Freído', description: 'Aceites y grasas para procesos de cocción y alimentos preparados.' },
  { number: '02', title: 'Panificación', description: 'Ingredientes vegetales para masas, panes y repostería.' },
  { number: '03', title: 'Quesos y helados', description: 'Alternativas para formulaciones de lácteos y postres.' },
  { number: '04', title: 'Food service', description: 'Opciones para cocinas profesionales y operaciones de alto volumen.' },
]
const steps = [
  { number: '01', title: 'Entendemos tu aplicación', description: 'Partimos del tipo de aceite o grasa, uso final y especificaciones que necesita tu proyecto.' },
  { number: '02', title: 'Definimos la presentación', description: 'Revisamos volumen, empaque y condiciones comerciales según tu operación.' },
  { number: '03', title: 'Planeamos la exportación', description: 'Revisamos destino y logística para llevar tu requerimiento a una propuesta concreta.' },
]
const closeMenu = () => { menuOpen.value = false }
const submitContact = async () => {
  if (sending.value) return
  sending.value = true
  formFeedback.value = { type: '', message: '' }
  try {
    const data = new FormData()
    for (const [key, value] of Object.entries(contactForm.value)) data.append(key, value)
    const response = await fetch('/contact.php', { method: 'POST', body: data, headers: { Accept: 'application/json' } })
    const result = await response.json().catch(() => null)
    if (!response.ok || !result?.success) throw new Error(result?.message || 'No pudimos enviar tu mensaje. Intenta de nuevo o llámanos.')
    contactForm.value = { name: '', email: '', phone: '', message: '' }
    formFeedback.value = { type: 'success', message: 'Mensaje enviado. Nos pondremos en contacto contigo pronto.' }
  } catch (error) {
    formFeedback.value = { type: 'error', message: error.message || 'No pudimos enviar tu mensaje. Intenta de nuevo o llámanos.' }
  } finally {
    sending.value = false
  }
}
</script>

<template>
  <div class="site-shell">
    <div class="announcement-bar"><span>INGREDIENTES VEGETALES PARA LA INDUSTRIA</span><span class="announcement-separator" aria-hidden="true"></span><span>HACIENDA SOL RADIANTE</span></div>
    <header class="site-header">
      <div class="container header-inner">
        <a class="brand brand-header" href="#inicio" aria-label="Hacienda Sol Radiante, ir al inicio" @click="closeMenu"><img src="/brand/logo-oficial.jpeg" alt="Hacienda Sol Radiante" width="1536" height="1024" /></a>
        <nav class="desktop-nav" aria-label="Navegación principal"><a v-for="item in navigation" :key="item.href" :href="item.href">{{ item.label }}</a></nav>
        <a class="header-cta" href="#contacto">Hablemos de tu proyecto <span aria-hidden="true">↗</span></a>
        <button class="menu-toggle" type="button" :aria-expanded="menuOpen" aria-controls="mobile-menu" :aria-label="menuOpen ? 'Cerrar menú' : 'Abrir menú'" @click="menuOpen = !menuOpen"><span></span><span></span></button>
      </div>
      <nav v-if="menuOpen" id="mobile-menu" class="mobile-nav" aria-label="Navegación móvil"><a v-for="item in navigation" :key="item.href" :href="item.href" @click="closeMenu">{{ item.label }}</a><a href="#contacto" @click="closeMenu">Contacto ↗</a></nav>
    </header>

    <main>
      <section id="inicio" class="hero" aria-labelledby="hero-title">
        <img class="hero-image" src="/images/hero-catalog.webp" alt="Aceite vegetal dorado junto a palma, coco, canola, maíz y soya" fetchpriority="high" /><div class="hero-shade"></div>
        <div class="container hero-inner"><div class="hero-content"><p class="eyebrow eyebrow-light"><span class="eyebrow-line"></span> ACEITES Y GRASAS VEGETALES · MÉXICO</p><h1 id="hero-title">La esencia de una <em>mejor</em> industria.</h1><p class="hero-lead">Aceites y grasas vegetales para panificación, freído y formulación de alimentos. Conoce el portafolio de Hacienda Sol Radiante y cuéntanos qué necesita tu operación.</p><div class="hero-actions"><a class="button button-gold" href="#aceites">Explorar catálogo <span aria-hidden="true">↗</span></a><a class="text-link text-link-light" href="#contacto">Solicitar una cotización <span aria-hidden="true">→</span></a></div></div><div class="hero-side-note" aria-hidden="true"><span>ORIGEN VEGETAL</span><span>VISIÓN GLOBAL</span></div></div>
        <div class="hero-bottom container"><span>DESLIZA PARA DESCUBRIR</span><span class="hero-bottom-line"></span><span>HACIENDA SOL RADIANTE</span></div>
      </section>

      <section class="promise-strip" aria-label="Nuestra propuesta"><div class="container promise-grid"><p><span class="promise-dot"></span> Portafolio vegetal</p><p><span class="promise-dot"></span> Enfoque industrial</p><p><span class="promise-dot"></span> Atención a tu medida</p></div></section>

      <section id="nosotros" class="section about-section" aria-labelledby="about-title"><div class="container about-grid"><div class="section-intro"><p class="eyebrow"><span class="eyebrow-line"></span> QUIÉNES SOMOS</p><h2 id="about-title" class="display-title">Del origen vegetal a <em>nuevas posibilidades.</em></h2><div class="about-logo"><img src="/brand/logo-oficial.jpeg" alt="Logo oficial de Hacienda Sol Radiante" loading="lazy" width="1536" height="1024" /></div></div><div class="about-copy"><p class="lead-copy">Aceites vegetales de alta calidad para proyectos que buscan crecer.</p><p>En Hacienda Sol Radiante reunimos aceites y grasas vegetales para fabricantes, distribuidores y marcas. Nuestro catálogo abarca palma, palmiste, coco, canola, maíz y soya, además de grasas para panificación, freído, quesos y helados. Escuchamos tus necesidades para preparar una propuesta de suministro y exportación alineada con tu proyecto.</p><a class="text-link" href="#soluciones">Conoce cómo trabajamos <span aria-hidden="true">→</span></a></div></div></section>

      <section id="aceites" class="section products-section" aria-labelledby="products-title">
        <div class="container">
          <div class="section-heading products-heading"><div><p class="eyebrow"><span class="eyebrow-line"></span> NUESTRO CATÁLOGO</p><h2 id="products-title" class="display-title">Aceites y grasas para cada <em>proceso.</em></h2></div><p>Explora las familias de productos y solicita la especificación adecuada para tu aplicación.</p></div>
          <div class="catalog-subheading"><span class="catalog-number">01 / 02</span><h3>Aceites vegetales</h3><p>Palma, coco y semillas.</p></div>
          <div class="product-grid"><article v-for="oil in oils" :key="oil.number" class="product-card"><div class="product-image-wrap"><img :src="oil.image" :alt="oil.alt" loading="lazy" /><span class="product-index">{{ oil.number }} / 03</span></div><div class="product-body"><p class="product-detail">{{ oil.detail }}</p><h4>{{ oil.title }}</h4><p>{{ oil.description }}</p><ul class="product-list"><li v-for="product in oil.products" :key="product">{{ product }}</li></ul><a href="#contacto" :aria-label="`Consultar por ${oil.title}`">Consultar familia <span aria-hidden="true">↗</span></a></div></article></div>
          <div class="catalog-subheading fats-heading"><span class="catalog-number">02 / 02</span><h3>Grasas vegetales</h3><p>Opciones según la aplicación final.</p></div>
          <div class="fat-grid"><article v-for="fat in fats" :key="fat.number" class="fat-card"><div class="fat-image-wrap"><img :src="fat.image" :alt="fat.alt" loading="lazy" /><span>{{ fat.number }}</span></div><div class="fat-body"><h4>{{ fat.title }}</h4><p>{{ fat.description }}</p><a href="#contacto" :aria-label="`Consultar grasa vegetal para ${fat.title}`">Consultar <span aria-hidden="true">↗</span></a></div></article></div>
          <p class="product-footnote">RBD: refinado, blanqueado y desodorizado · CB: crudo y blanqueado. Disponibilidad y especificaciones a confirmar en cada cotización.</p>
        </div>
      </section>

      <section id="aplicaciones" class="section applications-section" aria-labelledby="applications-title"><div class="container"><div class="applications-top"><div><p class="eyebrow eyebrow-light"><span class="eyebrow-line"></span> DONDE APORTAMOS VALOR</p><h2 id="applications-title" class="display-title">Versatilidad que mueve <em>industrias.</em></h2></div><p>La elección del ingrediente correcto empieza por entender el resultado que buscas.</p></div><div class="application-grid"><article v-for="item in applications" :key="item.number" class="application-card"><span class="application-number">{{ item.number }}</span><div class="application-icon" aria-hidden="true">✳</div><h3>{{ item.title }}</h3><p>{{ item.description }}</p></article></div></div></section>

      <section id="soluciones" class="section solutions-section" aria-labelledby="solutions-title"><div class="container solutions-grid"><div class="solutions-image-wrap"><img src="/images/catalog-suministro.webp" alt="Muestras de aceites y grasas vegetales con palma, coco, canola, maíz y soya" loading="lazy" /><div class="image-caption"><span>UNA SOLUCIÓN PARA CADA OPERACIÓN</span><span>↗</span></div></div><div class="solutions-content"><p class="eyebrow"><span class="eyebrow-line"></span> SUMINISTRO Y EXPORTACIÓN</p><h2 id="solutions-title" class="display-title">Hablemos de lo que <em>necesitas.</em></h2><p class="solutions-lead">Cada proyecto tiene sus propias condiciones. Por eso organizamos la conversación alrededor de tres decisiones clave.</p><ol class="step-list"><li v-for="step in steps" :key="step.number"><span>{{ step.number }}</span><div><h3>{{ step.title }}</h3><p>{{ step.description }}</p></div></li></ol></div></div></section>

      <section class="formats-section" aria-labelledby="formats-title"><div class="container formats-inner"><div><p class="eyebrow"><span class="eyebrow-line"></span> PRESENTACIONES</p><h2 id="formats-title" class="display-title">El formato también <em>importa.</em></h2></div><p>Revisamos contigo el volumen, la presentación y las condiciones de entrega disponibles para tu producto y destino.</p><div class="format-tags"><span>ENVASES</span><span>BIDONES Y CUBETAS</span><span>GRANEL</span><span>DISPONIBILIDAD A CONSULTAR</span></div></div></section>

      <section id="contacto" class="contact-section" aria-labelledby="contact-title">
        <div class="container contact-grid">
          <div class="contact-intro">
            <p class="eyebrow"><span class="eyebrow-line"></span> EMPECEMOS</p>
            <h2 id="contact-title" class="display-title">Tu próximo proyecto comienza con una <em>conversación.</em></h2>
            <p>Cuéntanos qué aceite o grasa buscas, para qué aplicación lo necesitas y el volumen estimado. Conversemos sobre la mejor ruta para tu proyecto.</p>
            <a class="contact-phone" href="tel:+529996350250">O llámanos al +52 (999) 635 0250 <span aria-hidden="true">↗</span></a>
            <a class="contact-email" href="mailto:global.sales@haciendasolradiante.mx">global.sales@haciendasolradiante.mx</a>
          </div>
          <form class="contact-form" @submit.prevent="submitContact">
            <p class="form-kicker">SOLICITAR INFORMACIÓN</p>
            <h3>Hablemos de tu necesidad</h3>
            <div class="form-row">
              <label>Nombre completo <input v-model.trim="contactForm.name" type="text" name="name" autocomplete="name" required maxlength="120" placeholder="Tu nombre" /></label>
              <label>Correo electrónico <input v-model.trim="contactForm.email" type="email" name="email" autocomplete="email" required maxlength="180" placeholder="nombre@empresa.com" /></label>
            </div>
            <label>Teléfono <input v-model.trim="contactForm.phone" type="tel" name="phone" autocomplete="tel" maxlength="40" placeholder="Tu número de contacto" /></label>
            <label>¿Qué necesitas? <textarea v-model.trim="contactForm.message" name="message" required maxlength="4000" rows="4" placeholder="Aceite o grasa, aplicación, volumen estimado y destino"></textarea></label>
            <button class="button button-dark form-submit" type="submit" :disabled="sending">{{ sending ? 'Enviando...' : 'Enviar mensaje' }} <span aria-hidden="true">↗</span></button>
            <p v-if="formFeedback.message" class="form-feedback" :class="formFeedback.type" role="status" aria-live="polite">{{ formFeedback.message }}</p>
          </form>
        </div>
      </section>
    </main>

    <footer class="site-footer"><div class="container footer-main"><div class="footer-brand"><a class="footer-wordmark" href="#inicio" aria-label="Hacienda Sol Radiante, volver al inicio"><span>Hacienda</span><strong>Sol Radiante</strong></a><p>Aceites y grasas vegetales para nuevas posibilidades.</p></div><div class="footer-links"><h3>Explora</h3><a href="#nosotros">Nosotros</a><a href="#aceites">Catálogo</a><a href="#aplicaciones">Aplicaciones</a><a href="#soluciones">Exportación</a></div><div class="footer-links"><h3>Contacto</h3><a href="tel:+529996350250">+52 (999) 635 0250</a><a href="mailto:global.sales@haciendasolradiante.mx">global.sales@haciendasolradiante.mx</a><span>México</span></div></div><div class="container footer-bottom"><span>© {{ year }} Hacienda Sol Radiante. Todos los derechos reservados.</span><span>HECHO PARA MOVER IDEAS</span></div></footer>
  </div>
</template>
