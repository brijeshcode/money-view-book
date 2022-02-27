<template>
    <div class="field column" id="v-model-select-dynamic">
        <div v-if="label">{{ label }}</div>
        <div class="control">
            <select v-bind="$attrs"
                :name="name"
                class="input"
                v-bind:checked="checked"
                @change="selectChange($event.target)"
             >
                <option v-if="placeholder" disabled>{{ placeholder }}</option>
                <option
                    v-for="(option) in options"
                    v-bind:key="option.value"
                    v-bind:value="option.value"
                    :class="inputClass"
                    :style="inputStyle"
                    :selected="option.value == value"
                    v-text="option.text"

                    ></option>
            </select>
        </div>
        <spam class="help is-danger" v-if="error" v-text="errmsg"></spam>
    </div>
</template>

<script>
export default {
    props: {
        name: { type: String, required: false, default: '' },
        value: { type: String, required: false, default: '' },
        placeholder: { type: String, required: false, default: '' },
        inputClass: { type: String, required: false, default: '' },
        inputStyle: { type: String, required: false, default: '' },
        options:{ type: Array, required: true},
        label: { type: String, required: false, default: '' },
        validation: {type:String, default:''},
        error: {type:Boolean, default: false},
        errmsg: {type:String, default:''},
    },

    data(){
        return { show: false }
    },
    methods:{
        selectChange(element){
            this.$emit('change', element.selected);
            this.$emit('input', element.value);
        }
    },
    created() {
        console.log(this.error);
        // console.log(this.form);
    },
    mounted(){
        // console.log(this.$children);
    },
    watch: {
    /* value(newValue) { this.currentValue = newValue; },*/
  }
};
</script>

