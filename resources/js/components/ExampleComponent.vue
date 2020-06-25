<template>
<div class="flex flex-wrap">
    <div v-for="post in postsLists" class="w-full sm:w-1/2 md:w-1/3 mb-4 px-8">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img :src="post['image_url']" class="w-full h-54 h-auto max-h-2">
            <div class="px-6 py-4">
                <a class="font-bold text-xl mb-2">{{post['title']}}</a>
                <div>
                    <p class="text-gray-700 text-base break-words">
                        {{post['description']}}
                    </p>
                    <span class="text-xs text-gray-500">Publication date {{post['publication_date']}}</span>
                </div>
                <div class="mt-4">
                    <a  class="bg-transparent mt-4 border border-gray-500 hover:border-teal-500 text-xs text-gray-500 hover:text-teal-500 font-bold py-2 px-4 rounded-full">Read More</a>        
                </div>
            </div>
        </div>
    </div>
    <infinite-loading @infinite="InfiniteHandler"></infinite-loading>
</div>        
</template>

<script>
    import axios from 'axios';

    export default {
        props:{
            posts:{
                type:Array
            }
        },
        data(){
            return {
                page: 0,
                postsLists : []
            }
            
        },
        methods:{
            InfiniteHandler($state) {
                this.page += 1;
                axios.get('posts-list', {
                  params: {
                    page: this.page,
                  },
                }).then(response => {
                    
                    if (response.data.data.length) {
                        this.postsLists=this.postsLists.concat(response.data.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                })    
                .catch(error => {
                    console.log(error)
                })
            },
        },

        mounted() {
            console.log('Component mounted.')
            
        }
    }
</script>
