<template>
  <div class="card w-50 my-2  border border-white">
    <div class="row h-100 justify-content-center no-gutter">
      <img :src="post.image" :alt="post.title" class="card-img-top col-6 m-0 p-0">
      <div class="card-body  col-6 px-4 ">
        <h5 class="card-title">{{post.title}}</h5>
        <h5 class="card-title">Category:  <span  class="card-title badge font-wight-bolder p-2 rounded-pill "   :class="`bg-${post.category.color}`">{{post.category.name || ''}}</span></h5>
       
        <h5 class=" justify-content-center  align-items-center card-title"> Tags:</h5>
         <p class="d-inline-block col-3 badge text-dark p-2 rounded-pill " v-for="tag in post.tags" :key="tag.id" :style="`background:${tag.color}`">{{tag.name ||''}}</p>
        
        <h6 class="card-subtitle mb-2 text-muted"> pubblicato il {{getFormattedDate(post.created_at)}}</h6>
        <h6 class="card-subtitle mb-2  font-italic text-muted"> da: {{post.user ? post.user.name : 'Anonimo'}}</h6>
        <p class="card-text">{{post.content}}</p>

    </div>
    </div>

</div>
</template>

<script>
export default {
 name:'PostCard',
 props:['post'],
 methods:{
   getFormattedDate(date){
     const newDate=new Date(date);
     let day=newDate.getDate();
     let month=newDate.getMonth()+1;
     let year=newDate.getFullYear();

     if (month<10) month='0'+month;
     if (day<10) day='0'+day;

     return `${day}-${month}-${year}`;
   }
 },
 
}
</script>

<style lang="scss" scoped>
.card-body{
  background-color: rgb(233, 236, 236);
}
</style>