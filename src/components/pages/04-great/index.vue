<template>
    <div class="container">
        <div class="title">
            金曲
        </div>
        <div class="main">
            <img src="../../../../static/img/jinqu.jpg" alt="">
            
        </div>
        <div class="footer">
            <div class="lrc">
                <div>
                    我们不一样，彩生活正在谱写不一样的自己，
                    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
                 
                </div>
            </div>
            <div class="good">
                <van-icon name="like" />
                <div>投票</div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { Icon } from 'vant';

Vue.use(Icon);
export default {}
</script>
<style scoped>
/* .container{
    background-color: #ccc;
} */
.title {
    width: 100%;
    height: 4rem;
    line-height: 4rem;
    text-align: center;
}
.main {
    width: 100%;
    height: 22.25rem;
}
.main img{
    display: block;
    width: 100%;
    height:  100%;
}
.footer {
    height: 8rem;
    width: 100%;
    display: flex;
    padding-top: 2.37rem;
    

}
.footer .good{
    width: 25%;
    height: 8.31rem;
    color: #42b3ff;

    
}
.footer .lrc{
    width: 75%;
    height: 8.31rem;
    /* background-color: skyblue; */
    font-size: .8rem;
   
}
</style>
