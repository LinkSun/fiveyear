<template>
    <div>
        <!-- 头部 -->
        <header class="header">
            <img src="../../../../static/img/alive.jpg" alt="">
        </header>
        <!-- main主体 -->
        <main class="main">
            <!-- 标题部分 -->
            <section class="detail-1">
                <div class="">
                    <h1>彩生活上市五周年庆</h1>
                </div>
                <div class="detail-content">
                    <p class="">
                        <span>活动时间：</span>
                        <span id="activityTime">2018.12.08 08:30 ~ 2018.12.09 22:00</span>
                    </p>

                </div>
            </section>
            <!-- 热门图片部分 -->
            <section class="hot">
                <h2>热门图片</h2>
                <div class="common-box">
                    <img src="../../../../static/img/avatar3.png" alt="">
                    <img src="../../../../static/img/avatar2.png" alt="">
                    <img src="../../../../static/img/avatar3.png" alt="">
                    <img src="../../../../static/img/avatar4.png" alt="">
                    <img src="../../../../static/img/avatar3.png" alt="">
                    <img src="../../../../static/img/avatar2.png" alt="">
                    <img src="../../../../static/img/avatar3.png" alt="">
                    <img src="../../../../static/img/avatar4.png" alt="">
                    <img src="../../../../static/img/avatar3.png" alt="">
                    <img src="../../../../static/img/avatar2.png" alt="">
                    <img src="../../../../static/img/avatar3.png" alt="">
                    <img src="../../../../static/img/avatar4.png" alt="">
                </div>
            </section>
            <!-- 图片直播部分 -->
            <section class="list">
                <h2>图片直播入口</h2>
                <ul>
                    <li  v-for="(item, index) in aliveList" :key="index" @click="toZongbu(item)">
                        {{item.name}}
                    </li>
                    

                </ul>
            </section>
        </main>

    </div>
</template>
<script>
export default {
    name:"regiment",
    data(){
        return{
            aliveList:[
                {   
                    // id:1,//设定一个总部id
                    name:"集团总部"
                },
                 {
                    name:"华中事业部"
                },
                 {
                    name:"华南事业部"
                },
                 {
                    name:"华中事业部"
                },
                 {
                    name:"华南事业部"
                },
                 {
                    name:"华中事业部"
                },
                 {
                    name:"华南事业部"
                },
                

            ]
        }
    },
    methods: {
        toZongbu(item){
            // 带参数变成:liveRegiment?id=item.name
            this.$router.push({ path: 'liveRegiment', query: { id: item.id }})
        }
    },
}
</script>
<style lang="scss" scoped>
.header img {
    display: block;
    width: 100%;
    height: 100%;
}
.main {
    background-color: #111;
    color: #fff;
    padding: 0.8rem;
    .detail-1 {
        text-align: left;
        div {
            h1 {
                font-size: 0.8rem;
            }
        }
        .detail-content {
            font-size: 0.6rem;
            color: #ccc;
        }
    }
    .hot {
        h2 {
            color: #fff;
            font-size: 0.8rem;
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
        h2 {
            color: #fff;
            font-size: 0.8rem;
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
    }
}


.list ul li:nth-child(odd) {
    background-color: #013d9c;
}
.list ul li:nth-child(even) {
    background-color: #ffffff;
    color: #3586ff;
}
</style>
