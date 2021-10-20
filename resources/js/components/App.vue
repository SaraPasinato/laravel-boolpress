<template>
    <div class="container">
        <Header :title="title"/>
      <main>
        <PostsList />

      </main>
    </div>
</template>

<script>

import Header from './Header.vue';
import PostsList from './posts/PostsList.vue';

    export default {
       name:"App",
       components:{
           Header,
           PostsList, 
       },
       data(){
           return{
               title:'Il mio blog',
           };
       },
    };
</script>

<style lang="scss" scoped>

</style>