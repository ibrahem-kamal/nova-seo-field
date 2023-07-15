import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'
import SeoMedia from './partials/SeoMedia.vue'

Nova.booting((app, store) => {
  app.component('index-seo-meta', IndexField)
  app.component('detail-seo-meta', DetailField)
  app.component('form-seo-meta', FormField)
  app.component('seo-media', SeoMedia)
})
