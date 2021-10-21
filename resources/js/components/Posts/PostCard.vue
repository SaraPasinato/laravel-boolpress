<template>
  <div class="card w-50 my-2 border border-white">
    <div class="row h-100 justify-content-between ">
      <img :src="post.image" :alt="post.title" class="card-img-top col-6">
      <div class="card-body col-6">
        <h5 class="card-title">{{post.title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted"> pubblicato il {{post.created_at}}</h6>
        <p class="card-text">{{post.content}}</p>
    </div>
    </div>

</div>
</template>

<script>
export default {
 name:'PostCard',
 props:['post']

}
</script>

<style lang="scss" scoped>

</style>