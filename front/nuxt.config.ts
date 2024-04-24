// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: ['@nuxtjs/tailwindcss', "nuxt-auth-sanctum", "@hebilicious/vue-query-nuxt", "nuxt-primevue"],
  tailwindcss: {
    exposeConfig: true
  },
  sanctum: {
    baseUrl: 'http://localhost:80',
    endpoints: {
      login: '/api/auth/login',
      logout: '/api/auth/logout'
    }
  },
  primevue: {
    usePrimeVue: true
  },
  css: ['primevue/resources/themes/aura-light-green/theme.css']
})