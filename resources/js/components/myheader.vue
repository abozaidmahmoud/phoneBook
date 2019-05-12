<template>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="https://bulma.io">
        <img src="https://bulma.io/images/bulma-logo.png" alt="PhoneBook" width="112" height="28">
      </a>

      <div class="navbar-menu is-active">
        <div class="navbar-item">
          <router-link to="/home" > Home</router-link>

        </div>

        <div class="navbar-item">
          <router-link to="/about">About</router-link>

        </div>
      </div>
    </div>
  </nav>
</template>
