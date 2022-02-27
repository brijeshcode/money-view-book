<template>
    <div class="field column">
        <div v-if="label">{{ label }}</div>
        <div class="control">
            <input type="checkbox"
                :value="value"
                :class="inputClass"
                :style="inputStyle"
                :checked="value == checkedVal"
                @change="selectChange($event.target)"
                >
        </div>
        <spam class="help is-danger" v-if="error" v-text="errmsg"></spam>
    </div>
</template>

<script>
export default {
    props: {
        name:           { type: String, required: false, default: '' },
        value:          { type: String, required: false, default: '' },
        inputClass:     { type: String, required: false, default: '' },
        inputStyle:     { type: String, required: false, default: '' },
        checkedVal:     { type: String, required:true, default:''},
        unCheckedVal:   { type: String, required:false, default:''},
        label:          { type: String, required: false, default: '' },
        validation:     { type: String, default:''},
        error:          { type: Boolean, default: false},
        errmsg:         { type: String, default:''},
    },

    data(){
        return {
        }
    },
    methods:{
        selectChange(element){
            if (element.checked) {
                this.$emit('input', this.checkedVal);
            }else{
                if (this.unCheckedVal == undefined) {
                    this.$emit('input', '');
                }else{
                    this.$emit('input', this.unCheckedVal);
                }
            }
        }
    },
    created() {
    },
    mounted(){
        // console.log(this.$children);
    },
    watch: {
    /* value(newValue) { this.currentValue = newValue; },*/
  }
};
</script>

