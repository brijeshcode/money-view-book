<template>
	<div class="columns">
		<div class="column">
			<div class="message">
				<div class="message-header"> <p>Add new message</p>   </div>
				<div class="message-body">
					<form @submit.prevent="onSubmti" @keydown="form.errors.clear()">
						<p class="field">
							<textarea class="textarea" placeholder="I have something to say ..." v-model="form.body"></textarea>

							<spam class="help is-danger"
								v-if="form.errors.has('body')"
								v-text="form.errors.get('body')"></spam>
						</p>

						<p class="field">
							<button class="button is-primary " :disabled="form.errors.any()">Submit</button>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
	export default{
		data(){
			return {
				form : new Form({ body : ''})
			};
		},
		methods: {
			onSubmti(){
				// alert('submited');
				this.form
				.post('/statuses')
				.then(status=> this.$emit('completed', status));

			}
		}
	};
</script>