<template>
    <div class="great">
        <!-- <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow @click-left="onClickLeft" /> -->
        <!-- 引入fullpage -->
        <full-page ref="fullpage" :options="options">
           
            <div class="section">
                <router-link :to="{ path: '/4' }">
                <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow  />
                </router-link>
                <div class="content2 content2-1">
                    <!-- <p>第二页</p> -->
                    <video controls controlslist="nodownload">
                        <source src="../../../static/video/buyiyang.mp4" type="video/mp4">
                    </video>

                </div>
            </div>
            

        </full-page>

    </div>
</template>
<script>

export default {
    name: 'great',
    data() {
        return {
              options: {
                // menu: '#menu',
                anchors: ['page2'],
                sectionsColor: ['#1f0d33'],
                
            },
        }
    },
    methods: {
        // onClickLeft() {
        //     this.$router.go(-1)
        // },
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
.van-nav-bar__text{
    color: #000;
}
.great {
    width: 100%;
    // height: 111.25rem;
    
    .content2-1 {
        background: url('../../../static/img/great2-buyiyang.jpg') no-repeat center
            top;
    }
    
    .content2,
     {
        width: 100%;
        height: 100%;
        background-size: 100% 100%;
        color: white;
        p {
            margin-top: 0;
        }
    }
}


.content2 {
    video {
        margin-top: 7.4rem;
        width: 17rem;
        height: 13rem;
    }
}
</style>
