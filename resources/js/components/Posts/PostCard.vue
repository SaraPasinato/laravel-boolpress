<template>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title">{{post.title}}</h5>
    <h6 class="card-subtitle mb-2 text-muted"> pubblicato il {{post.created_at}}</h6>
    <p class="card-text">{{post.image}}</p>
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
.card{
    width: 16rem;
}
</style>