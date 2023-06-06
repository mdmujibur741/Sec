<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import {useToastr} from '../../../toastr.js';

const props = defineProps({
      user : Object
})


const toastr = useToastr();

const form = useForm({
      name : props.user?.name,
      email : props.user?.email,
      mobile : props.user?.mobile,
      password : '',
      password_confirmation : ''
})

const submit = ()=> {
    form.put(route("admin.agents.update",props.user.id),{
          onSuccess: ()=> cleanForm ()
    });
}

function cleanForm(){
    form.reset();
    toastr.success("Agent Update Successfully");
}



</script>


<template>
            <AdminLayout>
 <section class="min-h-[90vh]  bg-indigo-50 p-3 shadow-lg flex justify-center items-center">
    <form @submit.prevent="submit" class="w-full lg:w-6/12 mx-auto bg-gray-50 p-5 rounded-lg">
               <div class="mt-3 mb-3">
                     <img src="../../../../../public/image/bd_logo.png" alt="logo" class="w-16 h-16 mx-auto m-1 rounded-full">
                      <h3 class="text-3xl font-bold text-center m-2">Edit AGENT</h3>
               </div>
        <div>
            <InputLabel for="name" value="Name" />
            <TextInput  id="name"  v-model="form.name" type="text"  class="form-control" placeholder="Enter Agent Name" />
            <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div class="mt-4">
            <InputLabel for="email" value="Email" />
            <TextInput id="email" disabled v-model="form.email" type="email" class="form-control bg-gray-300" placeholder="Enter Agent Email"  />
            <InputError class="mt-2" :message="form.errors.email" />
        </div>
        <div class="mt-4">
            <InputLabel for="mobile" value="Mobile" />
            <TextInput id="mobile"  v-model="form.mobile" type="tel" class="form-control " placeholder="Enter Agent Mobile"  />
            <InputError class="mt-2" :message="form.errors.mobile" />
        </div>

        <div class="mt-4">
            <InputLabel for="password" value="Password" />
            <TextInput  id="password" v-model="form.password" type="password"  class="form-control" placeholder="Enter Agent Password"/>
            <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="mt-4">
            <InputLabel for="password_confirmation" value="Confirm Password" />
            <TextInput  id="password_confirmation"  v-model="form.password_confirmation" type="password" class="form-control"  placeholder="Enter Agent Retype Password"/>
            <InputError class="mt-2" :message="form.errors.password_confirmation" />
        </div>

   

        <div class="text-center mt-5">
         
            <PrimaryButton class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
               Update Agent
            </PrimaryButton>
        </div>
    </form>
 </section>

</AdminLayout>
</template>