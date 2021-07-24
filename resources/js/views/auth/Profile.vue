<template>
  <div class="container py-4">
	  <div class="row">
		<div class="col-md-4">
		  <div class="card" style="width: 18rem;">
			<img class="card-img-top" :src="'/assets/profile.jpg'" alt="Card image cap">
			<div class="card-body">
			  <template v-if="isLoggedIn">
				<h5 class="card-title">{{user.name}}</h5>
				<p class="card-text">{{user.email}}</p>
			  </template>
			  <a href="#" class="btn btn-primary">Follow</a>
			</div>
		  </div>
		</div>
		<div class="col-md-8">
		  <div class="jumbotron">
			<h1 class="display-4">Hello, world!</h1>
			<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
			<hr class="my-4">
			<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
			<p class="lead">
			  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
			</p>
		  </div>
		</div>
	  </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>