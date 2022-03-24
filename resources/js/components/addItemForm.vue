<template>
  <div class="addItemForm">
      <input type="text" v-model="items.name">
      <button  @click="addItem" :class="[items.name ? 'active' : 'inactive' , 'pul']">Add</button>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data(){
      return{
          items:{
              name:''
          }
      }
  },
  methods:{
      addItem(){
         
          if(this.items.name == ''){
              return
          }
         axios.post('api/item/store',{
             Item: this.items
         }).then( response =>{
             if(response.status == 201 ){
                 this.items.name = ''
             }
         }).catch(error => {
             console.log(error)
         })
      }
  }
}
</script>

<style>
input{
    outline: none;
    padding: 5px;
    border: 0px;
}
.active{
    color: green;
}

.inactive{
    color: grey;
}

.pul{
   text-align: center;
    padding: 5px
}

</style>