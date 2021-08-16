<template>
    <div class="columns">
        <div class="column">
            <div class="box">
                <h2 class="title">Add Category Spend</h2>
                <form @submit.prevent="onSubmti" @keydown="form.errors.clear()">
                    <div class="field">
                        <div>Title*</div>
                        <div class="control has-icons-left">
                            <input class="input" type="text" placeholder="Category title?" v-model="form.name" />
                            <span class="icon is-small is-left">
                                <i class="fas fa-store-alt"></i>
                            </span>
                        </div>
                        <!-- <error></error> -->
                        <spam class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></spam>
                    </div>
                    <div class="columns">
                        <div class="column is-6">
                            <label class="label">Color</label>
                            <div class="control">
                                <input type="hidden" v-model="form.color" />
                                <spam class="help is-danger" v-if="form.errors.has('color')" v-text="form.errors.get('color')"></spam>
                                <div v-for="color in colors" class="color-select" v-bind:class="{ 'is-selected': color === activeColor }" v-bind:title="color.tag" v-on:click="colorSelected(color.code)" v-bind:style="{background: color.code}">&nbsp;</div>
                            </div>
                        </div>

                        <div class="column is-6">
                            <label class="label">Category Icon</label>

                            <div class="control">
                                <input type="hidden" v-model="form.class_or_path" />

                                <spam class="help is-danger" v-if="form.errors.has('class_or_path')" v-text="form.errors.get('class_or_path')"></spam>

                                <div v-for="(icon , index) in icons" v-if="icon.isShortListed" class="icon-list" v-on:click="iconSelected(icon.icon)" v-bind:class="{ 'is-active': icon.icon === activeIcon } ">
                                    <i v-bind:class="icon.icon" class="fa-2x" style="margin-left: 5px;"></i>
                                    <!-- <ul>
                                        <li v-for="tag in icon.tags" v-text="tag"></li>
                                    </ul> -->
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">Submit</button>
                        </div>
                        <div class="control">
                            <button class="button is-link is-light">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<style>
    .color-select {
        display: inline-block;
        padding: 14px;
        border-radius: 50%;
        margin-left: 5px;
        cursor: pointer;
        width: 50px;
        margin-bottom: 5px;
    }

    .is-selected {
        border: 5px solid gainsboro;
        width: 57px;
        height: 59px;
    }

    .icon-list {
        display: inline-block;
        margin-left: 5px;
        margin-bottom: 5px;
        border: solid 2px gray;
        padding: 5px;
    }
    .icon-list.is-active {
        color: red;
        padding: 5px 2px;
        background: wheat;
    }
</style>

<script>
import faIcons from '../utilities/icons';
import colors from '../utilities/colors';
import Category from '../Models/Category';
    export default {
        data() {
            return {
                activeIcon: "",
                activeColor: "#bc5090",
                form: new Form({
                    name: "",
                    class_or_path: "",
                    type: "",
                    color: '#bc5090',
                    icon_type: "",
                }),
                colors:  colors,
                icons: faIcons[0],
            };
        },
        methods: {
            onSubmti() {
                // alert('submited');
                this.form.icon_type = "fontawesome";
                this.form.type = "expense";

                if (this.form.class_or_path == '') {
                    this.form.icon_type = "character";
                    this.form.class_or_path = "character";
                }
                this.form.post("/categories").then((status) => this.$emit("completed", status));
            },
			iconSelected(icon){
				this.form.class_or_path = icon;
				this.activeIcon = icon;
			},
			colorSelected(color){
				this.activeColor = color;
				this.form.color = color;
			}
        },
    };
</script>
