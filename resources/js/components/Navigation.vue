<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <router-link class="nav-link" exact :to="{name: 'home'}"> Home </router-link> </li>
        <li class="nav-item"> <router-link class="nav-link" :to="{ name: 'page.about' }">About</router-link> </li>
		<li class="nav-item"> <router-link class="nav-link" :to="{ name: 'page.contact' }">Contact</router-link> </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            Note
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <router-link class="dropdown-item" :to="{name: 'notes.create'}">New Note</router-link>
			<router-link class="dropdown-item" :to="{name: 'notes.table'}">Table of Note</router-link>
          </div>
        </li>
      </ul>
	  <ul class="navbar-nav">
		  <template v-if="isLoggedIn">
		  <li class="nav-item"> <router-link class="nav-link" :to="{ name: 'profile' }">{{ user.name }}</router-link> </li>
		  <li class="nav-item"> <a class="nav-link" @click.prevent="handleLogout">Logout</a> </li>
		  </template>
		  <template v-else>
			<li class="nav-item"> <router-link class="nav-link" exact :to="{ name: 'login' }"> Login </router-link> </li>
			<li class="nav-item"> <router-link class="nav-link" :to="{ name: 'register' }">Register</router-link> </li>  
		  </template>
      </ul>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
	methods: {
		handleLogout() {
			this.$store.dispatch('logout').then(() => {
				this.$router.push('/').catch(()=>{})
			})
		}
	},
	computed: {
		...mapGetters(['user', 'isLoggedIn'])
	}
};
</script>
