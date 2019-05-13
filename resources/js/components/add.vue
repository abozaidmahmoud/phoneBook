<style>
  .input{
    margin: 7px;
  }
</style>

<template>
  <div class="modal" :class="active">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Modal title</p>
        <button class="delete" aria-label="close" @click="close"></button>
      </header>
      <section class="modal-card-body">
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="string" :class="{'is-danger':errors.name}" placeholder="name" v-model="list.name">
        </div>
        <label class="has-text-danger" v-if="errors.name"><i class="fa fa-warning"></i> {{errors.name[0]}}</label>
        <span v-if="list.name"></span>

        <label class="has-text-danger" ></label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="number" placeholder="phone" :class="{'is-danger':errors.phone}" v-model="list.phone">
        </div>
        <label class="has-text-danger" v-if="errors.phone"><i class="fa fa-warning"></i> {{errors.phone[0]}}</label><br>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="email" placeholder="Email" :class="{'is-danger':errors.email}" v-model="list.email">
          <span class="icon is-medium is-left">
            <i class="fa fa-envelope"></i>
          </span>
          <span class="icon is-medium is-right">
            <i class="fa fa-check"></i>
          </span>
        </div>
        <label class="has-text-danger" v-if="errors.email"><i class="fa fa-warning"></i> {{errors.email[0]}}</label><br>

      </section>
      <footer class="modal-card-foot">
        <button class="button is-success" @click="save">Save changes</button>
        <button class="button" @click="close">Cancel</button>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  props: ["active"],
  data() {
    return {
      list: {
        name: "",
        phone: "",
        email: ""
      },
      errors:{},
    };
  },

  methods: {
    close() {
      this.$emit("closeModal");
      this.list={};
      this.errors={};
    },



    save() {
      var self = this;
      axios
        .post("/phonebook", this.list)
          .then((response)=>{
              this.close();
              this.list={};
          })

           
          .catch((error)=>
              this.errors= error.response.data.errors

           )
       
        // .catch(function(error) {
        // });
    }
  }
};
</script>`