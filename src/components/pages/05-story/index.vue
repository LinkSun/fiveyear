<template>
    <div class="container">
        <van-nav-bar title="彩生活上市五周年庆" left-text="" left-arrow @click-left="onClickLeft" />
        <header class="header">
            <div>
                5年一个瞬间，一路上我们留下多少美好记忆。
            </div>
            <div>在物业的岗位上还记得最初陪伴我们前行的他(她)吗？ </div>
            <div>小人物大精彩，</div>
            <div> 讲述你或你身边同事工作中发生的故事， </div>
            <div>见证彩生活人一路前行的记忆，</div>
            <div> 欢迎你写下散发着闪亮光芒的每一位彩生活人故事。 </div>
            <div>以“300字左右，2-3张图片”的格式,</div>
            <div> 投稿至邮箱：
                <span @click="goSina">cshzcb@sina.com</span>
            </div>
        </header>
        <main class="main">
            <div class="title">
                <p>奋勇灭火 | 铁肩担道义，热血铸丰碑</p>
            </div>
            <div class="img">
                <img src="../../../../static/img/story-content.jpg" alt="">
            </div>
            <div class="content">
                <p>
                    2019年5月5日晚上21时40分左右，彩生活京津事业部喜年广场项目主任徐力在正常巡查到喜年广场1号楼时，突然发现1号楼16层的整个窗户掉落到1号大堂门口烟雾弥漫。徐力的第一反应是可能出现了火情，随即拨打了119报警电话。当时情况紧急，徐力报警后，拎起1号楼大堂的两个灭火器冲上16层，此时，6号楼的一位业主也发现了火情，随即冲上16层一同灭火。冲上16层之后发现整个厨房都被烈火包围，是由于租户在家里炼油引起的火灾。因火势过大，在灭火过程中，徐力的头发还有脸被火焰灼伤了，徐力与业主二人顶着浓烟，经过一番努力，终于将火扑灭，整个灭火过程持续了十多分钟，因及时灭火，没有造成人员伤亡并避免了更巨大的经济损失。
                </p>
            </div>
        </main>

    </div>
</template>

<script>
export default {
    name: 'story',
    data() {
        return {
            url:"http://mail.sina.com.cn",//去外网
        }
    },
    methods: {
        onClickLeft() {
            this.$router.go(-1)
        },
        goSina(){
           window.location.href=this.url;
        }
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
.container {
    background-color: #f5f5f9;
}
.header {
    background: url('../../../../static/img/story-header.png') no-repeat center
        top;
    width: 100%;
    height: 10.82rem;
    background-size: 100% 100%;
    font-size: 0.8rem;
    padding: 10px;
    > div {
        text-align: left;
        margin-top: 6px;
        span {
            color: #112d8a;
        }
    }
}
.main {
    padding: 10px;

    .title {
        color: #f37961;
        font-size: 0.9rem;
        font-weight: 550;
    }
    .img {
        img {
            width: 100%;
            display: block;
        }
    }
    .content {
        p {
            text-indent: 2em; //首行空两格
            text-align: left;
            font-size: 0.8rem;
            line-height: 26px;
        }
    }
}
</style>
