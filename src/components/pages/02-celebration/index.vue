<template>
    <div class="main">
         <van-nav-bar title="庆典流程" left-text="" left-arrow @click-left="onClickLeft" />
        <img src="../../../../static/img/liucheng.png" alt="">
    </div>
</template>
<script>
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
    width: 100%;
    height: 100%;
}

</style>

