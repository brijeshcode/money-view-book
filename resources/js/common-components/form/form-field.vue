<template>
    <div class="field column ">
        <div v-if="label">{{ label }}</div>
        <div class="control has-icons-left">
            <input
            v-bind="$attrs"
            :value="value"
            @input="inputChange($event.target)"
            :type="type"
            :name="name"
            :class="inputClass"
            :style="inputStyle"
            :placeholder="placeholder"
            class="input"
            />

            <span v-if="icon" class="icon is-small is-left">
                <i v-if="icon" :class="icon" class="icon"></i>
            </span>
        </div>
        <!-- <error></error> -->
        <div class="help is-danger" v-if="error" v-text="errmsg"></div>
        <div class="help is-danger" v-if="showError" v-text="errorMessage"></div>
    </div>
</template>

<script>
export default {
    props: {
        type: { type: String, required: true, default: 'text' },
        name: { type: String, required: false, default: '' },
        value: { type: String, required: false, default: '' },
        placeholder: { type: String, required: false, default: '' },
        inputClass: { type: String, required: false, default: '' },
        inputStyle: { type: String, required: false, default: '' },

        label: { type: String, required: false, default: '' },
        hint: { type: String, required: false, default: 'hint' },
        icon: { type: String, required: false, default: '' },

        validation: {type:String, default:''},

        error: {type:Boolean, default: false},
        errmsg: {type:String, default:''},
    },

    data(){
        return {
            show: false,
            showError: false,
            errorMessage: '',
        }
    },
    methods:{
        inputChange(ele){
            let inputVal = ele.value;
            this.$emit('input', inputVal);
            // validations:
            // required | email | number | tel | Password | lengthMin| lienghtMax| minNumber | maxNumber |
        },
    },
    created(){
        //
    },
    mounted(){
    },
    watch: {
  }
};
</script>

