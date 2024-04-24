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

    <div v-else class="card">
      <DataTable :value="data">
        <Column field="title" header="Title"></Column>
        <Column field="body" header="Body"></Column>
      </DataTable>
    </div>

<!--    <div v-else v-for="post in data">-->
<!--     -->

<!--&lt;!&ndash;      <div class="mb-10 border border-gray-700 rounded-xl py-5 px-10 transition-all hover:scale-105 hover:shadow-lg cursor-pointer">&ndash;&gt;-->
<!--&lt;!&ndash;        <div>{{post.title}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;        <div>{{ post.body}}</div>&ndash;&gt;-->
<!--&lt;!&ndash;      </div>&ndash;&gt;-->
<!--    </div>-->
  </div>
</BaseLayout>
</template>

<style scoped>

</style>