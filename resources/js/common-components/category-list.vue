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
<style>
    .categories {
        text-align: center;
        /*margin-left: 5px;*/
        cursor: pointer;
        margin-bottom: 5px;
    }

    .is-selected {
        border: 5px solid gainsboro;
        width: 57px;
        height: 59px;
    }

    .category-icon{
        font-size: 20px;
        color: #fff;
        width: 50px;
        height: 50px;
        display: table-cell;
        border-radius: 50%;
        vertical-align: middle;
    }
</style>

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