<template>
    <div class="container">
        <div class="title">
            金曲
        </div>
        <div class="main">
            <img src="../../../../static/img/jinqu.jpg" alt="">
            
        </div>
        <van-row class="footer">
            <van-col span="16" class="lrc">
                <div>
                    我们不一样，彩生活正在谱写不一样的自己，
                    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
                    xxxxxxxxxx
                 
                </div>
            </van-col>
            <van-col span="8" class="good">
                <!-- <van-icon name="like" /> -->
                <img :src="imgs" alt="">
                <div>投票</div>
            </van-col>
        </van-row>
    </div>
</template>
<script>
import Vue from 'vue'
import { Icon } from 'vant';
import { Row, Col } from 'vant';



Vue.use(Icon).use(Row).use(Col);
export default {
    data() {
        return {
            imgs:require('../../../../static/img/zan.png')//使用require导入,避免图片路径不对
        }
    },
}
</script>
<style scoped>
.title {
    width: 100%;
    height: 4rem;
    line-height: 4rem;
    text-align: center;
}
.main {
    width: 100%;
    height: 23.25rem;
}
.main img{
    display: block;
    width: 100%;
    height:  100%;
}
.footer {
    height: 8rem;
    padding-top: 1.37rem;
}
.footer .good{
    height: 8.31rem;
    color: #42b3ff;
}
.footer .good img{
    width: 2rem;
}
.footer .lrc{
    height: 8.31rem;
    font-size: .8rem;
   
}
</style>
