<template>
<div>
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
              type:Object,
              default:null
          },
          urlPosts:{
              type:String,
              default:'imported-posts-list'
          }  

        },
        data(){
            return {
                orderList:0,
                typeOrderPosts:null,
                urlPostsAuthor:this.urlPosts
            }
            
        },
        methods:{
    
        },

        mounted() {
            console.log('Component mounted.')
            
        }
    }
</script>
