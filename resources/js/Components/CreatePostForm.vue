<template>
    <breeze-validation-errors class="mb-4" />

    <form @submit.prevent="submit">
        <div>
            <breeze-label for="title" value="Title" />
            <breeze-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus autocomplete="title" />

        </div>



        <div class="flex items-center justify-end mt-4">
            <breeze-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Publish Post
            </breeze-button>
        </div>
    </form>
</template>

<script>
    import BreezeButton from '@/Components/Button'
    import BreezeGuestLayout from "@/Layouts/Guest"
    import BreezeInput from '@/Components/Input'
    import BreezeLabel from '@/Components/Label'
    import BreezeValidationErrors from '@/Components/ValidationErrors'

    export default {
        layout: BreezeGuestLayout,

        components: {
            BreezeButton,
            BreezeInput,
            BreezeLabel,
            BreezeValidationErrors,
        },

        props: {
            title: String,
        },

        data() {
            return {
                form: this.$inertia.form({
                    title: null,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('post.store'))
                this.form.title = '';
            }
        }
    }
</script>
