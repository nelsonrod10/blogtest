<template>
<div>
    <posts-cards
        :orderPosts="typeOrderPosts" 
        :urlPosts="urlPostsAuthor"
        :urlViewPost ="'../post/'"
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
              default:'../posts-by-author/'
          }  

        },
        data(){
            return {
                typeOrderPosts:null,
                urlPostsAuthor:this.urlPosts+this.author.id
            }
            
        },
        methods:{
        },

        mounted() {
            console.log('Component mounted.')
            
        }
    }
</script>
