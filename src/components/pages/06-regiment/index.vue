<template>
    <div class="regiment">
        <!-- 头部 -->
        <!-- <van-nav-bar title="图片直播" left-text="" left-arrow @click-left="onClickLeft" /> -->
        <header class="header">
            <img src="../../../../static/img/header.jpg" alt="">
        </header>
        <!-- main主体 -->
        <main class="main">
            <!-- 标题部分 -->
            <section class="detail-1">
                <div class="">
                    <h1>彩生活服务集团上市5周年庆</h1>
                </div>
                <div class="detail-content">
                    <p class="">
                        <span>活动时间：</span>
                        <span id="activityTime">2019.06.01 - 2019.06.30 </span>
                    </p>

                </div>
            </section>
            <!-- 热门图片部分 -->
            <section class="hot">
                <h2>历届司庆图片展示</h2>
                <div class="common-box">
                    <img src="../../../../static/img/zhibo-zanshi.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi2.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi3.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi2.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi3.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi2.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi3.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi2.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi3.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi2.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi3.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi2.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi3.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi2.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi3.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi2.jpg" alt="">
                    <img src="../../../../static/img/zhibo-zanshi3.jpg" alt="">
                </div>
            </section>
            <!-- 图片直播部分 -->
            <section class="list">
                <h2>图片直播入口</h2>
                <!-- 如果这里打开则显示各个区域图 -->
                <ul v-if="isShow">
                    <li v-for="(item, index) in aliveList" :key="index" @click="toZongbu(item)">
                        {{item.name}}
                    </li>

                </ul>
                <button @click="scenePhoto">全国各地司庆布置场景图</button>
            </section>

        </main>
        <button class="upload">上传图片</button>

    </div>
</template>
<script>
export default {
    name: 'regiment',
    data() {
        return {
            isShow: false, //是否显示各个区域
            aliveList: [
                {
                    // id:1,//设定一个总部id
                    name: '集团总部',
                },
                {
                    name: '华中事业部',
                },
                {
                    name: '华南事业部',
                },
                {
                    name: '华中事业部',
                },
                {
                    name: '华南事业部',
                },
                {
                    name: '华中事业部',
                },
                {
                    name: '华南事业部',
                },
            ],
        }
    },
    methods: {
        // 点击去总部集团
        toZongbu(item) {
            // 带参数变成:liveRegiment?id=item.name
            this.$router.push({ path: 'liveRegiment', query: { id: item.id } })
        },
        // 点击去全国各地司庆布置场景图
        scenePhoto(){
            this.$router.push({path:'wholeCountry'});
        },
        // 标题返回栏
        onClickLeft() {
            this.$router.go(-1)
        },
    },
}
</script>
<style lang="scss" scoped>
.regiment{
    background-color: #ecf1f3;
}
.van-nav-bar .van-icon {
    color: #000;
}
.van-nav-bar__title {
    font-size: 0.9rem;
}
.header img {
    display: block;
    width: 100%;
    height: 100%;
}
.main {
    // background-color: #111;
    
    // background: url("../../../../static/img/zhibo-bg@2x.png") no-repeat center top;
    // color: #fff;
    color: #44559b;
    padding: 0.8rem;
    .detail-1 {
        text-align: left;
        div {
            h1 {
                font-size: 1rem;
            }
        }
        .detail-content {
            font-size: 0.6rem;
            // color: #ccc;
            color: #44559b;
        }
    }
    .hot {
        border-top: 1px solid #ccc;

        h2 {
            // color: #fff;
            color: #44559b;
            font-size: 1rem;
            line-height: 1;
            text-align: left;
        }
        .common-box {
            width: 100%;
            margin: 0.32rem 0 0 0;
            overflow: auto;
            display: flex;
            img {
                width: 76px;
                height: 76px;
                -webkit-box-flex: 0;
                -ms-flex: none;
                flex: none;
                background-position: top;
                background-size: cover;
                margin: 0 0.2rem 0 0;
                background-color: #ccc;
            }
        }
    }
    .list {
        border-top: 1px solid #ccc;
        margin-top: 0.94rem;
        h2 {
            // color: #fff;
            color: #44559b;
            font-size: 1rem;
            line-height: 1;
            text-align: left;
        }
        ul {
            li {
                height: 3.75rem;
                margin-top: 1rem;
                height: 3.75rem;
                line-height: 3.75rem;
            }
        }
        button {
            width: 100%;
            height: 3rem;
            font-size: 1rem;
            color: #ffffff;
            line-height: 3rem;
            background-color: #487dbb;
            border-radius: 10px;
        }
    }
}

.list ul li:nth-child(odd) {
    background-color: #013d9c;
}
.list ul li:nth-child(even) {
    background-color: #ffffff;
    color: #3586ff;
}
.upload {
    width: 100%;
    height: 3rem;
    font-size: 1rem;
    color: #ffffff;
    line-height: 3rem;
    background-color: #487dbb;
    margin-top: 1.75rem;
 
}
</style>
