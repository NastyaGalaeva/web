import Vue from 'vue'
import Router from 'vue-router'
import Markdown from '../components/Markdown'
import Documents from '../components/Documents'
import Preview from '../components/Preview'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Markdown',
      component: Markdown
    },
    {
      path: '/list',
      name: 'Documents',
      component: Documents
    },
    {
      path: '/preview',
      name: 'Preview',
      component: Preview
    }
  ]
})
