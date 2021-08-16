<template>
    <div class="categories" style="text-aling:center">
        <div class="category-icon"
            v-bind:style="{background: category.color}"
            >
                <i v-if="category.icon_type == 'fontawesome'" v-bind:class="category.class_or_path" class="category-icon" style="margin-left: 5px;"></i>
                <span v-if="category.icon_type == 'character'" v-text="category.name.charAt(0)"></span>
        </div>
        <p v-if="text == 'show'" v-text="category.name"></p>
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
    export default{
        props: ['category', 'text' ],

        created(){
            console.log('icons.vue');
            // console.log(this.category);
        }
    };
</script>