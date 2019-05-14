<template>

<div>
    <nav class="panel">
        <p class="panel-heading">
            PhoneBook
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
             <i class="has-text-danger fa fa-trash" aria-hidden="true"></i>
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
    <Add v-bind:active="is_active" v-bind:function_name="function_name" @closeModal="removeActive"></Add>
    <Show v-bind:active="modal_show_active"  @closeModal="removeActive"> </Show>


    </div>
</template>

<script>
    let Add = require('./add.vue').default;
    let Show = require('./show.vue').default;

    export default ({
        components:{Add,Show},
        data(){
            return {
                is_active:false,
                list:{},
                errors:'',
                modal_show_active:'',
                phone_item:'',
                function_name:''

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
                this.is_active=this.modal_show_active='';
            },

            showDetail(item){
                console.log(this.$children);
                 this.$children[1].item=item;

                this.modal_show_active='is-active';

              
            },
            update(item){
                this.is_active='is-active';
                this.function_name='update';
                this.$children[0].list={name:item.name,phone:item.phone,email:item.email};
            }

        }
    })
</script>