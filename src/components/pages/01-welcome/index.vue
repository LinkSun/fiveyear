<template>
    <div class="main">
        <!-- <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow @click-left="onClickLeft" /> -->
        <img src="../../../../static/img/welcome.jpg" alt="">
    </div>
</template>
<script>
import Vue from 'vue'

export default {
    methods: {
        onClickLeft() {
          this.$router.go(-1) 
        }
    },
    
}
</script>
<style lang="scss" scoped>
.van-nav-bar .van-icon {
    color: #000;
}
.van-nav-bar__title{
  font-size: .9rem;
}

.main img {
    display: block;
    width: 100%;
    height: 100%;
}

</style>
