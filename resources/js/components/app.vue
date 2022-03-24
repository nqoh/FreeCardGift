<template>
   <div class="todolistcontainer">
       <div class="heading">
           <h2  id="title">Todo List</h2>
           <addItemForm />
       </div>
       <list-view :items="Items"/>
   </div>
</template>

<script>
import axios from 'axios'
import addItemForm from './addItemForm.vue'
import listView from './listView.vue'
export default {
   components:{
       addItemForm,
       listView
       },
       data(){
           return{
               Items:[]
           }
       },
       methods:{
           getList(){
               axios.get('api/items').then(
                   response => {
                       this.Items = response.data
                   }
               )
           }
       },

       created(){
           this.getList();
       }
}
</script>
  
<style>
 .todolistcontainer{
     width: 350px;
     margin: 0px auto;
 }
 .heading{
     background: #e6e6e6;
     padding: 10px;
 }
 #title{
     text-align: center;
 }
</style>