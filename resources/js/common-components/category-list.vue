<template>
    <div class=" columns is-multiline has-icons-left">

    <div class=" column is-3 "
        v-for="category in categories"
        v-on:click="categorySelected(category.id)"
        >
        <expense-icon :category="category" :text="text"></expense-icon>
    </div>
    </div>
</template>

<script>
import expenseIcon from '../common-components/icon.vue';
    export default{
        components: {
            'expense-icon': expenseIcon,
        },
        props: ['categories', 'text' ],

        created(){
            console.log('category-list');
            console.log(this.categories);
        }
    };
</script>

8209565940