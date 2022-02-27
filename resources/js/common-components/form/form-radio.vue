<template>
    <div class="field column">
        <div v-if="label">{{ label }}</div>
        <div class="control">
            <label v-for="radio in radios">
                <input type="radio"
                    :value="radio.value"
                    :id="radio.value"
                    :name="name"
                    :checked="value == radio.value"
                    :class="inputClass"
                    :style="inputStyle"
                    @change="radioChange($event.target)"
                    >
                    <span v-if="radio.text">{{ radio.text }}</span> &nbsp;
            </label>
        </div>
        <spam class="help is-danger" v-if="error" v-text="errmsg"></spam>
    </div>
</template>

<script>
export default {
    props: {
        name:       { type: String, required: false, default: '' },
        value:      { type: String, required: false, default: '' },
        inputClass: { type: String, required: false, default: '' },
        inputStyle: { type: String, required: false, default: '' },
        label:      { type: String, required: false, default: '' },
        radios:     { type:Array, required:true},
        validation: { type:String, default:''},
        error:      { type:Boolean, default: false},
        errmsg:     { type:String, default:''}
    },

    data(){
        return {
            checked: this.value && this.value == this.radio.value ? true : false,
        }
    },
    methods:{
        radioChange(element){
            this.$emit('input', element.value);
        }
    },
    created() {
        // console.log(this.error);
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

