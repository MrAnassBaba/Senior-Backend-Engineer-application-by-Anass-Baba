<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    name: '',
    description: '',
    urlRps: '',
});

const submit = () => {
    form.post(route('createRepository'), {
        onFinish: visit => {},
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Create Repository" />

        <BreezeValidationErrors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            <h1>{{ status }}</h1>
        </div>

        <div v-if="$page.props.flash.message" class="mb-4 font-medium text-sm text-green-600">
            {{ $page.props.flash.message }}
        </div>

        <h1 class="title mb-4">Fill form to create repository</h1>
        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="name" value="repository name" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="repository name" />
            </div>

            <div>
                <BreezeLabel for="urlRps" value="repository url" />
                <BreezeInput id="urlRps" type="text" class="mt-1 block w-full" v-model="form.urlRps" required autofocus autocomplete="repository url" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="description" value="description" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" required autocomplete="description" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                   list of respository
                </Link>

                <BreezeButton class="ml-4 button" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    register repository
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>

<style>
.title{
    background: #111827;
    color: white;
    text-align: center;
    padding: 13px;
    border-radius: 5px;
}
.w-full{
    border: 1px solid;
}
.button{
    width: 100%;
    text-align: center;
    color: white;
    background: #2da44e;
    padding: 15px;
    margin: 0 auto;
    display: inline-block;
    font-weight: bold;
}
</style>
