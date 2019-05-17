<template>
  <div id="app">
    <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow @click-left="onClickLeft" />
    <router-view/>
  </div>
</template>

<script>
import Vue from 'vue'

import { NavBar } from 'vant';

Vue.use(NavBar);
export default {
  name: 'App',
  methods: {
      onClickLeft() {
          this.$router.go(-1) 
        },
  },
}
</script>

<style lang="scss">
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  // color: #2c3e50;


}
.van-nav-bar .van-icon {
    color: #000;
}
.van-nav-bar__title{
  font-size: .9rem;
}
</style>
