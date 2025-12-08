<script setup>
import NavBar from './components/NavBar.vue'
import HeroSection from './components/HeroSection.vue'
import AboutSection from './components/AboutSection.vue'
import ProductsSection from './components/ProductsSection.vue'
import ExportSection from './components/ExportSection.vue'
import PackagingSection from './components/PackagingSection.vue'
import AdvantagesSection from './components/AdvantagesSection.vue'
import CertificationsSection from './components/CertificationsSection.vue'
import ContactSection from './components/ContactSection.vue'
import Footer from './components/Footer.vue'
</script>

<template>
  <div class="bg-white">
    <NavBar />
    <main>
      <HeroSection />
      <AboutSection />
      <ProductsSection />
      <ExportSection />
      <PackagingSection />
      <AdvantagesSection />
      <CertificationsSection />
      <ContactSection />
    </main>
    <Footer />
  </div>
</template>
