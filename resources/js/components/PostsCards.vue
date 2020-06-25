<template>
<div>
    <div class="flex flex-wrap">
        <div v-for="post in postsLists" class="w-full sm:w-1/2 md:w-1/3 mb-4 px-8">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img :src="post['image_url']" class="w-full h-54 h-auto max-h-2">
                <div class="px-6 py-4">
                    <a class="font-bold text-xl mb-2">{{post['title']}} {{orderPosts}}</a>
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
    </div>        
    <div class="text-center mb-10 text-gray-600">
        <infinite-loading @infinite="InfiniteHandler">
            <div slot="no-more">No more posts to show</div>
            <div slot="no-results">Sorry, no posts to show.</div>
        </infinite-loading>
    </div>
</div>

</template>

<script>
    import axios from 'axios';

    export default {
        props:{
          orderPosts:{
              type:String
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
                
                axios.get('posts-list/'+this.orderPosts, {
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

            AscendingOrder(){
                this.typeOrderPosts = "asc";
                this.orderList += 1;
                alert(this.typeOrderPosts);
            }
        },

        mounted() {
            console.log('Component mounted.')
            
        }
    }
</script>
