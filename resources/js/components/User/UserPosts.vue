<template>
<div>
    <div class="text-center mb-10 text-gray-600">
        Order posts by publication date:
        <a v-on:click="RandomOrder" class="text-blue-600 hover:text-blue-900">Random</a>
        |
        <a v-on:click="AscendingOrder"  class="text-blue-600 hover:text-blue-900">Ascending</a>
        |
        <a v-on:click="DescendingOrder" class="text-blue-600 hover:text-blue-900">Descending</a>
    </div>
    <posts-cards
        :orderPosts="typeOrderPosts" 
        :urlPosts="urlPostsAuthor"
        :key="orderList"
    >
    </posts-cards>    
</div>

</template>

<script>
    import axios from 'axios';
    import PostsCards from '@/js/components/PostsCards.vue';

    export default {
        components:{
            PostsCards   : PostsCards
        },
        props:{
          author:{
              type:Object
          },
          urlPosts:{
              type:String,
              default:'posts-by-author/'
          }  

        },
        data(){
            return {
                orderList:0,
                typeOrderPosts:null,
                urlPostsAuthor:this.urlPosts+this.author.id
            }
            
        },
        methods:{
            RandomOrder(){
                this.typeOrderPosts = null;
                this.orderList = 0;
            },
            AscendingOrder(){
                this.typeOrderPosts = "asc";
                this.orderList += 1;
            },
            DescendingOrder(){
                this.typeOrderPosts = "desc";
                this.orderList += 1;
            }
        },

        mounted() {
            console.log('Component mounted.')
            
        }
    }
</script>
