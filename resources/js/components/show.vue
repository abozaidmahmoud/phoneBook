

<template>
  <div class="modal" :class="active">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Modal show phone</p>
        <button class="delete" aria-label="close" @click="close"></button>
      </header>
      <section class="modal-card-body">
        <div class="control has-icons-left has-icons-right">

        </div>

        <label class="has-text-danger" ></label>
        <div class="control has-icons-left has-icons-right">

        </div>
        <label class="has-text-danger" v-if="errors.phone"><i class="fa fa-warning"></i> {{errors.phone[0]}}</label><br>
        <div class="control has-icons-left has-icons-right">

          <span class="icon is-medium is-left">
            <i class="fa fa-envelope"></i>
          </span>
          <span class="icon is-medium is-right">
            <i class="fa fa-check"></i>
          </span>
        </div>

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
      errors:{},
    };
  },

  methods: {
    close() {
      this.$emit("closeModal");
    },

  }
};
</script>`