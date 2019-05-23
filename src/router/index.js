import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Welcome from '../components/pages/01-welcome/index.vue'
import Celebration from '../components/pages/02-celebration/index.vue'
import Aspirations from '../components/pages/03-aspirations/index.vue'
import Great from '../components/pages/04-great/index.vue'
import Story from '../components/pages/05-story/index.vue'
import Regiment from '../components/pages/06-regiment/index.vue'
import liveRegiment from '../components/pages/06-regiment/children/liveRegiment.vue'
import wholeCountry from '../components/pages/06-regiment/children/wholeCountry.vue'
import mytest from '../components/mytest'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/1',
      name: 'Welcome',
      component: Welcome
    },
    {
      path: '/2',
      name: 'Celebration',
      component: Celebration
    },
    {
      path: '/3',
      name: 'Aspirations',
      component: Aspirations
    },
    {
      path: '/4',
      name: 'Great',
      component: Great
    },
    {
      path: '/5',
      name: 'Story',
      component: Story
    },
    {
      path: '/6',
      name: 'Regiment',
      component: Regiment
    },
    {
      path: '/liveRegiment',
      name: 'liveRegiment',
      component: liveRegiment
    },
    {
      path: '/wholeCountry',
      name: 'wholeCountry',
      component: wholeCountry
    },
    {
      path: '/mytest',
      name: 'mytest',
      component: mytest
    },

  ]
})
