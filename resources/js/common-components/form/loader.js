// common component form loader

import Vue from 'vue';
import button from './button.vue';
// import formInput from './input-text.vue';
import input from './form-field.vue';
import select from './form-select.vue';
import radio from './form-radio.vue';
import checkbox from './form-checkbox.vue';

Vue.component("tf-button", button);
// Vue.component("f-input", formInput);
Vue.component("f-field-input", input);
Vue.component("f-form-select", select);
Vue.component("f-form-radio", radio);
Vue.component("f-form-checkbox", checkbox);
