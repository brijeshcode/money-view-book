<template>
     <div class="p-2 bg-gray-50 text-right">
        <div class="p-2">
            <button title="test" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" v-text="btnText"></button>
        </div>
    </div>
</template>
<script>

export default{
        name: 'tf-button',
        props: ['category', 'text' ],
        data() {
           return  {
                btnText: 'smith',
            }
        },
        created(){
            console.log('icons.vue');
            // console.log(this.category);
        }
    };

</script>