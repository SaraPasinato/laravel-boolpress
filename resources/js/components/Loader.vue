<template>
  <div id="spinner">
      <div class="spinner-grow text-primary" role="status" style="width: 5rem; height: 5rem;">
      <span class="sr-only">Loading...</span>
      </div>
  </div>
</template>

<script>
export default {
    name:'Loader',
}
</script>

<style lang="scss" scoped>

#spinner{
    position: fixed;
    top:0;
    bottom:0;
    left: 0;
    right: 0;
    z-index: 2;

    background-color: rgba(0,0,0,0.5);

    display: flex;
    justify-content: center;
    align-items: center;


}

</style>