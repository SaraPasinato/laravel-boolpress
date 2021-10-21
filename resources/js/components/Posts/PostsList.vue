<template>
  <section
    id="section-post" >
    <Loader v-if="isLoading" />
    <div v-else >
      <div class="row justify-content-center align-item-center my-5">
          <PostCard v-for="post in posts" :key="post.id" :post="post" />
      </div>
      <nav class="d-flex justify-content-center" aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item" v-if="pagination.currentPage >=2" @click="getPosts(pagination.currentPage -1 )"><a class="page-link"  >Previous</a></li>

          <li class="page-item" v-if="pagination.currentPage < pagination.lastPage " @click="getPosts(pagination.currentPage +1)"><a class="page-link" >Next</a></li>
        </ul>
      </nav>
    </div>
  </section>
</template>

<script>
import Axios from "axios";
import PostCard from "./PostCard.vue";
import Loader from "../Loader.vue";

export default {
  name: "PostsList",

  data() {
    return {
      posts: [],
      baseUri:'http://localhost:8000/',
      isLoading: false,
      pagination:{},
    };
  },
  components: {
    PostCard,
    Loader,
  },
  methods: {
    getPosts(page) {
      this.isLoading = true;
      Axios.get(`${this.baseUri}api/posts?page=${page}`).then((res) => {
          console.log(res.data);
          const { data, current_page, last_page } = res.data;
          this.posts = data;
          this.pagination={currentPage : current_page , lastPage:last_page};
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
  },
  created() {
    this.getPosts(1);
  },
};
</script>

<style lang="scss" scoped>
.page-item{
 cursor: pointer;
}
</style>