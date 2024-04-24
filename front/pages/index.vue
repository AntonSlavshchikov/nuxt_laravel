<script setup lang="ts">

import BaseLayout from "~/layouts/BaseLayout.vue";
import {getPosts, type IPost} from "~/services/PostService";

const {isLoading, isError, data, error} = useQuery<IPost[]>({
  queryKey: ['posts'],
  queryFn: () => getPosts()
})

</script>

<template>
<BaseLayout>
  <div class="mt-10 container">
    <h2 class="text-xl font-bold text-black mb-10">List posts</h2>

    <div v-if="isLoading">
      LOADING
    </div>

    <div v-else-if="isError">
      {{error?.message}}
    </div>

    <div v-else v-for="post in data">
      <div class="mb-10 border border-gray-700 rounded-xl py-5 px-10 transition-all hover:scale-105 hover:shadow-lg cursor-pointer">
        <div>{{post.title}}</div>
        <div>{{ post.body}}</div>
      </div>
    </div>
  </div>
</BaseLayout>
</template>

<style scoped>

</style>