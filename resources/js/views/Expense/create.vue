<template>
	<div class="container">
		<div class="columns">
			<div class="column is-3">
			</div>
			<div class="column is-6">
				 <add-expense></add-expense>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
import addExpense from '../../component/addExpense.vue';
	export default{
		 components: {
            'add-expense': addExpense,
        },
		data(){
			return {
			}
		}
	};
</script>