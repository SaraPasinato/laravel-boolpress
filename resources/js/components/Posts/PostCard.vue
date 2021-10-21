<template>
  <div class="card w-50 my-2  border border-white">
    <div class="row h-100 justify-content-center no-gutter">
      <img :src="post.image" :alt="post.title" class="card-img-top col-6 m-0 p-0">
      <div class="card-body  col-6 px-5 ">
        <h5 class="card-title">{{post.title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted"> pubblicato il {{getFormattedDate(post.created_at)}}</h6>
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