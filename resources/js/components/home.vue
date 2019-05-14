
<style>
    .msg{
        position: absolute;
        right: 2px;
        top:2px;
        height: 52px;
        padding: 15px;
    }
</style>

<template>
<div>
    <nav class="panel">
        <p class="panel-heading">
            PhoneBook
           <span v-if="msg" class="notification is-warning msg"><i class="fa fa-thumbs-up"></i> {{msg}}</span>
            <a class="button is-primary is-bordered" @click="addActive"><i class="fa fa-plus"></i> Add</a>

        </p>
        <div class="panel-block">
            <p class="control has-icons-left">
                <input class="input is-small" type="text" placeholder="search">
                <span class="icon is-small is-left">
        <i class="fa fa-search" aria-hidden="true"></i>
      </span>
            </p>
        </div>
        <a class="panel-block" v-for="item,key in list">
            <span class="column is-9">{{item.name}}</span>
          <span class="panel-icon column is-1">
             <i class="has-text-danger fa fa-trash"  @click="delete_item(item,key)" aria-hidden="true" ></i>
          </span>
            <span class="panel-icon column is-1">
             <i class="has-text-dark fa fa-edit" aria-hidden="true" @click=update(item)></i>
          </span>
            <span class="panel-icon column is-1">
             <i class="has-text-info fa fa-eye" aria-hidden="true" @click="showDetail(item)"></i>
          </span>

        </a>
    </nav>
<!--Modal phoneBook add-->
    <Add v-bind:active="is_active"   @show_msg="show_msg" @closeModal="removeActive"></Add>
    <Show v-bind:active="modal_show_active"  @closeModal="removeActive"> </Show>
    <Update v-bind:active="modal_update_active" @show_msg="show_msg"  @closeModal="removeActive"></Update>



</div>
</template>

<script>
    let Add = require('./add.vue').default;
    let Show = require('./show.vue').default;
    let Update = require('./update.vue').default;

    export default ({
        components:{Add,Show,Update},
        data(){
            return {
                is_active:false,
                list:{},
                errors:'',
                modal_show_active:'',
                modal_update_active:'',
                msg:''

            }
        },

        created(){
            axios.post('getData')
                .then((response)=>{
                    this.list=response.data;
                })
                .catch((error)=>{
                    this.errors=error.response.data.errors;
                })
        },

        methods:{
            addActive(){
                this.is_active='is-active'
            },
            removeActive(){
                this.is_active=this.modal_show_active=this.modal_update_active='';
            },

            showDetail(item){
                 this.$children[1].item=item;
                this.modal_show_active='is-active';
            },
            update(item){
                this.$children[2].list=item;
                this.modal_update_active='is-active';
            },
            delete_item(item,key){
                swal({
                    title: "Sweet!",
                    text: "Here's a custom image.",
                    imageUrl: 'thumbs-up.jpg'
                });

                axios
                    .delete(`/phonebook/${item.id}`, this.list)
                    .then((response)=>{
                        this.list.splice(key,1);
                        this.msg=response.data.msg;
                    })
                    .catch((error)=>{
                    })

            },

            show_msg(msg){
                this.msg=msg;
            },

        }
    })
</script>