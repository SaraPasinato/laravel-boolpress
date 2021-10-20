<template>
  <section id="section-post" class="row justify-content-center align-item-center my-5">
      <post-card v-for="post in posts" :key="post.id" :post="post"/>
  </section>
</template>

<script>
import Axios from 'axios';
import PostCard from './PostCard.vue';

export default {
name:'PostsList',

data(){
    return{
        posts:[],
    };
},
 components:{
    PostCard,
 },
methods:{
    getPosts(){
        Axios.get('http://127.0.0.1:8000/api/posts').then(res=>{
            console.log(res);
            this.posts=res.data;
        }).catch((err)=>{
            console.error(err);
        });
    },
},
created(){
    this.getPosts();
},
}
</script>

<style scoped>

</style>