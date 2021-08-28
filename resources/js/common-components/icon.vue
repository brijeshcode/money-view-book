<template>
    <div class="categories icon.vue">
        <div class="category-icon"
            v-bind:style="{background: category.color}"
            >
                <i v-if="category.icon_type == 'fontawesome'" v-bind:class="category.class_or_path"></i>
                <span v-if="category.icon_type == 'character'" v-text="category.name.charAt(0)"></span>
        </div>
        <p v-if="text == 'show'" v-text="category.name"></p>
    </div>
</template>
<style>
    .categories {
        margin-bottom: 5px;
        text-align: center;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
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
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;

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