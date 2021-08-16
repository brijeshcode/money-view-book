<template>
	<div class="container">
		<div class="columns">
			<div class="column is-3"></div>
			<div class="column is-6">
				<div class="box">
					<h2 class="title">Add Cash Spend</h2>
					<form>
						<div class="field">
							<div class="control has-icons-left">
							  <input class="input" type="number" placeholder="Enter Amount">
							  <span class="icon is-small is-left">
							    <i class="fas fa-rupee-sign"></i>
							  </span>
							</div>
						</div>

						<div class="field">
							<div class="control has-icons-left">
							  <input class="input" type="text" placeholder="Where did you spend?">
							  <span class="icon is-small is-left">
							    <i class="fas fa-store-alt"></i>
							  </span>
							</div>
						</div>


						<div class="field">
							Select Category

								<div class="column is-2" v-for="category in categories" v-text="category.name" > </div>

						</div>

						<div class="field is-grouped">
						  <div class="control">
						    <button class="button is-link">Submit</button>
						  </div>
						  <div class="control">
						    <button class="button is-link is-light">Cancel</button>
						  </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return {
				categories : [
				{
					id: 1,
					name : 'Entertatment',
					image : 'entertatment',
					color : 'red'
				},
				{
					id: 2,
					name : 'Cloth',
					image : 'entertatment',
					color : 'pink'
				},
				{
					id: 3,
					name : 'Vegitable',
					image : 'entertatment',
					color : 'green'
				}
				]
			}
		}
	}
</script>