<template>
    <div>
        <input
        v-model="currentVal"
        :type="type"
        :name="name"
        :placeholder="placeholder"
        :class="classes"
        />
    </div>
</template>

<script>
export default {
    props: {
        type: { type: String, required: true, default: 'text' },
        name: { type: String, required: false, default: '' },
        value: { type: String, required: false, default: '' },
        placeholder: { type: String, required: false, default: '' },
        classes: { type: String, required: false, default: '' },

        label: { type: String, required: false, default: '' },
        hint: { type: String, required: false, default: 'hint' },
        icon: { type: String, required: false, default: '' },

        required: { type: Boolean, default: true},
        readonly: { type: Boolean, default: false},
        disabled: { type: Boolean, default: false},


        color: { type: String, required: false, default: 'indigo' }
    },
    name: 'f-input',
    data(){
        return {
            show: false,
            currentVal: this.value,
            classes: 'input',
            focus__border: ''
        }
    },
    created() {
        console.log('input text');
    }
};
</script>
