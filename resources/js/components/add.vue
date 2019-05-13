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
          <input class="input" type="string" placeholder="name" v-model="list.name">
        </div>
        <label class="has-text-danger" ></label>
        <div class="control has-icons-left has-icons-right">
          <input class="input" type="number" placeholder="phone" v-model="list.phone">
        </div>
         <label class="has-text-danger" v-bind="errors.phone"></label>


        <div class="control has-icons-left has-icons-right">
          <input class="input" type="email" placeholder="Email" v-model="list.email">
          <span class="icon is-medium is-left">
            <i class="fa fa-envelope"></i>
          </span>
          <span class="icon is-medium is-right">
            <i class="fa fa-check"></i>
          </span>
        </div>
        <label class="has-text-danger" v-if="errors.email">{{errors['email']}}</label>


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
    },
    save() {
                    // var self = this;

      axios
        .post("/phonebook", this.list)
        
  .then((response) => {
                    if(response.data.msg=='error'){
                        this.errors['name']=response.data.error_validation['name'][0];
                        this.errors['email']=response.data.error_validation['email'][0];
                        this.errors['phone']=response.data.error_validation['phone'][0];
                    }
                    
                })
           
        
       
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>`