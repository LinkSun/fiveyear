<template>
    <div class="container">
        <div class="header">
            <p>故事荟</p>
            <span>
                欢迎分享您身边的故事，投稿至xxxxx@xx.com
            </span>
        </div>
        <div class="main" v-for="(item, index) in imgs" :key="index">
            <van-row class="title" type="flex" justify="space-between">
                <van-col span="6" class="photo">
                    <img src="../../../../static/img/avatar1.png" alt="">
                    <span>JACK</span>
                </van-col>
                <van-col span="6" class="time">2小时前</van-col>
            </van-row>
            <van-row class="content" :style="{'background': 'url('+item.bgaddress+') no-repeat center center'}">
                <!-- 这是增加文字 -->
            </van-row>
        </div>

    </div>
</template>

<script>
export default {
    name: 'story',
    data() {
        return {
            imgs: [
                {
                    bgaddress: '../../../../static/img/lunbo3.jpg',
                },
                {
                    bgaddress: '../../../../static/img/lunbo3.jpg',
                },
                {
                    bgaddress: '../../../../static/img/lunbo2.jpg',
                },
            ],
        }
    },
}
</script>

<style lang="scss" scoped>
.container {
    // background-color: #f5f5f9;
}
.header span {
    font-size: 0.8rem;
}
.title {
    margin-top: 1.25rem;
    .photo {
        display: flex;
        justify-content: center;
        img {
            width: 1.87rem;
            height: 1.87rem;
            border-radius: 50%;
            margin-right: 10px;
        }
        span {
            height: 1.87rem;
            line-height: 1.87rem;
            font-size: 0.8rem;
            text-align: center;
        }
    }
}

.title .time {
    font-size: 0.8rem;
}
.content {
    height: 9.5rem;
    margin-top: 0.6rem;
    color: hotpink;
}
</style>
