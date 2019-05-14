

<template>
  <div class="modal" :class="active">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Show {{item.name}} Detail</p>
        <button class="delete" aria-label="close" @click="close"></button>
      </header>
      <section class="modal-card-body">
        <li class="panel-block">
          <label class="column is-2"><b>name</b></label>{{item.name}}
        </li>
         <li class="panel-block">
          <label class="column is-2"><b>phone</b></label>{{item.phone}}
        </li>
         <li class="panel-block">
          <label class="column is-2"><b>email</b></label>{{item.email}}
        </li>
      </section>
      <footer class="modal-card-foot">
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
      errors: {},
      item:''
    };
  },

  methods: {
    close() {
      this.$emit("closeModal");
    }
  }
};
</script>`