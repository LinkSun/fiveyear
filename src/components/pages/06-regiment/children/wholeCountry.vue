<template>
    <div>
        <!-- 头部 -->
        <van-nav-bar title="图片直播" left-text="" left-arrow @click-left="onClickLeft" />

        <!-- main主体 -->
        <main class="main">
            <ul>
                <li v-for="(img,index) in list" :key="index">
                    <img v-lazy="img.src" >
                </li>
            </ul>
        </main>
    </div>
</template>

<script>
export default {
    data() {
        return {
          list:[ //保存图片数据
              {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },  {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              },
                 {
                  src:"../../../../../static/img/zhibo-content1.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content2.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content3.jpg"
              },
               {
                  src:"../../../../../static/img/zhibo-content4.jpg"
              }
          ]  
        }
    },
    methods: {
        onClickLeft() {
            this.$router.go(-1)
        },
    },
}
</script>

<style lang="scss" scoped>
.van-nav-bar .van-icon {
    color: #000;
}
.van-nav-bar__title {
    font-size: 0.9rem;
}
.main{
    background-color: #f2f3f4;
    ul{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
         padding: 3px;
        li{
            width: 9.5rem;
            height: 7rem;
           margin-top: .43rem;
            img{
                
                display: block;
                width: 100%;
                height: 100%;
                
            }
        }
    }
}
</style>