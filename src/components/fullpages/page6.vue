<template>
    <div class="great">
        <!-- 这个是测试页面:如果客户不小心按到了6以上的页面,重定向到金曲页面就好了 -->
        <!-- <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow @click-left="onClickLeft" /> -->
        <!-- 引入fullpage -->
        <full-page ref="fullpage" :options="options">
            <div class="section">
                <div class="content1">
                    <!-- <p>第一页</p> -->
                    <!-- 动画 -->
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
                
                anchors: ['page1' ],
                sectionsColor: ['#1f0d33']
                
            },
        }
    },
    methods: {
        
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
.great {
    width: 100%;
    // height: 111.25rem;
    .content1 {
        background: url('../../../static/img/great1-2-1.jpg') no-repeat
            center top;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        > div {
            padding-bottom: 1.87rem;
        }
        p {
            text-align: center;
        }
    }
    
    .content1,
    .content2,
    .content3 {
        width: 100%;
        height: 100%;
        background-size: 100% 100%;
        color: white;
        p {
            margin-top: 0;
        }
    }
}

</style>
