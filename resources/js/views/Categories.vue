<template>
	<div class="container">
		<div class="columns">
			<div class="column is-6">
				 	<category-list :categories="categories" text="show"></category-list>
			</div>
			<div class="column is-6">
				<add-category @completed="addCategory"></add-category>
			</div>
		</div>
	</div>
</template>


<script>
import addCategory from '../component/addCategory.vue';
import categoryList from '../common-components/category-list.vue';
import Category from '../Models/Category';
	export default{

		components: {
			'add-category': addCategory,
			'category-list': categoryList
		},
		data(){

			return {
				categories: [],

			};
		},
		created(){
			Category.all(categoryData => this.categories = categoryData);
		},

		methods: {
			addCategory(category){
				this.categories.unshift(category);
				alert('Category added');
			}
		}
	};
</script>
