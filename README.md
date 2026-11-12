# Hacienda Sol Radiante — Aceites Vegetales

Landing page de Hacienda Sol Radiante para presentar una propuesta de suministro y exportación de aceites vegetales a clientes industriales. Construida con Vue 3 y Vite.

## Desarrollo local

```bash
npm ci
npm run dev
```

Para probar el formulario en desarrollo, abre otra terminal y ejecuta `npm run dev:php`. Vite envía `/contact.php` a ese servidor PHP local.

## Producción

```bash
npm run build
npm run preview
```

La compilación queda en `dist/`, incluido `contact.php`. El formulario requiere un alojamiento con PHP y correo saliente configurado; el servidor estático de Vite o `npm run preview` no ejecuta PHP. Publica el contenido de `dist/` en un alojamiento compatible y prueba un envío real allí.

## Identidad y recursos

- Logo vectorial: `public/brand/logo-hacienda-sol-radiante.svg`
- Isotipo y favicon: `public/brand/mark.svg`
- Fotografías originales generadas para este proyecto: `public/images/`

El correo del formulario es `global.sales@haciendasolradiante.mx`, proporcionado para este rediseño. El teléfono comercial proviene de la versión anterior del sitio. Confirma productos, presentaciones y el teléfono antes de publicar.
