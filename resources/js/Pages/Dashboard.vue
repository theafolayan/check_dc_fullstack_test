<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200 mx-24">
            What's on your mind today sir?
            <create-post-form />

            <div class="mx-auto max-w-xs w-full "> <h3 class="text-black font-bold text-lg"> Your recent Posts</h3>

            </div>
             <div class="my-3 mx-auto overflow-hidden bg-white rounded max-w-xl w-full shadow-lg leading-normal">
              <ul v-for="post in posts" :key="post.id">
                  <li class="block group hover:bg-blue p-3 border-b">  <p class="mb-1 text-black group-hover:text-gray-500">{{post.title}}</p> </li>
              </ul>
          </div>
          </div>



        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import CreatePostForm from "../Components/CreatePostForm.vue";
// CreatePostFormVue

export default {
  components: {
    BreezeAuthenticatedLayout,
    CreatePostForm,
  },
  props: {
    posts: Array,
  },

  methods: {
    sey(){
        console.log(this.posts);
    }
  }

};
</script>
