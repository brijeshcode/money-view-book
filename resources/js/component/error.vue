<template>
	<div>
		<spam class="help is-danger"
			v-if="form.errors.has('name')"
			v-text="form.errors.get('name')"></spam>
	</div>
	</div>
</template>


<script>
	export default{
	}
</script>